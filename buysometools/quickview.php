<?
session_start();


//check for login form submission

if ($_POST[email])
{
  //process form info
  //successful login set user up for session_cache_expire
  $_SESSION[user] = $_POST[email];
}
if(!isset($_SESSION[id]))
{
$tempID = 0;
}
if(isset($_SESSION[id]))
{
$tempID = $_SESSION[id];
}
//print_r($_SESSION);

require_once("includes/config.php");
require_once('classes/products_class.php');
require_once('classes/cart_class.php');
$p = new products();
$id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>BuySomeTools
    </title>

    <meta name="keywords" content="">


    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/colorbox.css" rel="stylesheet">


		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- theme stylesheet -->
    <link href="css/style.blue.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->

    <script src ="js/jquery.colorbox-min.js"></script>
    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="">

    <link href="css/custom.css" rel="stylesheet">


</head>

<body>
<?


$r = $p->quickView($id);
//$row = $p->quickView($id);


foreach($r as $detail)
{



?>

<div class="col-md-12">



    <div class="row" id="productMain">
        <div class="col-sm-6">
            <div id="mainImage">
              <?



              echo (file_exists("../../products/" . $id . ".jpg")
                 ? "<img src='../../products/" . $id . ".jpg'"
                 : "<img src='img/unavailable.jpg'")
                 . " class='img-responsive'/>";




              ?>
            </div>


            <!-- /.ribbon -->

        </div>
        <div class="col-sm-6">
            <div class="box">
                <h1 class="text-center"><? echo $detail[pro_Manufacturer]; ?></h1>
                <p class="goToDescription"><a href="#details" class="scroll-to"><? echo $detail[pro_Name]; ?></a>
                </p>
                <h3 class="text-center">$ <span class = 'price'><? echo $detail[pro_Price]; ?></span></h3>
                    <form action='addcart.php' method = 'POST' id = '' type='cart'>

                <input value="<?echo $id;?>" id="prod_id" name = "prod_id" type="hidden" postID="" />


                <div  id = 'cart-button' class = 'text-center buttons'>
                  <button type = 'submit'  id = 'cartbutton'  class="btn btn-primary"  name="submit" aria-required="true">
                          <i class="fa fa-shopping-cart"></i>Add to Cart</button>

                </div>
                <?
                $qopts = $p->getOpts($id);
                if(!empty($qopts))
                {
                  echo "<h4>Options</h4>";
                foreach($qopts as $qopt)
                {

                  echo "<div id = 'optbutton'><input type = 'radio' id =" . $qopt[opt_ID] ."  name = 'option' class = 'option' value = $qopt[opt_ID] >

                        $qopt[opt_Name] ,
                        Option: $qopt[opt_Value] ,
                        Price: $<span id ='$qopt[opt_ID]_optprice'>$qopt[opt_Price]</span>

                  </div>";
                }

                  echo "<input type = 'reset' placeholder = 'standard' name = 'reset' class = 'reset'>";
                }
                ?>

              </form>
              <br/>

              <div  id = 'infoButton' class = 'text-center buttons'>
                <a href = "detail.php?id=<?echo $id;?>"><button   id = 'infobutton' required="required" class="btn btn-primary"  name="submit" aria-required="true">
                        More Info</button></a>

              </div>
            </div>

        </div>

    </div>

                <div class="row" id="thumbs">
                    <div class="col-xs-4">

                        <?

                         echo (file_exists("../../products/" . $id . ".jpg")
                             ? "<a class = 'thumb' href = '../../products/" . $id . ".jpg'><img src='../../products/" . $id . ".jpg'"
                             : "<img src='img/unavailable.jpg'")
                             . " class='img-responsive'/></a>";
                              ?>


                    </div>
                    <?
                    $photos = glob("../../products/" . $id . "_*");
                    $m = 0;
    // loop through photos array and output each img

                      foreach ($photos as $key=>$value)
                     {



                       ?>
                    <div class="col-xs-4">

                      <a class='thumb'  href='<?echo $value;?>'>

                        <?

                           echo "<img src='" . $value . "' class='img-responsive' />";

                          ?>
                      </a>


                    </div>
                  <?

            }
                ?>
                </div>

    <div class="box" id="details">
        <p>
            <h4>Product details</h4>
            <p><?echo $detail[pro_Descript]; ?> </p>



    </div>



            <?
            $num = 0;
            echo "<div class='box' id='reviews'>
                <h4 class = 'center'>See what other people think about this product!</h4>";
            $r = new review();
            $rev =$r->getReviews();

            echo "<table id='reviews-table' class = 'table'><thead><tr><th colspan = '1'>Reviewer</th>
                   <th colspan='1'>Rating</th><th colspan='1'>Comments</th></tr></thead><tbody>";

          foreach($rev as $review)
          {
            if($review[pro_ID] == $id)
              {


                       echo "<tr><td colspan='1' >" . $review[cus_ID] . "</td><td colspan='1'>"
                            . $review[rev_Score] . "</td><td colspan='1'>"
                            . $review[rev_Detail] . "</td></tr>";

                }
              }

                 echo "</tbody></table>";
                echo "</div>";
            ?>

        <?


}
        ?>


    </div>



</div>
<!-- /.col-md-9 -->

<script>
var itemOpt = 0;

/// This make my option price change on my details and quickview page
var itemPrice = parseFloat($('.price').html()).toFixed(2);

		var itemOpt = parseFloat($('#' + this.id + '_optprice').html()).toFixed(2);


//var newPrice =	parseFloat(itemPrice) + parseFloat(itemOpt);

		$('.option').change(function()
    {
	     itemOpt = parseFloat($('#' + this.id + '_optprice').html()).toFixed(2);
	      var newPrice =	parseFloat(itemPrice) + parseFloat(itemOpt);

	       $('.price').html(newPrice.toFixed(2));


		});

$('.reset').click(function(){

		$('.price').html(itemPrice);

});

</script>




  <!-- /#all scripts to inlcude-->
  <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/jquery.colorbox.js"></script>



        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>







  <!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->

</body>
