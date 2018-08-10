<?php
/**
 * The template for displaying all single persons
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/single_template
 *
 * @package WordPress
 * @subpackage Bio-Collection
 * @since 1.0
 * @version 1.0
 */

get_header();

?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="<?php echo get_the_ID()?>" class="<?php post_class();?>">
                <?php the_title('<h3>','</h3>');?>
                <div class="round-image">
                    <?php the_post_thumbnail();?>
                </div>
			</article>
		</main>
	</div>
</div>

<?php

get_footer();

?>
