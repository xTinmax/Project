<?php 
require_once(__DIR__ . '/Utils.php');
get_header();
?>
<main>

<div class="banner">
<?= Utils::imgLazyFromPost($post, 'large') ?>
<div class="center"><img src="<?php echo get_field('logo') ['sizes'] ['large']; ?>);" alt=""></div>
</div>

<article class="margins">
<section id="intro" class="margin-top">
    <div class="container intro">
        <p><?php echo get_field('intro'); ?></p>
    </div>
</section>


<section id="tabs" class="margin-top ">
    <div class="container">
        <ul class="ul margin-left">
            <?php
            $menu = get_field('menu');
            foreach($menu as $name) : ?>
            <li class="li show-li"><?php echo $name['name']; ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="sub-container">
            
            <?php
            foreach($menu as $name) : 
            $section = $name['sections']; ?>
            <div class="block show">
                <?php foreach($section as $title) :?>
                    <?php $items = $title['items']; ?> 
                    <div>
                        <h1 class="title"><?php echo $title['title']; ?>:</h1>
                        <?php foreach($items as $item) : ?>
                            <div class="items">
                                <P class="menu-name"><?php echo $item['name'] ?> - <?php echo $item['description'] ?></P>
                                <P class="menu-price"><?php echo $item['price'] ?></P>
                            </div>
                            <?php endforeach; ?>                     
                    </div>            
                <?php 
                endforeach; ?> 
            </div> 
            <?php 
            endforeach; ?>
        </div>
    </div>
</section>
        

<section id="gallery" class="margin-top ">
    <div class="gallery">
            <?php
            $count = 0;
            $gallery = get_field('gallery');
            foreach($gallery as $images):
                $count++;
                if($count > 5) { break;}
            $sizes = $images['sizes']; ?>
            <div class="gallery-image"><img src="<?php echo $sizes['large']; ?>" srcset="<?php echo $sizes['thumbnail']; ?> 300w, <?php echo $sizes['medium']; ?> 1000w, <?php echo $sizes['large']; ?> 2000w" sizes="(max-width: 300px) 300px, (max-width: 500px) 1000px, (max-width: 1000px) 2000px" alt=""></div>
            <?php endforeach; ?>    
    </div>
</section>


    <?php 
    $sections = get_field('sections');
    $countSection = 0;
    ?>

<section id="section1" class="margin-top ">
    <?php foreach($sections as $section):
        $countSection++;
        if(!($countSection % 2) == 0):
        ?>
    <div class="container section">
        <h1><?php echo $section['title']; ?></h1>
        <div class="content">
            <div class="content-image">
                <img src="<?php echo $section['image']['sizes']['large']; ?>" srcset="<?php echo $section['image']['sizes']['thumbnail']; ?> 300w, <?php echo $section['image']['sizes']['medium']; ?> 1000w, <?php echo $section['image']['sizes']['large']; ?> 2000w" sizes="(max-width: 300px) 300px, (max-width: 500px) 1000px, (max-width: 1000px) 2000px" alt="">
            </div>
            <div class="content-text">
                <div class="description-text"><?php echo $section['description']; ?></div>
                <div class="boton"><p><a href="<?php echo $section['boton'] ['url']; ?>"><?php echo $section['boton'] ['title']; ?></a></p></div>
            </div>
        </div>
    </div>
    <?php else: ?>

    <div class="container section">
        <h1><?php echo $section['title']; ?></h1>
        <div class="content reverse">
            <div class="content-text">
                <div class="description-text"><?php echo $section['description']; ?></div>
                <div class="boton"><p><a href="<?php echo $section['boton'] ['url']; ?>"><?php echo $section['boton'] ['title']; ?></a></p></div>
            </div>
            <div class="content-image">
                <img src="<?php echo $section['image']['sizes']['large']; ?>" srcset="<?php echo $section['image']['sizes']['thumbnail']; ?> 300w, <?php echo $section['image']['sizes']['medium']; ?> 1000w, <?php echo $section['image']['sizes']['large']; ?> 2000w" sizes="(max-width: 300px) 300px, (max-width: 500px) 1000px, (max-width: 1000px) 2000px" alt="">
            </div>
        </div>
    </div>

     <?php endif; ?>
    <?php endforeach; ?>
</section>
<section id="section2" class="margin-top ">
        <div class="container section-text">
            <h1><?php echo get_field('section_text')['title']; ?></h1>
            <p><?php echo get_field('section_text')['description']; ?></p>
        </div>
</section>
<?php 
$email = get_field('email', 'option');
$phone = get_field('phone', 'option');
$address = get_field('address', 'option');
$map = get_field('map', 'option');
?>
<section id="contact" class="">
        <div class="container section-contact">
            <?php if(isset($email)): ?>
            <p>Email: <a href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a></p>
            <?php endif;
            if(isset($phone)): ?>
            <p>Tel: <a href="tel:<?php echo get_field('phone', 'option'); ?>"><?php echo get_field('phone', 'option'); ?></a></p>
            <?php endif;
            if(isset($address)): ?>
            <p>Address: <?php if(isset($map)): ?>
                        <a href="<?php echo get_field('map', 'option'); ?>">
                        <?php endif; ?>
                <?php echo get_field('address', 'option'); ?>
                <?php if(isset($map)): ?>
            </a>
            <?php endif; ?>
            </p>
            <?php endif; ?>
        </div>
</section>
</article>
</main>

<?php get_footer(); ?>
