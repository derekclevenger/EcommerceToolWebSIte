<?
session_start();
require_once("securitycheck.php");
require_once("includes/config.php");
require_once("classes/cart_class.php");
require_once('classes/user_class.php');
$db = new DB();
$c = new cart();
//come back and make this an if else to get cus_ID if it is set
//if it isn't use the temp id for cart
//need to make tempid for cart there temp cus_id to pull there cart info



$id = $_POST[prod_id];

$option = $_POST[option];
/*
if(isset($_SESSION[user])){
          $_SESSION[user]= $_POST[email];
          $tempID = {$_SESSION[user]};
      }
*/


 if (!isset($_SESSION[id]))
 {

	$temp = $c->getTempID();
  foreach($temp as $t)
  {
    $tID = $t[minID];
    $tempID = $tID -1;
  }



  if($tempID< 0)
  {
    $_SESSION[id]  = $tempID;
  }
  else
  {
    $_SESSION[id] = -1;
  }

  }

  $cID = $_SESSION[id];

  $count = $c->check($_SESSION[id],$id);


if ($_POST)
{



if(!empty($count))
  {


$qty =$count[0][cart_qty];
$quantity = $qty + 1;

//Fields and values to update
  $update = array(
      'cart_qty' => $quantity
  );
  //Add the WHERE clauses
  $where_clause = array(
      'cart_id' => $_SESSION[id],
  'pro_id' => $id
  );

$db->update("cart", $update, $where_clause, 1);



  }
if(empty($count))
{
 //this puts it in the cart if it doesn't exist
      $data[cart_ID] = $_SESSION[id];//$tempID;
      $data[pro_ID] = $id;//$_POST[prod_id];
      $data[cart_qty] = 1;
      $validInsert = $db->insert("cart",$data);//original
  }



if(isset($_POST['option']))
{

  $counter = $c->checkOpt($_SESSION[id],$id);

//if were possible to increment do the same as above for carts and output qty and add to price
  if(empty($counter))
  {
    $d[cart_ID] = $_SESSION[id];
    $d[pro_ID] = $id;
    $d[opt_ID] = $_POST[option];
    $insert = $db->insert("cartopts",$d);
  }



}




}

header("location:basket.php");

?>
