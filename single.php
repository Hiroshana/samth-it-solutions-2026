<?php get_header() ?>

<section class="inner-page-banner">
    <div class="img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/images/blog-background.jpg" alt="pet-blog" />
        <div class="inner-container">
            <h2>Blog</h2>
            <div class="breadcrumb">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<span id="breadcrumbs">', '</span>');
                } ?>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                </div>
                <span class="category-meta"><?php echo get_the_category_list(','); ?></span>
                <h1 class="post-title-heading"><?php the_title(); ?></h1>
                <div class="post-meta-titles">
                    <span class="author-meta mb-0"><i class="fas fa-user"></i><?php the_author(); ?></span>
                    <span class="date-time-meta mb-0"><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></span>
                    <span class="comments-meta mb-0"><i class="fas fa-comment"></i> <?php echo get_comments_number(); ?> Comments</span>
                </div>
            <?php endif; ?>
            <div class="post-content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                <?php endwhile;
                endif; ?>
            </div>

        </div>
        <div class="col-md-4">
            <?php
            $author_picture = get_theme_mod('author_picture');
            $author_name = get_theme_mod('author_name');
            $author_position = get_theme_mod('author_position');
            $author_bio = get_theme_mod('author_bio');
            ?>
            <div class="author-box">
                <?php if ($author_picture) : ?>
                    <div class="author-image">
                        <img src="<?php echo wp_get_attachment_url($author_picture); ?>" alt="<?php echo esc_attr($author_name); ?>" class="img-fluid rounded-circle">
                    </div>
                <?php endif; ?>
                <div class="author-details">
                    <?php if ($author_name) : ?>
                        <h3 class="author-name"><?php echo esc_html($author_name); ?></h3>
                    <?php endif; ?>
                    <?php if ($author_position) : ?>
                        <p class="author-position"><?php echo esc_html($author_position); ?></p>
                    <?php endif; ?>
                    <?php if ($author_bio) : ?>
                        <p class="author-bio"><?php echo esc_html($author_bio); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <aside class="sidebar">
                <?php if (is_active_sidebar('sidebar-widget-area')): ?>
                    <?php dynamic_sidebar('sidebar-widget-area'); ?>
                <?php else: ?>
                    <div class="widget">
                        <h3 class="widget-title">Search</h3>
                        <?php get_search_form(); ?>
                    </div>
                    <div class="widget">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <?php wp_list_categories(array(
                                'title_li' => ',',
                            )); ?>

                        </ul>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>

    <style>
        .inner-page-banner {
            margin-bottom: 50px;
        }

        .inner-page-banner .img-wrapper {
            position: relative;
            text-align: center;
            color: white;
        }

        .inner-page-banner .img-wrapper img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            object-position: top;
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

        .featured-image {
            margin-bottom: 20px;
        }

        .post-title-heading {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .post-meta-titles span {
            display: inline-block;
            margin-right: 15px;
            font-size: 14px;
            color: #777;
        }

        .post-meta-titles i {
            margin-right: 5px;
        }

        .post-content {
            margin-top: 20px;
        }

        .author-box {
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px;
        }


        .author-box .author-image img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 15px;
        }
    </style>