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
			<article id="<?php echo get_the_ID()?>" <?php post_class('card');?>>
                <div class="card-body">
                    <div class="round-image">

		                <?php
		                bio_post_thumbnail( array(100,100));
                        ?>
                    </div>
	                <?php the_title('<h3>','</h3>');?>
                    <div class="post-meta">
                        <ul>
                            <li>
                                <strong><?php echo  __( 'Born: ', 'bio-collection' );?></strong>
				                <?php echo get_post_meta( get_the_ID(),'bio-collection_birth_date', true );?>
                            </li>
                            <li>
                                <strong><?php echo  __( 'Death: ', 'bio-collection' );?></strong>
				                <?php echo get_post_meta( get_the_ID(),'bio-collection_death_date', true );?>
                            </li>
                            <li>
                                <strong><?php echo  __( 'By: ', 'bio-collection' );?></strong>
	                            <?php echo get_the_author_link(); ?>
                            </li>
                        </ul>

                    </div>
                    <h3><?php echo __('Bio','bio-collection');?></h3>
                    <?php the_content();?>
                </div>
			</article>
		</main>
	</div>
</div>

<?php

get_footer();

?>
