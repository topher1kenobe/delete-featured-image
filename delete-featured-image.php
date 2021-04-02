<?php
/**
 * Plugin Name: Delete Featured Image
 * Description: When you delete a post, if there's a featured image associated, it will ALSO delete the featured image.
 * Version:     1.0
 * Author:      Topher
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: delete-featured-image
 * Domain Path: /languages
 *
 * @package DeleteFeaturedImage
 */

/**
 * Remove the associated featured image.
 *
 * @param  int $post_id a Post ID.
 * @return void
 */
function topher_remove_attachment_with_post( $post_id ) {
	if ( has_post_thumbnail( $post_id ) ) {
		$attachment_id = get_post_thumbnail_id( $post_id );
		wp_delete_attachment( $attachment_id, true );
	}
}
add_action( 'before_delete_post', 'topher_remove_attachment_with_post', 10 );
