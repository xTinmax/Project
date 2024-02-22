
<footer class="site-footer">
<div class="margin-top">
    <div class="social">
        <ul class="links">
            <li><a href="<?php echo get_field('instagram', 'option') ?>">
                <img src="<?php echo get_theme_file_uri('images/icon_instagram_color.svg') ?>" alt="">
                </a>
            </li>
            <li><a href="<?php echo get_field('facebook', 'option') ?>">
                <img src="<?php echo get_theme_file_uri('images/icon_fb_color.svg') ?>" alt="">
                </a>
            </li>
        </ul>
    </div class="copyright">
    <p>© Copyright <?php echo get_the_date('Y'); echo " "; echo get_field('copyright') ?></p>
</div>
</footer>




<?php wp_footer(); ?>
</body>
</html>