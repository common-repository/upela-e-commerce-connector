<?php if (isset($message)) { ?>
	<div class="updated">
		<p><strong>
			<?php echo $message; ?>
			</strong></p>
	</div>
	<?php } ?>
<?php if ( $software->isCompatible() ) { ?>
<div class="highlight compatible">
	<p>
		<?php echo $software->getCompatibleMessage(); ?>
	</p>
</div>
<?php  } else { ?>
		<div class="highlight not-compatible">
			<p>
				<?php echo $software->getNotCompatibleMessage(); ?>
			</p>
		</div>
<?php } ?>
<form name="upela_account_form" method="post" action="<?php PLUGIN_PATH_UPELAWORDPRESS.'../../upela-e-commerce-connector/view/control/controlAdmin.php'?>">
	<?php    echo "<h3>" . __( 'Credentials to access your store from Upela', 'upela' ) . "</h3>"; ?>
	<p><?php echo __('Credentials your will enter to configure your store in Upela', 'upela'); ?></p>
	<table class="form-table">
		<tbody>
			<tr>
				<td align="right"><strong><?php echo __('Username', 'upela'); ?><span class="required">*</span></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getUsername(); ?>" size="30" name="username" required></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Password', 'upela'); ?><span class="required">*</span></strong></td>
				<td align="left"><input type="password" value="<?php echo $user->getPassword(); ?>" size="30" name="password" required></td>
			</tr>
			<tr>
				<td></td>
				<td align="left"><input type="submit" class="button-primary" value="<?php if(isset($boutonUpdate)) echo $boutonUpdate; else echo 'Create'; ?>" name="send-credentials"></td>
			</tr>
			<tr>
				<td align="right" valign="top"><strong><?php echo __('URL Module', 'upela'); ?></strong></td>
				<td align="left"><strong><?php echo UPELAWORDPRESS_URL; ?></strong><br />
					<span style="font-size:x-small">(<?php echo __('Please enter this url when you will set up your store on Upela', 'upela'); ?>)</span></td>
			</tr>
		</tbody>
	</table>

<form name="upela_address_form" method="post" action="<?php PLUGIN_PATH_UPELAWORDPRESS.'../../upela-e-commerce-connector/view/control/controlAdmin.php'?>">
	<?php    echo "<h3>" . __( 'Store Address', 'upela' ) . "</h3>"; ?>
	<p></p>
	<table class="form-table">
		<tbody>
			<tr>
				<td align="right"><strong><?php echo __('Company Name', 'upela'); ?><span class="required">*</span></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getCompanyName(); ?>" size="30" name="company_name"></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Street Line 1', 'upela'); ?><span class="required">*</span></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getStreet1(); ?>" size="50" name="street1" required></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Street Line 2', 'upela'); ?></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getStreet2(); ?>" size="50" name="street2"></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Street Line 3', 'upela'); ?>Street Line 3</strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getStreet3(); ?>" size="50" name="street3"></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('City', 'upela'); ?><span class="required">*</span></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getCity(); ?>" size="30" name="city" required></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('State', 'upela'); ?></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getState(); ?>" size="30" name="state"></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Zip Code', 'upela'); ?><span class="required">*</span></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getZip(); ?>" size="30" name="zip" required></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Country', 'upela'); ?><span class="required">*</span></strong></td>
				<td align="left">
        <select id="country" name="country" required>
          <option value=""> -- </option>
          <?php foreach ($countries as $k => $v) { ?>
          <option value="<?php echo $k; ?>"<?php echo $k == $user->getCountry() ? ' selected' : ''; ?>><?php echo $v; ?></option>
          <?php } ?>
        </select>
        </td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Phone', 'upela'); ?></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getPhone(); ?>" size="30" name="phone"></td>
			</tr>
			<tr>
				<td align="right"><strong><?php echo __('Email', 'upela'); ?></strong></td>
				<td align="left"><input type="text" value="<?php echo $user->getSupport(); ?>" size="30" name="support"></td>
			</tr>
			<tr>
				<td></td>
				<td align="left"><input type="submit" class="button-primary" value="<?php if(isset($boutonUpdateAdresse))  echo $boutonUpdateAdresse; else echo 'Create'; ?>" name="send-address"></td>
			</tr>
		</tbody>
	</table>
</form>
