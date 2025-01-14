<?php echo '<?xml version="1.0" standalone="yes" ?>'; ?>
<Upela moduleVersion="1.0.0" schemaVersion="1.0.0">
	<Store>
    <Platform>woocommerce</Platform>
		<Name><?php echo $user->getCompanyName(); ?></Name>
		<CompanyOrOwner><?php echo $user->getCompanyName(); ?></CompanyOrOwner>
		<Email><?php echo $user->getSupport(); ?></Email>
		<Street1><?php echo $user->getStreet1(); ?></Street1>
		<Street2><?php echo $user->getStreet2(); ?></Street2>
		<Street3><?php echo $user->getStreet3(); ?></Street3>
		<City><?php echo $user->getCity(); ?></City>
		<State><?php echo $user->getState(); ?></State>
		<StateCode></StateCode>
		<PostalCode><?php echo $user->getZip(); ?></PostalCode>
		<Country><?php echo get_country_name($user->getCountry()); ?></Country>
		<CountryCode><?php echo $user->getCountry(); ?></CountryCode>
		<Phone><?php echo $user->getPhone(); ?></Phone>
		<Website><?php echo get_home_url(); ?></Website>
	</Store>
</Upela>
