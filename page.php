<?php get_header() ?>

<section class="inner-page-banner">
    <div class="img-wrapper">
        <?php the_post_thumbnail('full') ?>

        <div class="inner-container">
            <h1><?php the_title(); ?></h1>
            <div class="breadcrumb">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<span id="breadcrumbs">', '</span>');
                } ?>
            </div>
        </div>
    </div>
</section>

<div class="container inner-page">
    <!-- Check if there are posts and display content -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile;
    endif; ?>

</div>

<?php get_footer() ?>

<style>
    .inner-page-banner .img-wrapper {
        position: relative;
        text-align: center;
        color: white;
    }

    .inner-page-banner .img-wrapper img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        object-position: center;
    }

    .inner-page-banner .inner-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .inner-page-banner .breadcrumb {
        margin-top: 10px;
        font-size: 14px;
    }
</style>