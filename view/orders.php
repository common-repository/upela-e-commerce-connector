<?php echo '<?xml version="1.0" standalone="yes" ?>'; ?>
<Upela moduleVersion="1.0.0" schemaVersion="1.0.0">
	<Orders>
	<?php foreach( $orders->getOrders() as $order ) { ?>
	<?php 	if ( !isset( $numberLimite ) || ( isset( $numberLimite ) && $numberLimite > 0 ) ) {?>
		<Order>
			<OrderNumber><?php echo $order->getIdOrder() ?></OrderNumber>
			<OrderDate><?php echo $order->getCreationDate() ?></OrderDate>
			<LastModified><?php echo $order->getModifiedDate() ?></LastModified>
			<ShippingMethod><?php echo $order->getShippingOption() ?></ShippingMethod>
			<StatusCode><?php echo $order->getStatus() ?></StatusCode>
			<ShippingAddress>
				<FirstName><?php echo htmlspecialchars($order->getShipFirstname()) ?></FirstName>
				<MiddleName><?php echo htmlspecialchars($order->getMiddleName()) ?></MiddleName>
				<LastName><?php echo htmlspecialchars($order->getShipLastname()) ?></LastName>
				<Company><?php echo htmlspecialchars($order->getShipCompany()) ?></Company>
				<Street1><?php echo htmlspecialchars($order->getShipAddress()) ?></Street1>
				<Street2><?php echo htmlspecialchars($order->getShipStreet2()) ?></Street2>
				<Street3></Street3>
				<City><?php echo htmlspecialchars($order->getShipCity()) ?></City>
				<State><?php echo htmlspecialchars($order->getShipState()) ?></State>
				<PostalCode><?php echo $order->getShipPostcode() ?></PostalCode>
				<Country><?php echo $order->getShipCountry() ?></Country>
        <CountryCode><?php echo $order->getShipCountry() ?></CountryCode>
				<Residential><?php echo $order->getResidential() ?></Residential>
				<Phone><?php echo $order->getPhone() ?></Phone>
				<Fax><?php echo $order->getFax() ?></Fax>
				<Email><?php echo $order->getEmail() ?></Email>
				<Website><?php echo htmlspecialchars($order->getWebsite()) ?></Website>
			</ShippingAddress>
			<BillingAddress>
				<FirstName><?php echo htmlspecialchars($order->getFirstName()) ?></FirstName>
				<MiddleName><?php echo htmlspecialchars($order->getMiddleName()) ?></MiddleName>
				<LastName><?php echo htmlspecialchars($order->getLastName()) ?></LastName>
				<Company><?php echo htmlspecialchars($order->getCompany()) ?></Company>
				<Street1><?php echo htmlspecialchars($order->getAddress()) ?></Street1>
				<Street2><?php echo htmlspecialchars($order->getStreet2()) ?></Street2>
				<Street3><?php echo htmlspecialchars($order->getStreet3()) ?></Street3>
				<City><?php echo htmlspecialchars($order->getCity()) ?></City>
				<State><?php echo htmlspecialchars($order->getState()) ?></State>
				<PostalCode><?php echo $order->getPostCode() ?></PostalCode>
				<Country><?php echo $order->getCountry() ?></Country>
				<CountryCode><?php echo $order->getCountry() ?></CountryCode>
				<Residential><?php echo $order->getResidential() ?></Residential>
				<Phone><?php echo $order->getPhone() ?></Phone>
				<Fax><?php echo $order->getFax() ?></Fax>
				<Email><?php echo htmlspecialchars($order->getEmail()) ?></Email>
				<Website><?php echo htmlspecialchars($order->getWebsite()) ?></Website>
			</BillingAddress>
			<Payment>
				
			</Payment>
			<Notes>
			<?php if ( $order->getCoupons() != null ) { ?>
				<?php foreach( $order->getCoupons() as $coupon ) { 
						if($coupon) :?>
				<Note public="true"><?php echo htmlspecialchars($coupon);?></Note>
				<?php 	endif;
					} 
				}
				?>
			<?php if ( $order->getPrivateNotes() != null ) { ?>
				<?php foreach( $order->getPrivateNotes() as $note ) { 
						if($note) :?>
					<Note public="false"><?php echo "Private Message: " . htmlspecialchars($note);?></Note>
				<?php 	endif;
					} 
			}?>	

			<?php if ( $order->getCustomerMessage() != null ) { ?>
				<?php foreach( $order->getCustomerMessage() as $message ) { 
						if($message) : ?>
					<Note public="true"><?php echo "Customer Message: " . htmlspecialchars($message);?></Note>
				<?php 	endif;
						} 
			}?>		
			</Notes>
			<Items>			
			<?php foreach( $order->getItems() as $item ) { ?>
				<Item>
					<ItemID><?php echo $item->getItemID(); ?></ItemID>
					<ProductID><?php echo $item->getProductID(); ?></ProductID>
					<Code><?php echo $item->getCode(); ?></Code>
					<SKU><?php echo $item->getSku(); ?></SKU>
					<Name><?php echo $item->getName(); ?></Name>
					<Quantity><?php echo $item->getQuantity(); ?></Quantity>
					<UnitPrice><?php echo $item->getUnitPrice(); ?></UnitPrice>
					<UnitCost><?php echo $item->getUnitCost(); ?></UnitCost>
					<Image><?php echo $item->getImage(); ?></Image>
					<ThumbnailImage><?php echo $item->getImageThumbnail(); ?></ThumbnailImage>
					<Weight><?php echo $item->getWeight(); ?></Weight>
					<?php if( $item->getAttributes() != null ) { ?>
					<Attributes>
					<?php foreach( $item->getAttributes() as $i => $attribute ) { ?>
						<Attribute>
							<AttributeID><?php echo $i; ?></AttributeID>
							<Name><?php echo $attribute->getName(); ?></Name>
							<Value><?php echo $attribute->getValue(); ?></Value>
							<Price><?php echo $attribute->getPrice(); ?></Price>
						</Attribute>
					<?php } ?>
					</Attributes>
					<?php } ?>
				</Item>
			<?php } ?>
			</Items>
			<Totals>
        <GrandTotal><?php echo $order->getTotal() ?></GrandTotal>
        <Shipping><?php echo $order->getFreight() ?></Shipping>
        <Tax><?php echo $order->getTax() ?></Tax>
        <Discount><?php echo $order->getDiscount() ?></Discount>
        <Fee><?php echo $order->getFee() ?></Fee>
			</Totals>
		</Order>
		<?php if ( isset( $numberLimite ) ) { $numberLimite--; }
				} ?>
		<?php } ?>
	</Orders>
</Upela>
