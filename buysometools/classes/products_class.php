<?
require_once("includes/config.php");
class products
{


      public function __construct()
      {
        //$db = new DB();
      }


//gets the sub categories of a product
public function getSubCats()
{
 $database = new DB();
  $q = "select * from category where cat_SubCat != cat_ID  ";
  $newRows = $database->get_results($q);
  return $newRows;
}

//gets a category of a product
public function getCategory()
{
  $database= new DB();
  $query = "select * from category ";
  $rows = $database->get_results($query);

  return $rows;
}

//gets our details of a product
public function getProducts()
{
  //details for a single product
 $db = new DB();
  $q ="select * from product ";
  $r = $db->get_results($q);
  return $r;
}

//gets our products listing
public function getDataTable()
{
  $id = $_GET['id'];
 $db = new DB();
 $product_query = "SELECT *
                    FROM product
                    WHERE cat_ID IN (select cat_ID from category where cat_Subcat = $id OR   cat_ID = $id)";

 //$product_query = "select * from category where cat_ID = $id OR cat_Subcat = $id";
  $row = $db->get_results($product_query);
  return $row;
}

//used to get the featured prodcuts
public function getFeaturedProducts()
{
 $db = new DB();
  $query = "select * from product where pro_Feat = 'Y' OR pro_Feat = 'T' ";
  $rows = $db->get_results($query);
  return $rows;
}

//populates the dropwdown menu in the header
public function getDropDown()
{
  $database = new DB();

// query to search our product database by product name
$query = "select cat_ID, cat_NAME from category where
    cat_NAME LIKE '%" . $_POST[searchTerm] . "%'";

// issue the query against the database
$rows = $database->get_results($query);


return $rows;
}

public function search()
{
 $database = new DB();

// query to search our product database by product name
$q= "select cat_Name,cat_ID from category where
          cat_Name LIKE  '%" . $_POST[searchTerm] . "%'";

// issue the query against the database
$row = $database->get_row($q);
return $row;
}


public function quickView($id)
{
$db = new DB();


$q = "select * FROM product where pro_ID = $id";

$row = $db->get_results($q);
return $row;

}


public function getOpts($id)
{
  $db = new DB();

  $q = "select * from prodopt where pro_ID = $id";

  $row = $db->get_results($q);

  return $row;
}






}

?>
