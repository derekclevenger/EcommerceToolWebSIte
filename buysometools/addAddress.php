<?
session_start();
require_once("securitycheck.php");
require_once("includes/config.php");
require_once("classes/cart_class.php");
require_once('classes/user_class.php');

$c = new cart();


if($_POST[previous])
{
	$_SESSION[add_ID] = $_POST[previous];
	$address = $userObject->getShipAddress($_SESSION[add_ID]);
	foreach($address as $addy)
	 {

		 $_SESSION[street] = $addy[add_Street];
		 $_SESSION[city] = $addy[add_City];
		 $_SESSION[state] = $addy[add_State];
		 $_SESSION[zip] = $addy[add_Zip];
	 }
	 $_SESSION[userName] =$userObject->getName();
	$_SESSION[weight] = $userObject->getShippingWeight();
	if($_SESSION[weight] < 150)
		{
			require_once("calcShipping.php");
		}
		else
			{
		  		header("location:basket.php");
			}
}
else
{
$db = new DB();

//fix the post fields

//$data[rev_ID] = $rev->getRevID(); //7;//$db->lastid();
$data[add_Street] = $_POST[street];
$data[add_Street2] = $_POST[street2];
$data[add_City] = $_POST[city];
$data[add_State] =  $_POST[state];
$data[add_Zip] =  $_POST[zip];
$data[cus_ID] = $_SESSION[id];//$userObject->getID();
$validInsert = $db->insert("address", $data);


if ($validInsert)
	{
		$_SESSION[add_ID] = $db->lastid();
//changed to pull the posts to make it quicker to process
		$_SESSION[street] = $_POST[street];
		$_SESSION[city] = $_POST[city];
		$_SESSION[state] =  $_POST[state];
		$_SESSION[zip] = $_POST[zip];
/*
		$address = $userObject->getShipAddress($_SESSION[add_ID]);
		foreach($address as $addy)
		 {

			 $_SESSION[street] = $addy[add_Street];
			 $_SESSION[city] = strtoupper($addy[add_City]);
			 $_SESSION[state] = $addy[add_State];
			 $_SESSION[zip] = $addy[add_Zip];
		 }
		 */
		 $_SESSION[userName] =$userObject->getName();
		$_SESSION[weight] = $userObject->getShippingWeight();
	if($_SESSION[weight] < 150)
		{
			require_once("calcShipping.php");
		}

		else
			{
					header("location:basket.php");
			}
  }
else
 {
  header("location:basket.php");
}


}

?>

















?>
