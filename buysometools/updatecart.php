<?

session_start();
require_once("securitycheck.php");
require_once("includes/config.php");
require_once("classes/cart_class.php");
require_once('classes/user_class.php');
$db = new DB();
$c = new cart();

//require_once('classes/db_class.php');

$realID = $_POST[id];



	$db = new DB();
if($_POST[qty] != 0)
{
	//Fields and values to update
    $update = array(
        'cart_qty' => $_POST[qty]
    );
    //Add the WHERE clauses
    $where_clause = array(
        'cart_id' => $_SESSION[id],//need to get the tempID
		'pro_id' => $realID
    );

	$db->update("cart", $update, $where_clause, 1);
}

if($_POST[qty] == 0)
{
	$where_clause = array(
			'cart_id' => $_SESSION[id],//need to get the tempID
	'pro_id' => $realID
	);

	$db->delete( 'cart', $where_clause, 1 );


$counter = $c->checkOpt($_SESSION[id],$realID);
if(!empty($counter))
	{
		$db->delete('cartopts', $where_clause,1);
	}

}
?>
