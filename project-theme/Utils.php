<?php

class Utils {

   public static $version;

   static function getPostTerm($post, $taxonomy, $field = '', $default = '') {
      $terms = get_the_terms($post, $taxonomy);
      if ($terms && count($terms) > 0) {
         return $field ? $terms[0]->$field : $terms[0];
      }
      return $default;
   }

   static function getPosts($postSlug, $term = null, $count = -1) {
      $tax = $term ? [
         [
            'taxonomy' => $term->taxonomy,
            'terms' => $term ? $term->term_id : 0,
            'include_children' => false
         ]
      ] : [];
      return get_posts(array(
         'numberposts' => $count,
         'post_type' => $postSlug,
         'tax_query' => $tax
      ));
   }

   static function getTerms($taxonomy, $termId = 0) {
      return get_terms(array(
         'taxonomy' => $taxonomy,
         'parent' => $termId,
         'hide_empty' => false
      ));
   }

   static public function imgLazyFromPost($post, $size, $sizes = '', $alt = '', $class = '', $useSrcset = true) {
      return Utils::imgLazy(get_post_thumbnail_id($post), $size, $sizes, $alt, $class, $useSrcset);
   }

   static public function imgLazy($image, $size, $sizes = '', $alt = '', $class = '', $useSrcset = true) {
      return apply_filters('bj_lazy_load_html', Utils::img($image, $size, $sizes, $alt, $class, $useSrcset));
   }

   static public function imgLazyFromAssets($asset, $format, $alt = '', $class = '') {
      return apply_filters('bj_lazy_load_html', Utils::imgFromAssets($asset, $format, $alt, $class));
	}

   static public function img($image, $size = 'large', $sizes = '', $alt = '', $class = '', $useSrcset = true) {
      if (is_numeric($image)) {
         return Utils::imgFromId($image, $size, $sizes, $alt, $class, $useSrcset);
      } else if (is_array($image) && $image['src']) {
         return Utils::imgFromSrc($image['src'], $image['srcset'], $sizes, $alt, $class);
      } else {
         return Utils::imgFromSrc($image, '', $sizes, $alt, $class);
      }
   }

   static public function imgFromAssets($asset, $format, $alt = '', $class = '') {
      return Utils::imgFromSrc(Utils::getImageAssetUri($asset, $format), null, '', $alt, $class);
   }

   static private function imgFromId($id, $size, $sizes = '', $alt = '', $class = '', $useSrcset = true) {
      $src = wp_get_attachment_image_src($id, $size)[0];
      if ($useSrcset) {
         $srcset = wp_get_attachment_image_srcset($id);
      }
      return Utils::imgFromSrc($src, $srcset, $sizes, $alt, $class);
   }

   static private function imgFromSrc($src, $srcset = null, $sizes = '', $alt = '', $class = '') {
      return '<img src="' . $src . '" srcset="' . $srcset . '" sizes="' . $sizes . '" alt="' . $alt . '" class="' . $class . '">';
   }

   static public function getImageAssetUri($imageName, $imageFormat) {
		return get_stylesheet_directory_uri() . '/assets/images/' . $imageName . '.' . $imageFormat;
	}

   static public function getVersion() {
      if (!Utils::$version) {
         $file = fopen(THEME . '/version.txt', 'c+');
         Utils::$version = str_replace(array("\n", "\r"), '', fgets($file));
         fclose($file);
      }
      return Utils::$version;
   }

   static public function humanTiming($time) {
      $time = ($time < 1) ? 1 : $time;
      $tokens = array(
         31536000 => __('year', 'mw'),
         2592000 => __('month', 'mw'),
         604800 => __('week', 'mw'),
         86400 => __('day', 'mw'),
         3600 => __('hour', 'mw'),
         60 => __('minute', 'mw'),
         1 => __('second', 'mw')
      );
      foreach ($tokens as $unit => $text) {
         if ($time < $unit) continue;
         $numberOfUnits = floor($time / $unit);
         return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
      }
   }

   static public function spacer() {
      return '<div class="spacer"></div>';
   }

   static public function lazy($html) {
      if (Utils::isYoutubeVideo($html)) {
         return Utils::lazyYoutubeVideo($html);
      }
      return apply_filters('bj_lazy_load_html', $html);
   }

   static public function videoIframeOnDemand($src, $placeHolder = null) {
      if (Utils::isYoutubeVideo($src)) {
         return Utils::lazyYoutubeVideo($src);
      }
      return include(__DIR__ . '/lazy-video-iframe.php');
   }

   static public function isYoutubeVideo($src) {
      $index = strpos($src, 'youtube');
      return $index && $index >= 0;
   }

