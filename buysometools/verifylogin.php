<?
session_start();
require_once("securitycheck.php");
if($userObject)
{
  header("location:checkout1.php");
}
else
  header("location:login_register.php");

?>
