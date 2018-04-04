<?

require_once("includes/config.php");

class cart
{


public function __construct()
{
  if($cart_ID == '')
  {
    //nothign should happen because it is require
  }
  else
  {
      $this->cart_ID= $temp_ID;
      $this->pro_ID= $pro_ID;
      $this->cart_qty = $cart_qty;

  }
}



public function getTempID()
{
  $db = new DB();
  $q = "select MIN(cart_ID) as minID from cart";
  $result = $db->get_results($q);
  return $result;

}


public function getCartOpts($id)
{
  $db = new DB();

  $q = "Select * from cartopts where cart_ID = $id";
  $number = $db->get_results($q);


  return $number;
}

public function addToCart($cart_ID,$pro_ID, $cart_qty)
{
  $db = new DB();

  $cartInfo = array($cart_ID, $pro_ID, $cart_qty);
  $this->cart[] = $cartInfo;
}


public function getCart($num)
{
  $ID = $num;
  $db = new DB();
  $q = "select * from cart, product where
	         product.pro_id=cart.pro_id and cart_id=$ID";

  $rows = $db->get_results($q);

  return $rows;

}



public function check($user, $num)
{
  $db = new DB();
  //$q = "Select COUNT(*) from cart where cart_ID = $user and  pro_ID = $num";

  //$number = $db->num_rows($q);

  $q = "Select * from cart where cart_ID = $user and pro_ID = $num";
  $number = $db->get_results($q);


  return $number;
}

public function checkOpt($user,$num)
{
  $db = new DB();

  $q = "Select * from cartopts where cart_ID = $user and pro_ID = $num";
  $number = $db->get_results($q);


  return $number;


}

public function cartOpts($user, $num)
{
$db = new DB();

$q = "  select * from cartopts, prodopt where
				cart_ID=$user and prodopt.pro_ID=cartopts.pro_ID
				and cartopts.pro_ID=$num
        and cartopts.opt_ID=prodopt.opt_ID";
  $row = $db->get_results($q);

  return $row;
}


public function checkCartCount($id)
{
  $db = new DB();

  $q = "Select count(*) as number from cart where cart_ID = $id";

  $count = $db->get_results($q);

  return $count;
}

public function checkOptCount($id)
{
  $db = new DB();

  $q = "Select count(*) as number from cartopts where cart_ID = $id";

  $count = $db->get_results($q);

  return $count;
}

public function checkCount($id)
{
  $db = new DB();

  $q = "Select count(*) as number from cartopts,cart where cart_ID = $id";

  $count = $db->get_results($q);

  return $count;
}

public function updateCart($num)
{
  $db = new DB();
  $q = "select * from cart where
	        cart_id=$num";

  $rows = $db->get_results($q);

  return $rows;

}

public function checkOptUpdate($user,$num,$option)
{
  $db = new DB();

  $q = "Select * from cartopts where cart_ID = $user and pro_ID = $num and opt_ID = $option";
  $number = $db->get_results($q);


  return $number;


}
}//end class CART


?>
