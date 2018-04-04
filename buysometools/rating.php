<?php
require_once("includes/config.php");
require_once('classes/review_class.php');



$id = $_POST[prod_id];


if ($_POST)
{


$db = new DB();
$rev = new review();
//$q = 'Select * from review';
//$revid = $db->get_results($q);
$revid = $db->lastid();

//$data[rev_ID] = $rev->getRevID(); //7;//$db->lastid();
$data[rev_Score] = $_POST[rating_star];
$data[rev_Detail] = $_POST[review];
$data[pro_ID] = $_POST[prod_id];
$data[cus_ID] = 25;//come back and fix this once I have users set up.
$validInsert = $db->insert("review", $data);


if ($validInsert)
	{
//$db->lastid(),$rev->getRevID//$db->lastid(),
		$rev->addReviews(null,$_POST[rating_star],$_POST[review],$_POST[prod_id],25);
  }

header("location:detail.php?id=$id");


}

?>
