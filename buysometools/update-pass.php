<?
session_start();
require_once('securitycheck.php');


if($_POST)
{
  $db = new DB();
//Fields and values to update
  $update = array(
      'cus_Password' => md5($_POST[password])
  );
  //Add the WHERE clauses
  $where_clause = array(
      'cus_ID' => $_SESSION[id],//need to get the tempID
  'cus_Password' => md5($_POST[oldpassword])
  );

$db->update("customer", $update, $where_clause, 1);
}
header("location:customer-account.php");
?>
