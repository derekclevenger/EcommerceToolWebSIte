<?
session_start();
require_once("includes/config.php");


if($_POST[previous])
{
	$db = new DB();
	$where_clause = array(
			'add_ID' => $_POST[previous],//need to get the tempID
	'cus_ID' => $_SESSION[id]
	);

	$db->delete( 'address', $where_clause, 1 );

header("location:update-info.php");
}
else
{


$db = new DB();

//fix the post fields
$data[add_Street] = $_POST[street];
$data[add_Street2] = $_POST[street2];
$data[add_City] = $_POST[city];
$data[add_State] =  $_POST[state];
$data[add_Zip] =  $_POST[zip];
$data[cus_ID] = $_SESSION[id];//$userObject->getID();
$validInsert = $db->insert("address", $data);


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
