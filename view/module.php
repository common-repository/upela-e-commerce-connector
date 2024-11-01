<?php echo '<?xml version="1.0" standalone="yes" ?>'; ?>
<Upela moduleVersion="1.0.0" schemaVersion="1.0.0">
	<Module>
		<Platform><?php echo $software->getSoftware(); ?></Platform>
		<Developer>Upela (contact@upela.com)</Developer>
		<Capabilities>
			<DownloadStrategy>ByModifiedTime</DownloadStrategy>
			<OnlineCustomerID supported="false" dataType="numeric"/>
			<OnlineStatus supported="true" dataType="numeric" supportsComments="<?php echo $software->getSupportComments(); ?>"/>
			<OnlineShipmentUpdate supported="true"/>
		</Capabilities>
		<Communications>
				<ResponseEncoding>UTF-8</ResponseEncoding>
		</Communications>
	</Module>
</Upela>