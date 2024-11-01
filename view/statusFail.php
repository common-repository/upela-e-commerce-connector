<?php echo '<?xml version="1.0" standalone="yes" ?>'; ?>
<Upela moduleVersion="1.0.0" schemaVersion="1.0.0">
	<Error><Code><?php echo $statusManager->getCode() ; ?></Code>
		<Description><?php echo $statusManager->getDescription() ?></Description>
	</Error>
</Upela>
