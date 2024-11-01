<?php
error_reporting(1);

include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/User.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/Software.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/StatusCodes.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/Count.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/Order.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/Orders.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/Item.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/Attribute.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/StatusManager.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'model/TrackingManager.class.php' ) ;
include_once( PLUGIN_PATH_UPELAWORDPRESS . 'functions/functions.php' );
	
$user = new User();

$name = $user->getUsername();
$pass = $user->getPassword();
$goodCredentials = false;
$date = null;

$goodCredentials = ( ( $_REQUEST['username'] == $name ) && ( $_REQUEST['password'] == $pass ) );

// On veut récupérer le logiciel installer et sa version

$software = new Software();

// On commence le traitement si l'idification a été faite

if ( $goodCredentials ) {
	$action = htmlspecialchars( $_REQUEST['action'] );
	if( 'getmodule' == $action ) {
		include_once(PLUGIN_PATH_UPELAWORDPRESS . 'view/module.php');
	}
	else if( 'getstore' == $action ) {
		include_once(PLUGIN_PATH_UPELAWORDPRESS . 'view/store.php');
	}
	// On continue le traitement si on a un logiciel de e-commerce reconnu
	else if ( $software->isCompatible() ) {
		if ( 'getstatuscodes' == $action ) {
			$statusCodes = new StatusCodes($software);
			include_once(PLUGIN_PATH_UPELAWORDPRESS . 'view/statusCode.php');
		} else if ( 'getcount' == $action ) {
				if ( isset($_REQUEST['start']) ) {
					$date = htmlspecialchars($_REQUEST['start']);
					$count = new Count( $software, $date );
					include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/count.php' );
				} else {
					$count = new Count($software);
					include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/count.php' );
				}

		} else if ( 'getorders' == $action ) {
    
			if ( isset($_REQUEST['start']) ) {
					$numberLimite = 100;
					$date = htmlspecialchars($_REQUEST['start']);
					$orders = new Orders( $software, $date );
					include_once(PLUGIN_PATH_UPELAWORDPRESS . 'view/orders.php');
						
			} else {
				$orders = new Orders($software);
				include_once(PLUGIN_PATH_UPELAWORDPRESS . 'view/orders.php');
			}
		} else if ( 'updatestatus' == $action ) {
			$order = htmlspecialchars( $_REQUEST['order'] );
			$status = htmlspecialchars( $_REQUEST['status'] );
			$comment = htmlspecialchars( $_REQUEST['comments'] );
			$statusManager = new StatusManager(  $software, $date, $order, $status, $comment );
			if ( $statusManager->getResult() ) {
				include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/statusSuccess.php' );
			} else {
				include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/statusFail.php' );
			}
		} else if ( 'updateorder' == $action ) {
			$order = htmlspecialchars( $_REQUEST['order'] );
      $status = htmlspecialchars( $_REQUEST['status'] );
			$comment = isset($_REQUEST['comments']) && !empty($_REQUEST['comments']) ? htmlspecialchars( $_REQUEST['comments'] ) : '';
			$date = isset($_REQUEST['shippingdate']) && !empty($_REQUEST['shippingdate']) ? htmlspecialchars( $_REQUEST['shippingdate'] ) : date("y-m-d");
			$carrier = isset($_REQUEST['carrier']) && !empty($_REQUEST['carrier']) ? htmlspecialchars( $_REQUEST['carrier'] ) : '';
			$tracking = isset($_REQUEST['tracking']) && !empty($_REQUEST['tracking']) ? htmlspecialchars( $_REQUEST['tracking'] ) : '';
      $statusManager = new StatusManager(  $software, $date, $order, $status, $comment );
      $result1 = $statusManager->getResult();
			$trackingManager = new TrackingManager(  $software, $date,  $carrier, $order, $tracking );
      $result2 = $trackingManager->getResult();
			if ($result1 && $result2) {
				include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/trackingSuccess.php' );
			} else {
				include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/trackingFail.php' );
			}
		}
	} else {
		$description = __("You have succesfully installed Upela Connector on your website.", 'upela'). ' ' . __("We didn't find any E-commerce plugin activated on your website, please activate it.", 'upela');
		include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/error.php' );
	}
} else {
	// Cas ou les identifiants ne sont pas bons
	$description = __("Wrong credentials.", 'upela');
	include_once( PLUGIN_PATH_UPELAWORDPRESS . 'view/error.php' );
}


?>