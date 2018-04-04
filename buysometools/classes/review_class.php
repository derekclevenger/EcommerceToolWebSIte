<?
//require_once("includes/config.php");



class review
{
  private $rev_ID;
  private $rev_Score;
  private $rev_Detail;
  private $pro_ID;
  private $cus_ID;

  public function __construct( $rev_Score = '', $rev_Detail='', $pro_ID = '', $cus_ID = '')
  {
    if($rev_Score == '')
    {
      //nothign should happen because it is require
    }
    else
    {
        $this->rev_ID = $id;
        $this->rev_Score = $rev_Score;
        $this->rev_Detail = $rev_Detail;
        $this->pro_ID = $pro_ID;
        $this->cus_ID = $cus_ID;
    }
  }

//getting the ratings for comparison
public function getRatings($num)
{
//  $id = $num;
  $db = new DB();

  $q= "SELECT sum(rev_Score)/count(rev_Score) as AVGREV
        FROM REVIEW
        WHERE pro_ID = $num";

  $r = $db->get_results($q);

//$counter = 0;
//foreach($r as $total)
//{
//  $number = $number + $total[rev_Score];
//  $counter++;
//}

//$number = $number/$counter;

  return $r[0][AVGREV];


}

  //shows the reviews
public function getReviews()
{
  $db = new DB();
  $query = "select * from review";
  $r = $db->get_results($query);
  return $r;
}



public function getRevRatings($num)
{
  $db = new DB();

  $exists = $db->exists('review', 'pro_ID', $num );

 if($exists == 'true' )
 {
  $q= "SELECT rev_Score
        FROM review
        WHERE  pro_ID = $num)";
//use in to just do one full loop
  $r = $db->get_results($q);
$counter = 0;
  foreach($r as $total)
  {
    $number = $number + $total[rev_Score];
    $counter++;
  }

      $number = $number / $counter;
    }
    return $number;

}


//adds reviews to the db
public function addReviews($id,$rev_Score, $rev_Detail, $pro_ID, $cus_ID)
{
  $db = new DB();

  $reviewInfo = array($db->lastid(),$rev_Score, $rev_Detail, $pro_ID, $cus_ID);
  $this->review[] = $reviewInfo;

}

public function getRevID()
{
$db = new DB();

$q = 'select rev_ID from review';
$revid = $db->get_results($q);
$count = count($revid);
$id = $count + 1;
//$revID = $id + 1;

return $id;
}







}
?>
