<?php
wp_head();
?>

<div class="header-section">
    <div class="container ">
        <div class="menu-bar">
            <a href="<?php echo home_url() ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="custom-logo"/>';
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </a>

            <div class="primary-menu">
                <?php primary_menu(); ?>
            </div>
        </div>
    </div>

</div>