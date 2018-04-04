<?//added the type = db
if ($_POST[type]== 'search')

{
	// includes our site configuration file
	require_once("includes/config.php");

//moved this below require once

    //Initiate the class
  $pro = new products();
	$rows = $pro->getDropDown();

	// generate our listing of matching products
	foreach ($rows as $product)
	{
		//use for morgans
	//echo $product[pro_ID] . ": " . $product[pro_Name] . "<br />";

	$names = $product[cat_NAME] ;
		echo $names;
	}
}
?>
