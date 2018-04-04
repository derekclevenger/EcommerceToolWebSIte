<?
session_start();
require_once("securitycheck.php");
require_once("includes/config.php");
require_once("classes/cart_class.php");
require_once('classes/user_class.php');

$c = new cart();


if($_POST[previous])
{
	$_SESSION[car_ID] = $_POST[previous];
	$db = new DB();
	$getCard = $userObject->getPurchaseCard();
	foreach($getCard as $card)
	{
		$_SESSION[cardNum] = $card[car_Num];
		$_SESSION[cardName] = $card[car_Name];
		$_SESSION[cardExp] =  $card[car_Exp];
		$_SESSION[cardSec] = $card[car_Sec];
	}
	  header("location:checkout4.php");
}
else
{
$db = new DB();

//fix the post fields

//$data[rev_ID] = $rev->getRevID(); //7;//$db->lastid();
$data[car_Num] = $_POST[cardNum];
$data[car_Name] = $_POST[cardName];
$data[car_Exp] = $_POST[cardExp];
$data[car_Sec] =  $_POST[cardSec];
$data[car_Active] =  "Y";
$data[cus_ID] = $_SESSION[id];
$validInsert = $db->insert("card", $data);


if ($validInsert)
	{
		$_SESSION[car_ID] = $db->lastid();
//pull the posts to make it quicker to process
		$_SESSION[cardNum] = $_POST[cardNum];
		$_SESSION[cardName] = $_POST[cardName];
		$_SESSION[cardExp] =  $_POST[cardExp];
		$_SESSION[cardSec] = $_POST[cardSec];



   header("location:checkout4.php");
  }
else
 {
  header("location:checkout3.php");
}


}

?>

















?>