   static public function lazyYoutubeVideo($html) {
      $videoId = Utils::getYoutubeVideoId($html);
      include(__DIR__ . '/lazy-youtube.php');
   }

   static public function getVideoID($src) {
      return Utils::isYoutubeVideo($src) ? Utils::getYoutubeVideoId($src) : Utils::getVimeoVideoId($src);
   }

   static public function getVideoHost($src) {
      return Utils::isYoutubeVideo($src) ? 'youtube' : 'vimeo';
   }

   static public function getYoutubeVideoId($src) {
      preg_match('/embed\/(.*?)[\?|"]|v=(.*?)(&|$|")/', $src, $match);
      return $match[1] ? $match[1] : $match[2];
   }

   static public function getVimeoVideoId($src) {
      preg_match('/vimeo.com\/video\/(.*?)\?/', $src, $match);
      return $match[1] ? $match[1] : '676906218';
   }

   static public function textToList($text, $before = '') {
      $lines = explode(PHP_EOL, $text);
      $list = '<ul>';
      foreach ($lines as $line) {
         $list .= '<li>';
         $list .= $before;
         $list .= '<span>' . strip_tags($line) . '</span>';
         $list .= '</li>';
      }
      return $list . '</ul>';
   }

   function getPostTags($post) {
      $post_tags = get_the_tags($post);
      $separator = ' | ';
      if (!empty($post_tags)) {
         foreach ($post_tags as $tag) {
            $output .= '<a href="' . get_tag_link($tag->term_id) . '" class="nice-link">' . $tag->name . '</a>' . $separator;
         }
         return trim($output, $separator);
      }
   }

   function replace($string, $variables) {
      foreach ($variables as $var) {
         $string = str_replace($var['key'], $var['value'], $string);
         $string = str_replace(strtoupper($var['key']), strtoupper($var['value']), $string);
      }
      return $string;
   }

   function getImageSizesForListFromClass($items, $listClass) {
      $mobileCols = $listClass && is_numeric(strpos($listClass, 'mobile-big')) ? 1 : 2;
      if ($listClass) {
         if (is_numeric(strpos($listClass, 'three-col'))) {
            $desktopCols = 3;
         } else if (is_numeric(strpos($listClass, 'two-col'))) {
            $desktopCols = 2;
         }
      }
      $desktopCols = $desktopCols ? $desktopCols : 4;
      return Utils::getImageSizesForList($items, $mobileCols, $desktopCols);
   }

   function getImageSizesForList($items, $mobileCols, $desktopCols) {
      if ($mobileCols === 1 || count($items) === 1) {
         $sizes .= '(max-width: 479px) 94vw,';
      } else {
         $sizes .= '(max-width: 479px) 47vw,';
      }
      $sizes .= '(max-width: 767px) 47vw,';
      if (count($items) === 1) {
         $sizes .= '(max-width: 991px) 520px,460px';
      } else if (count($items) === 2 || $desktopCols === 2) {
         $sizes .= '(max-width: 991px) 340px,460px';
      } else if (count($items) === 3 || $desktopCols === 3) {
         $sizes .= '(max-width: 991px) 310px,380px';
      } else {
         $sizes .= '(max-width: 991px) 310px,(max-width: 1199px) 380px, 300px';
      }
      return $sizes;
   }

   function getNavigation($object, $items) {
      if (!$object) {
         array_push($items, [
            'text' => 'Home',
            'link' => home_url()
         ]);
         return array_reverse($items);
      }
      if (isset($object->post_type)) {
         if ($object->post_type === 'post') {
            $next = get_page_by_path('news');
         } else if($object->post_type === 'artist') {
            $next = get_page_by_path('artists');
         } else if($object->post_type === 'artist-mix') {
            $next = get_page_by_path('friday-mix');
         } else if ($object->post_parent) {
            $next = get_page($object->post_parent);
         }
         $link = get_permalink($object);
         $text = $object->post_title;
      } else if (isset($object->taxonomy)) {
         if ($object->taxonomy === 'package-types') {
            $next = get_page_by_path('tickets-acomm');
         }
         $link = get_term_link($object);
         $text = $object->name;
      }
      array_push($items, [
         'text' => $text,
         'link' => $link
      ]);
      return Utils::getNavigation($next, $items);
   }

   static public function cache($key, $expiration, $renewCacheFn) {
      $cachedObject = get_transient($key);
      if (!$cachedObject) {
         $cachedObject = $renewCacheFn();
         set_transient($key, $cachedObject, $expiration);
      }
      return $cachedObject;
   }
}
?>
