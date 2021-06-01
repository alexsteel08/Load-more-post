<div class="blog-post-list">
                <?php
                $new_loop = new WP_Query(array(
                    'post_type' => 'post'

                ));
                ?>
                <?php if ($new_loop->have_posts()) : ?>
                    <?php while ($new_loop->have_posts()) : $new_loop->the_post(); ?>

                        <div class="post-pading">
                            <div class="blog_item">
                                <div class="blog_item_content">
                                    <div class="blog_item_image">
                                        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
                                        <div class="blog_color_shape"></div>
                                    </div>
                                    <div class="blog_item_title"><a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a></div>
                                    <div class="blog_item_excerpt"><?php the_excerpt();?></div>
                                    <div class="blog_item_link"><a href="<?php the_permalink(); ?>">Read more</a></div>
                                </div>

                            </div>
                        </div>


                    <?php endwhile; ?>
                    <div class="loadmore-block">
                        <?php
                        global $wp_query;
                        if ($wp_query->max_num_pages > 1) : ?>
                            <script>
                                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                            </script>

                            <div id="true_loadmore">OLDER POSTS</div>
                        <?php endif; ?>
                    </div>


                <?php else: ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
                <!-- Button -->
            </div>
