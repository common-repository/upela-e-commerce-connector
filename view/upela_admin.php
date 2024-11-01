
<form name="upela_account_form" method="post" action="<?php admin_url( 'options-general.php?page=upela-shopperpress' ); ?>">
	<?php    echo "<h3>" . __( 'Credentials to access your store from Upela', 'upela' ) . "</h3>"; ?>
	<p><?php echo __('Credentials your will enter to configure your store in Upela', 'upela'); ?></p>
	<table class="form-table">
		<tbody>
			<tr>
				<td align="right"><strong>Upela Username<span class="required">*</span></strong></td>
				<td align="left"><input type="text" value="" size="30" name="username_upela" required></td>
			</tr>
			<tr>
				<td align="right"><strong>Upela Password<span class="required">*</span></strong></td>
				<td align="left"><input type="password" value="<?php if(isset($password_upela)) echo $password_upela; ?>" size="30" name="password_upela" required></td>
			</tr>
			<tr>
				<td></td>
				<td align="left"><input type="submit" class="button-primary" value="<?php if(isset($buttonValueAccount)) echo $buttonValueAccount; else echo __("Create", 'upela'); ?>" name="send_account"></td>
			</tr>
			<tr>
				<td align="right" valign="top"><strong>URL Generic Module</strong></td>
				<td align="left"><strong><?php echo UPELAWORDPRESS_URL; ?></strong><br />
					<span style="font-size:x-small">(<?php echo __('Please enter this url when you will set up your store on Upela', 'upela'); ?>)</span></td>
			</tr>
		</tbody>
	</table>
</form>
