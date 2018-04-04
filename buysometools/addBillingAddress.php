<?
session_start();
require_once("securitycheck.php");
require_once("includes/config.php");
require_once("classes/cart_class.php");
require_once('classes/user_class.php');

$c = new cart();


if($_POST[previous])
{
	$_SESSION[add_Bill] = $_POST[previous];
	  header("location:checkout3.php");
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
		$_SESSION[add_Bill] = $db->lastid();
    header("location:checkout3.php");
  }
else
 {
  header("location:checkout2.php");
}


}

?>
