<?
session_start();
require_once("securitycheck.php");
require_once("includes/config.php");


if($_POST[previous])
{
	$db = new DB();
//Fields and values to update
	$update = array(
			'car_Active' => 'N'
	);
	//Add the WHERE clauses
	$where_clause = array(
			'car_ID' => $_POST[previous],//need to get the tempID

	);

$db->update("card", $update, $where_clause, 1);
header("location:update-info.php");
}
else
{
$db = new DB();

//fix the post fields


$data[car_Num] = $_POST[cardNum];
$data[car_Name] = $_POST[cardName];
$data[car_Exp] = $_POST[cardExp];
$data[car_Sec] =  $_POST[cardSec];
$data[car_Active] =  "Y";
$data[cus_ID] = $_SESSION[id];
$validInsert = $db->insert("card", $data);


if ($validInsert)
	{
   header("location:update-info.php");
  }
else
 {
  header("location:customer-account.php");
  }


}

?>
