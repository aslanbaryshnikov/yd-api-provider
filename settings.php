<?php

$token = get_option('ydapip_token');

if (isset($_POST['submit'])) {
	if (!current_user_can('manage_options'))
		die();

	if (function_exists('check_admin_referer'))
		check_admin_referer('ydapip_form');

	$token = $_POST['token'];

	update_option('ydapip_token', $token);
}

?>

<div class="wrap">
	<h1><?php _e('Yandex.Disk API Provider Settings', 'ydapip'); ?></h1>

	<form method="post">
		<?php
			if ( function_exists('wp_nonce_field') ) {
				wp_nonce_field('ydapip_form');
			}
		?>

		<p>
			<?php echo sprintf(
				__('You can learn about plugin setup on %splugin homepage%s.', 'ydapip'),
				'<a href="https://github.com/aslanbaryshnikov/yd-api-provider" target="_blank">',
				'</a>'
			); ?>
		</p>

		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="token">
						<?php _e('OAuth token', 'ydapip'); ?>:
					</label>
				</th>
				<td>
					<input
						class="regular-text"
						type="text"
						id="token"
						name="token"
						value="<?php echo $token; ?>">
				</td>
			</tr>
		</table>
		<p class="submit">
			<input
				type="submit"
				name="submit"
				id="submit"
				class="button button-primary"
				value="<?php _e('Save changes'); ?>">
		</p>
	</form>
</div>
