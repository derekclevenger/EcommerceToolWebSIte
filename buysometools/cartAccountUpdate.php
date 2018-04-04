<?
session_start();
require_once("securitycheck.php");
require_once("includes/config.php");
require_once("classes/cart_class.php");
require_once('classes/user_class.php');
$db = new DB();
$c = new cart();
if($userObject)
{

  if(isset($_SESSION[id]))
    {
      if($_SESSION[id] != $userObject->getID())
      {
          //adding in an update where there may be currently things in your cart when you sign in
          $checkUser = $c->updateCart($userObject->getID());
          if(isset($checkUser))
          {
            $oldID = $c->updateCart($_SESSION[id]);
            foreach($checkUser as $user)
            {
              foreach($oldID as $old)
                {

                  if($user[pro_ID] == $old[pro_ID])
                    {
                      $checkOpts = $c->checkOpt($user[cart_ID],$user[pro_ID]);
                      if(isset($checkOpts))
                      {
                        $checkNewOpts = $c->checkOpt($old[cart_ID],$old[pro_ID]);
                        foreach($checkOpts as $oldOpts)
                        {
                          foreach($checkNewOpts as $newOpts)
                          {

                            if($oldOpts[opt_ID] == $newOpts[opt_ID])
                            {

                                $where_clause = array(
                                    'cart_id' => $_SESSION[id],
                                    'pro_id' => $oldOpts[pro_ID],
                                    'opt_id' => $oldOpts[opt_ID]
                                  );

                                  $db->delete( 'cartopts', $where_clause, 1 );

                                }
                            }
                          }
                        }
                      if($user[cart_qty] != $old[cart_qty])
                        {
                          $update = array(
                            'cart_qty' => $old[cart_qty]
                          );
                          //Add the WHERE clauses
                          $where_clause = array(
                            'cart_id' => $userObject->getID(),
                            'pro_id' => $user[pro_ID]
                          );

                          $db->update("cart", $update, $where_clause,1);
                        }

                      if($user[cart_qty] ==  $old[cart_qty])
                      {
                        $where_clause = array(
                      			'cart_id' => $_SESSION[id],
                      	'pro_id' => $old[pro_ID]
                      	);

                      	$db->delete( 'cart', $where_clause, 1 );
                      }
                    }
                }

            }
          }
        $check = $c->checkCartCount($_SESSION[id]);
      if($check[0][number] != 0 )
      {

    //checking cart for any  items with the tempID


        $update = array(
            'cart_id' => $userObject->getID()
        );
        //Add the WHERE clauses
        $where_clause = array(
            'cart_id' => $_SESSION[id]
        );
        $number = $check[0][number];
      $db->update("cart", $update, $where_clause, $number);


    }
    $optCheck = $c->checkOptCount($_SESSION[id]);
    if($optCheck[0][number] != 0)
    {
      $update = array(
          'cart_id' => $userObject->getID()
      );
      //Add the WHERE clauses
      $where_clause = array(
          'cart_id' => $_SESSION[id]
      );
      $nums = $optCheck[0][number];
    $db->update("cartopts", $update, $where_clause, $nums);
    }
    }
      // "there";
      //  exit();

      //check options to make sure it is right
      $_SESSION[id] = $userObject->getID();
}
  $_SESSION[id] = $userObject->getID();
}
?>
