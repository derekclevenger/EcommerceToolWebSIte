<?
session_start();
require_once("includes/config.php");
class user
{


  private $fname;
  		private $lname;
  		private $email;
  		private $phone;
  		private $uid;
  		//private $accounts;

  		public function __construct($fname="", $lname="", $email="",  $uid="")
  		{
  			// default construtor, do not set up variables
  			if ($fname == "")
  			{
  				// do nothing
  			}
  			else
  			{
  				$this->fname = $fname;
  				$this->lname = $lname;
  				$this->email = $email;
  				$this->uid = $uid;

  				// populate current accounts
  			}
  		}

  		public function getName()
  		{
  			return $this->fname . " " . $this->lname;
  		}

  		public function getID()
  		{

  			return $this->uid;
  		}

  		public function __toString()
  		{
  			return $this->fname . " " . $this->lname;
  		}

  		public function addAccount($id, $name)
  		{
  			$accountInfo = array($id, $name);
  			$this->accounts[] = $accountInfo;
  		}

  		public function getUserAddress()
      {
        $db = new DB();
        $q = "Select * from address where cus_ID = $this->uid";
        $rows = $db->get_results($q);
        return $rows;
      }
      public function getShippingWeight()
      {
        $db = new DB();
        $q = "Select * from cart, product where cart.pro_ID = product.pro_ID and cart.cart_ID = $this->uid";
        $rows = $db->get_results($q);
        foreach($rows as $r)
        {
          $weight = $weight + ($r[cart_qty] * $r[pro_Weight]);
        }
        $weight = number_format($weight/16,0);
        return $weight;
      }
      public function getShipAddress($id)
      {
        $db = new DB();
        $q = "Select * from address where add_ID = $id";
        $rows = $db->get_results($q);
        return $rows;
      }

      public function getOldCards()
      {
        $db = new DB();
        $q = "Select * from card where cus_ID = $this->uid and car_Active = 'Y' ";
        $rows = $db->get_results($q);
        return $rows;
      }
	  public function getPurchaseCard()
	  {
		   $db = new DB();
        $q = "Select * from card where car_ID = $_SESSION[car_ID]";
        $rows = $db->get_results($q);
        return $rows;
	  }
    public function getOrder()
    {
      $db = new DB();
      $q = "Select * from `order`,orddetail,product where order.ord_ID = $_SESSION[ord_ID]
              and order.ord_ID = orddetail.ord_ID and  orddetail.pro_ID = product.pro_ID";
      $rows = $db->get_results($q);
      return $rows;
    }
public function getOrderOpt()
{
  $db = new DB();
  $q = "Select * from `order`,orddetailopts,prodopt where order.ord_ID = $_SESSION[ord_ID]
          and order.ord_ID = orddetailopts.ord_ID and  orddetailopts.opt_ID = prodopt.opt_ID";
  $rows = $db->get_results($q);
  return $rows;
}

public function getOrderReview()
{
  $db = new DB();
  $q = "Select ord_ID, date_format(ord_Date,'%e %b, %Y') as order_date, ord_track from `order` where cus_ID = $this->uid
        order by ord_Date desc";
  $rows = $db->get_results($q);
  return $rows;
}

public function getOrderDate($id)
{
  $db = new DB();
  $q = "Select ord_ID, date_format(ord_Date,'%e %b, %Y') as order_date, ord_track from `order` where ord_ID = $id";
  $rows = $db->get_results($q);
  return $rows;
}

}
?>
