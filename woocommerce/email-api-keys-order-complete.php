<?php // API Manager ?>
<strong>License Keys</strong>
<p>
<?php if ( count( $keys ) > 0 ) : ?>

	<?php foreach ( $keys as $key ) :

		if ( WCAM()->helpers->get_uniqid_prefix( $key['api_key'], '_am_' ) == $order_key || $key['api_key'] == $order_key ) :

			// Determine the Software Title from the customer order data
			$software_title = ( empty( $key['_api_software_title_var'] ) ) ? $key['_api_software_title_parent'] : $key['_api_software_title_var'];
			if ( empty( $software_title ) ) :
				$software_title = $key['software_title'];
			endif;
			// Check if this is an order_key, or the new longer api_key
			$order_data_key = ( ! empty( $key['api_key'] ) ) ? $key['api_key'] : $key['order_key'];
	?>
		<strong><?php echo $software_title; ?></strong>
		<ul style="list-style-type: none; margin: 0;padding: 0;">
			<li style="margin: 0;padding: 0;"><?php ( WCAM()->helpers->get_billing_country( $key['order_id'] ) == 'GB' ) ? _e( 'API Licence Key:', 'woocommerce-api-manager' ) : _e( 'API License Key:', 'woocommerce-api-manager' ); ?> <strong><?php echo $order_data_key; ?></strong></li>
			<li style="margin: 0;padding: 0;"><?php ( WCAM()->helpers->get_billing_country( $key['order_id'] ) == 'GB' ) ? _e( 'API Licence Email:', 'woocommerce-api-manager' ) : _e( 'API License Email:', 'woocommerce-api-manager' ); ?> <strong><?php echo $key['license_email']; ?></strong></li>
		</ul>
		<br/>
	<?php endif; ?>

	<?php endforeach; ?>
	
<?php endif; ?>
</p>
