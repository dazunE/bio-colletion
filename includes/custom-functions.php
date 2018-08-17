<?php
/**
 * Custom Functions that required for displaying data
 *
 * @link       http://dasun.blog
 * @since      1.0.0
 *
 * @package    Bio_Collection
 * @subpackage Bio_Collection/includes
 */

function bio_post_thumbnail( $size ){
	if( has_post_thumbnail()){
		the_post_thumbnail( $size );
	}else{
       echo sprintf(
       	'<img src="%s" alt="%s"/>',
         plugin_dir_url(__FILE__).'img/placeholder.jpg',
          get_the_title()
       );
	}
}

function get_the_bio_post_thumbnail( $size , $post ){

	if( has_post_thumbnail( $post) ){

		$thumbnail =  get_the_post_thumbnail( $post , $size);


	} else{

		$thumbnail = sprintf(
			'<img src="%s" alt="%s"/>',
			plugin_dir_url(__FILE__).'img/placeholder.jpg',
			get_the_title()
		);


	}

	return $thumbnail;

}

function bio_search_from(){

?>
	<div id="bio-search" class="form-inline">
		<div class="form-group">
			<label for="name" class="sr-only">Name</label>
			<input type="text" name="person-name" class="form-control" id="name" placeholder="<?php echo __('Enter a name','bio-collection');?>">
		</div>
	</div>
<?php
}