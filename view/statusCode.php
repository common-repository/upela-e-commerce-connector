<?php echo '<?xml version="1.0" standalone="yes" ?>'; ?>
<Upela moduleVersion="1.0.0" schemaVersion="1.0.0">
	<StatusCodes>
	<?php $status = $statusCodes->getStatus(); ?>
		<?php foreach ($status as $i => $statu ) { ?>
		<StatusCode>
			<Code><?php echo $i ?></Code>
			<Name><?php echo $status[$i]; ?></Name>
		</StatusCode>
		<?php } ?>
	</StatusCodes>
</Upela>