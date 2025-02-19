<?php
/*
Template Name: WritingOnCaffeine Franzone Template
*/

// Get the header
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <div class="entry-content">
                <?php
                // Start the Loop for page content
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;

                // Query all Podcast Episode posts
                $args = array(
                    'category_name' => 'podcast-episode', // Slug of the category
                    'posts_per_page' => -1, // Get all posts
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                
                $podcast_query = new WP_Query($args);
                
                if ($podcast_query->have_posts()) {
                    $current_year = '';
                    
                    while ($podcast_query->have_posts()) {
                        $podcast_query->the_post();
                        $post_year = get_the_date('Y');
                        
                        // If we've hit a new year, output the header
                        if ($post_year !== $current_year) {
                            // Close previous year's list if it's not the first one
                            if ($current_year !== '') {
                                echo '</ul>';
                            }
                            $current_year = $post_year;
                            echo '<h3>' . $current_year . '</h3>';
                            echo '<div class="podcast-episodes">';
                        }
                        ?>
                        <div class="podcast-episode">
                            <h4 class="podcast-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="podcast-date">
                                Episode Date: <?php echo get_the_date(); ?>
                            </div>
                            <div class="podcast-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php
                    }
                    // Close the final list
                    echo '</div>';
                    wp_reset_postdata();
                } else {
                    echo '<p>No podcast episodes found.</p>';
                }
                ?>
            </div>
        </article>
    </main>
</div>

<?php
// Get the footer
get_footer();