<?php get_header() ?>

<div id="acn_int" class="bs-post" >

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Header Banner Area -->
    <section>
        <?php if(!empty(get_the_post_thumbnail_url($post->ID, 'full'))): ?>
        <?php require('templates/post_header_image.php') ?>
        <?php else: ?>
        <?php require('templates/post_header.php') ?>
        <?php endif; ?>
    </section>

    <section class="single-content">
        <!-- Social Area -->
        <aside class="social-sidebar col-1-l">
            <div class="sticky">
                <div
                    class="bs-post-share"
                    data-props='<?php echo json_encode($props) ?>'
                >
                </div>
            </div>
        </aside>

        <!-- Article Area -->
        <article class="col-6-l col-12-s post-text">

            <!-- Post Header -->
            <header>

            </header>

            <?php the_content() ?>

        </article>

        <!-- Widgets Area -->
        <aside class="col-4-l banner-vertical">
            <?php if ( is_active_sidebar( 'post_widget_area' ) ) : ?>
                <?php dynamic_sidebar( 'post_widget_area' ); ?>
			<?php endif; ?>
        </aside>
    
    </section>

    <?php endwhile; else : ?>
        <h2> <?php echo gett('404') ?> </h2>
    <?php endif; ?>

</div>