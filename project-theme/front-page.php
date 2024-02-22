<?php 
require_once(__DIR__ . '/Utils.php');
get_header();
?>

<main>


<div class="banner">
<?= Utils::imgLazyFromPost($post, 'large') ?>
<div class="center"><img src="<?php echo get_field('logo') ['sizes'] ['large']; ?>);" alt=""></div>
</div>

<article>
<section class="margin-top margins">
    <div class="container intro">
        <p><?php echo get_field('intro'); ?></p>
    </div>
</section>


<section class="margin-top margins">
    <div class="container pepe">
        <ul class="ul margin-left">
            <?php
            $menu = get_field('menu');
            foreach($menu as $name) : ?>
            <li class="li"><?php echo $name['name']; ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="sub-container hide">
            
            <?php
            foreach($menu as $name) : 
            $section = $name['sections']; ?>
            <div class="block ">
                <?php foreach($section as $title) :?>
                    <?php $items = $title['items']; ?> 
                    <div>
                        <h1 class="title"><?php echo $title['title']; ?>:</h1>
                        <?php foreach($items as $item) : ?>
                            <div class="items">
                                <P><?php echo $item['name'] ?> - <?php echo $item['description'] ?></P>
                                <P><?php echo $item['price'] ?></P>
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
        

<section>
    <div class="gallery">
            <?php
            $gallery = get_field('gallery');
            foreach($gallery as $images):
            $sizes = $images['sizes']; ?>
            <div class="gallery-image"><img src="<?php echo $sizes['medium']; ?>);" alt=""></div>
            <?php endforeach; ?>    
    </div>
</section>


    <?php 
    $sections = get_field('sections');
    foreach($sections as $section):
    ?>
<section class="margin-top margins">
    <div class="container section ">
        <h1><?php echo $section['title']; ?></h1>
        <div class="content">
            <div class="content-image">
                <img src="<?php echo $section['image']['sizes']['medium']; ?>" alt="">
            </div>
            <div class="content-text">
                <div class="description-text"><?php echo $section['description']; ?></div>
                <div class="boton"><p><a href="<?php echo $section['boton'] ['url']; ?>"><?php echo $section['boton'] ['title']; ?></a></p></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>
<section class="margin-top margins">
        <div class="container section-text">
            <h1><?php echo get_field('section_text')['title']; ?></h1>
            <p><?php echo get_field('section_text')['description']; ?></p>
        </div>
</section>
<section class="margins">
        <div class="container section-contact">
            <p>Email: <?php echo get_field('email', 'option'); ?></p>
            <p>Tel: <?php echo get_field('phone', 'option'); ?></p>
            <p>Address: <a href="<?php echo get_field('map', 'option'); ?>"><?php echo get_field('address', 'option'); ?></a></p>
        </div>
</section>
</article>
</main>

<?php get_footer(); ?>
