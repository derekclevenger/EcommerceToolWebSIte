<?
if ($_POST[type]="searchTerm")
{
	// includes our site configuration file
require_once("includes/config.php");
    //Initiate the class
/*
    $database = new DB();

	// query to search our product database by product name
	$q= "select cat_Name,cat_ID from category where
						cat_Name LIKE  '%" . $_POST[searchTerm] . "%'";

	// issue the query against the database
	$row = $database->get_row($q);

*/
$p = new products();
$row = $p->search();

if(isset($row))
{
echo "category.php?id= $row[1] ";
}
else
echo "category.php?id=0";

}

?>
