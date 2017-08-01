<?php

	add_action( 'services_add_form_fields', 'lnbapp_services_field', 10, 2 );
	function lnbapp_services_field() {
		// this will add the custom meta field to the add new term page
		?>		
		<div class="form-field">
			<label for="term_meta[custom_term_meta]"><?php _e( 'Service Icon', 'lnbapp' ); ?></label>
			<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
			<p class="description"><?php _e( 'Enter the icon class for this service','lnbapp' ); ?></p>
		</div>
	<?php
	}

	add_action( 'services_edit_form_fields', 'lnbapp_services_edit_meta_field', 10, 2 );
	function lnbapp_services_edit_meta_field($term) { 
		// put the term ID into a variable
		$t_id = $term->term_id;
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e( 'Service Icon', 'lnbapp' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="<?php echo esc_attr( $term_meta['custom_term_meta'] ) ? esc_attr( $term_meta['custom_term_meta'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter the icon class for this service','lnbapp' ); ?></p>
			</td>
		</tr>
	<?php
	}

	add_action( 'edited_services', 'save_services_custom_meta', 10, 2 );  
	add_action( 'create_services', 'save_services_custom_meta', 10, 2 );
	function save_services_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			//$t_id = $term_id;
			$t_id = $term->term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			update_option( "taxonomy_$t_id", $term_meta );
		}
	}

	add_action( 'rest_api_init', 'slug_register_meta' );
	function slug_register_meta() {
	    register_rest_field( 'services',
	        'services-icon',
	        array(
	            'get_callback'    => 'services_get_term_meta',
	            'update_callback' => null,
	            'schema' => null,
	        )
	    );	
    }

	//READ
	function services_get_term_meta( $object, $field_name, $request ) {
	    $meta = get_option( 'taxonomy_' . $object['id'], true);
	    return $meta['custom_term_meta'];
	}	
	
	

    //Custom Meta Box Include	
    add_action( 'rest_api_init', 'slug_register_ionicon' );
    function slug_register_ionicon() {
        register_rest_field( 'lnbapp',
            'ionicon',
            array(
                'get_callback'    => 'slug_get_ionicon',
                'update_callback' => null,
                'schema'          => null,
            )
        );
    }

    function slug_get_ionicon( $post, $field_name, $request ) {
        //return get_post_meta( $post->ID, 'service_icon', true );
        return get_post_meta($post['id'], 'service_icon', true);
    }
	
?>