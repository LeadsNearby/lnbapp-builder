<?php

add_action("admin_init", "lnbapp_meta_boxes");
function lnbapp_meta_boxes(){
	//Profile
	add_meta_box("service_icon", "Service Icon", "service_icon", "lnbapp", "side", "default");
}

add_action('do_meta_boxes', 'lnbapp_image_box');
function lnbapp_image_box() {
	remove_meta_box( 'postimagediv', 'lnbapp', 'side' );
	add_meta_box('postimagediv', __('Service Featured Image'), 'post_thumbnail_meta_box', 'lnbapp', 'normal', 'high');
}

function service_icon( $post )
{
    $values = get_post_custom( $post->ID );
	$service_icon = (isset( $values['service_icon'] ) ? esc_attr( $values['service_icon'][0] ) : '');
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
	<p>
        <label for="service_icon"><?php _e( 'Ionicon', 'textdesc' ); ?>:</label><br />
		<em>Enter and directions for use.</em><br />
        <input name="service_icon" id="service_icon" type="text" size="" value="<?php echo stripslashes(get_post_meta($post->ID, 'service_icon', true)); ?>" /><br />
		<em><?php _e( 'Enter the Ionicon class', 'lnbapp' ); ?></em>
    </p>
	<?php
}

// Saves the Custom Metabozes
add_action( 'save_post', 'lnbapp_meta_box_save' );
function lnbapp_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;	 

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array(
		'a' => array( // on allow a tags
			'href' => array() // and those anchors can only have href attribute
		)
	);

	// Make sure your data is set before trying to save it
	if( isset( $_POST['service_icon'] ) )
		update_post_meta( $post_id, 'service_icon', $_POST['service_icon'] );
}
?>