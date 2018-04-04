<?
//PULLING FOR THE AUTOCOMPLETE FUNCTION OF THE SEARCHBAR

if ($_POST[type]== "db")
{
	// includes our site configuration file
	require_once("includes/config.php");

    //Initiate the class
  $pro = new products();
	$rows = $pro->getDropDown();
	// generate our listing of matching products
	foreach ($rows as $product)
	{

			$db[]=  $product[cat_NAME] ;

	}

echo json_encode($db ,JSON_UNESCAPED_SLASHES);
//ENDING THE AUTOCOMPLETE SEARCHBAR


//GETTING MY RETURN PAGE FOR MY SEARCH BAR








//FIRST AND LAST NAME AUTOCOMPLETE FOR FORM FIELDS
}
//getting type from js
if ($_POST[type] == "first")
		{
			$first= file('text/firstnames.txt',FILE_IGNORE_NEW_LINES);
			echo json_encode($first);
		}
		//getting type from js for last
else if ($_POST[type] == "last")
		{
			$last = file('text/lastnames.txt',FILE_IGNORE_NEW_LINES);
			echo json_encode($last);
		}

?>
