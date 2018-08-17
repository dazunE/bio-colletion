<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://dasun.blog
 * @since      1.0.0
 *
 * @package    Bio_Collection
 * @subpackage Bio_Collection/public/partials
 */

global $post;
?>

<div <?php post_class()?> >
    <div class="card">
        <a href="<?php echo  esc_url(get_the_permalink( $post->ID ));?>"></a>
        <div class="round-image">
            <?php echo  get_the_bio_post_thumbnail( array(100,100), $post)?>
        </div>
        <div class="card-body">
            <h4 class="post-title">
	            <?php echo get_the_title( $post );?>
            </h4>
            <p><?php get_the_excerpt( $post );?></p>
        </div>
        <div class="card-footer post-meta">
            <ul>
                <li>
                    <strong><?php echo  __( 'Born: ', 'bio-collection' );?></strong>
		            <?php echo get_post_meta( get_the_ID(),'bio-collection_birth_date', true );?>
                </li>
                <li>
                    <strong><?php echo  __( 'Death: ', 'bio-collection' );?></strong>
		            <?php echo get_post_meta( get_the_ID(),'bio-collection_death_date', true );?>
                </li>
            </ul>
        </div>
    </div>
</div>