
<footer class="site-footer">
    <?php 
    $instagram = get_field('instagram', 'option');
    $facebook = get_field('facebook', 'option');
    $copyright = get_field('copyright');
    if(isset($instagram) || isset($facebook) || isset($copyright)):
    ?>
        
<div class="margin-top">
    <div class="social">
        <ul class="links">
            <?php if(isset($instagram)): ?>
            <li><a href="<?php echo get_field('instagram', 'option') ?>">
                <?php include('images/icon_instagram.php') ?>
                </a>
            </li>
            <?php endif;
            if(isset($facebook)):?>
            <li><a href="<?php echo get_field('facebook', 'option') ?>">
                <?php include('images/icon_fb.php') ?>
                </a>
            </li>
            <?php endif; ?>
        </ul>
        
    </div>
    <?php if(isset($copyright)): ?>
    <p>© Copyright <?php echo get_the_date('Y'); echo " "; echo get_field('copyright') ?></p>
    <?php endif; ?>
</div>
<?php endif; ?>
</footer>




<?php wp_footer(); ?>
</body>
</html>