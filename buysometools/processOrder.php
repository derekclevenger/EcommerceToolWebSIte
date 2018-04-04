<?
session_start();
require_once("securitycheck.php");
require_once("includes/config.php");
require_once("classes/cart_class.php");
require_once('classes/user_class.php');


$db = new DB();

$_SESSION[ord_date] = date("m-d-Y");

$data[add_Bill] = $_SESSION[add_Bill];
$data[add_Ship] = $_SESSION[add_ID];
$data[car_ID] =  $_SESSION[car_ID];
$data[cus_ID] = $_SESSION[id];
$data[ord_ship] = $_SESSION[shipCost];
$data[ord_track] = rand(1000,1000000);
$validInsert = $db->insert("`order`", $data);

if ($validInsert)
	{

		$_SESSION[ord_ID] = $db->lastid();

		$c = new cart();
		$cartCount = 0;
		$main = $c->getCart($_SESSION[id]);
		foreach($main as $ord)
		{

			$price = $ord[cart_qty] * $ord[pro_Price] * 1.06;
			$dat[ord_ID] = $_SESSION[ord_ID];
			$dat[pro_ID] = $ord[pro_ID];
			$dat[ord_Price] = $price;
			$dat[ord_Qty] = $ord[cart_qty];

			$cartUpdate = $db->insert("orddetail", $dat);
			$cartCount++;
		}
		$optCount = 0;
		$opts = $c->getCartOpts($_SESSION[id]);
		foreach($opts as $orders)
		{

			$opt[ord_ID] = $_SESSION[ord_ID];
			$opt[pro_ID] = $orders[pro_ID];
			$opt[opt_ID] = $orders[opt_ID];

			$cartUpdateOpts = $db->insert("orddetailopts", $opt);
			$optCount++;
		}
		$where_clause = array(
				'cart_id' => $_SESSION[id]
		);
		$db->delete('cart',$where_clause, $cartCount);
		$db->delete('cartopts',$where_clause,$optCount);

   header("location:customer-order.php");
 }
  else {
     header("location:checkout4.php");
  }


?>
