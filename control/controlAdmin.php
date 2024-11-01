<?php

include_once( PLUGIN_PATH_UPELAWORDPRESS .'model/User.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/Software.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS .'functions/functions.php' );
	
$user = new User();
$software = new Software();

$test = $user->getUsername();

$testAddress = $user->getCompanyName();

if (!empty($test)) {
	$boutonUpdate = __("Update", 'upela');	
}
if (!empty($testAddress)) {
	$boutonUpdateAdresse = __("Update", 'upela');	
}

$countries = get_country_array();

if (isset($_POST['send-credentials'])) {
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$user->setCredentials($_POST['username'],$_POST['password']);			
	}
	else {
		$message = "Your Username and password can't be empty, please fill them and update";	
	}
}
else if (isset($_POST['send-address'])) {
	if (!empty($_POST['company_name']) 
				&& !empty($_POST['street1']) 
				&& !empty($_POST['city']) 
				&& !empty($_POST['zip']) 
				&& !empty($_POST['country'])) {
	$user->setAddress($_POST['company_name'],
						$_POST['street1'],
						$_POST['street2'],
						$_POST['street3'],
						$_POST['city'],
						$_POST['state'],
						$_POST['zip'],
						$_POST['country'],
						$_POST['phone'],
						$_POST['support']);
	}
	else {
		$message = "We coudn't update your address, please fill the required fields and try again";
	}
	$testAddress = $user->getCompanyName();
	if (!empty($testAddress)) {
		$boutonUpdateAdresse = __("Update", 'upela');	
	}
}

include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/admin.php' );
?>