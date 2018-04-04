<?
session_start();
	require_once("securitycheck.php");
	require_once("includes/config.php");
	require_once('classes/products_class.php');
	require_once('classes/cart_class.php');
	require_once("classes/user_class.php");
	//require_once("cartAccountUpdate.php");
	$p = new products();
	$shop = new cart();
	//check for login form submission



	// process either login or registration here



if(!isset($_SESSION[id]))
{
	$tempID = 0;
}
if(isset($_SESSION[id]))
{
	$tempID = $_SESSION[id];
}



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

		<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />

    <!-- styles -->

    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- theme stylesheet -->
    <link href="css/style.blue.css" rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
		<link href='css/colorbox.css' rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="">

    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
          <div class="col-md-6 offer" data-animate="fadeInDown">

          </div>
            <div class="col-md-6" data-animate="fadeInDown">

                <ul class="menu">
				<? // need to change the form action to stay here
					//login form below
					if ($userObject)
					{
						?>

						<li><a href = "customer-account.php">Welcome Back <?echo $_SESSION[id];?> !<br />
						 View account details.</a></li>


						<?
					}
					else{
					?>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="register.php">Register</a>
                    </li>


                </ul>
            </div>
        </div>

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">

            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">

                        <form action= 'loginAccount.php' method="post" id = 'login'>
                            <div class="form-group">
															<input id="Email" name="Email" placeholder="Email" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
								                              <label for="email">Email</label>

                            </div>
                            <div class="form-group">
															<input type = 'password' id="userpassword" name="userpassword" placeholder="Password" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
																<label for="password">Password</label>                            </div>

                            <p class="text-center">
                                <button type = 'submit' class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

<!--login form end -->
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>
<?
					}
					?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                 <h2>BuySomeTools<img src ="img/exclaim2.jpg" alt= "!"></h2>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#search" >
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>


					<a class="btn btn-default navbar-toggle" href="basket.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Items in shopping cart</span>
                    </a>

                </div>
            </div>
            <!--/.navbar-header -->


						     <div class="navbar-collapse collapse" id="navigation">
									 <ul class="nav navbar-nav navbar-left">

										 <li class="dropdown yamm-fw">




                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Shop by Category<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
																			<div class='col-sm-12'>
																			<ul>

        																<?
																				/*
																				<li class = 'category'  ><a href="category.php?id=<?echo $cat[$i];?>">
																			<?echo $names[$i++];?></a></li>
																			*/


																			$r = $p->getCategory();
																			//$products = new products();
																			$newRows = $p->getSubCats();
																			//database is included at the top already

																			foreach($r as $catID)
																			{//echo "<ul>";




																				if($catID[cat_SubCat] == "" )
																				{


																				echo"	<ul class = 'category'><a href='category.php?id=" . $catID[cat_ID] . "'>"
																				 . $catID[cat_Name] . "</a>";

																				 $counter++;
																			 }


																				 foreach($newRows as $newCat)


																				 if($newCat[cat_SubCat] == $catID[cat_ID] )
																				 {{

																				echo "<li class = 'subcat'><a href='category.php?id=" . $newCat[cat_ID] . "'>"
																				 . $newCat[cat_Name] . "</a></li>";


																		}


}$counter++;


}//echo "</ul></div>";

echo "</ul>";





																				 ?>

																		</div>

																		</div>
														   </div>
                                <!-- /.yamm-content -->
															</li>
                            </li>

                        </ul>
												
                    </li>









            </div>
            <!--/.nav-collapse -->
						<div class="navbar-buttons">



															<div class="navbar-collapse collapse right" id="search-not-mobile">
																	<button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
																			<span class="sr-only">Toggle search</span>
																			<i class="fa fa-search"></i>
																	</button>
															</div>


								<div class="navbar-collapse collapse right" id="basket-overview">

										<a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart">

										</i>


											<span class="hidden-sm">

										</span>

									</a>
									<div id = 'basket-contents' class="col-sm-3">


<!-- li were above // will use a php loop to populate each one-->
<div class="table-responsive">
		<table class="table">
				<thead>
						<tr>
								<th colspan="1">Product</th>
								<th>Quantity</th>
								<th>Price</th>



						</tr>
				</thead>
				<tbody>
					<?
						$mc = $shop->getCart($tempID);

						if(empty($mc))
						{
							Echo "<p name = 'emptycart' class = 'center'> Empty Cart!</p>";
						}
									foreach($mc as $miniCart)
										{






					?>
						<tr>
								<td>
									  <a href="detail.php?id=<?echo $miniCart[pro_ID];?>">
  									<img src="../../products/<?echo $miniCart[pro_ID];?>.jpg" alt="" class="img-responsive">
									</a>

								<td class = 'center'>
 								 <span class = '<?echo $miniCart[pro_ID];?>miniqty' ><?echo $miniCart[cart_qty];?></span>

								</td>
								<td>$<?echo $miniCart[pro_Price];?></td>

								<?
								$mopt = $shop->cartOpts($tempID, $miniCart[pro_ID]);
								foreach($mopt as $mopts)
								{
								?>
						</tr>
						<tr>
						<td><?echo $mopts[opt_Name];?></td>
						<td class = 'center'> <span class = '<?echo $miniCart[pro_ID];?>miniqty' ><?echo $miniCart[cart_qty];?></span></td>
						<td>$<span class = '<?echo $miniCart[pro_ID];?>_price'><?echo $mopts[opt_Price];?></td>

					</tr>

						<?
						  $min_opt_tot = $min_opt_tot + $miniCart[cart_qty] * $mopts[opt_Price];
						}
						$min_rando_prod = $min_rando_prod + $miniCart[pro_Price] * $miniCart[cart_qty];

						}
						$miniSum = $min_rando_prod + $min_opt_tot;

						?>
				</tbody>
				<tfoot>
						<tr>
								<th colspan="2">Subtotal :</th>
								<th colspan="1">$<span class = 'cartTotal'><?echo number_format($miniSum,2);?></span></th>
					</tr>
				</tfoot>
		</table>

</div>


									</div>


								</div>

								<!--/.nav-collapse -->


						</div>




						<div class="collapse clearfix" id="search">

								<form class="navbar-form" role="search" id = 'dbsearch'>
										<div class="input-group">

												<input type="text"  class="form-control" placeholder="Search" id = "searchbar">

												<span class="input-group-btn">

						<button type="submit" id = 'searchbutton' class="btn btn-primary"><i class="fa fa-search"></i></button>

				</span>
										</div>
								</form>

						</div>



		            <!--/.nav-collapse -->

		        </div>
		        <!-- /.container -->
		    </div>
		    <!-- /#navbar -->

		    <!-- *** NAVBAR END *** -->
