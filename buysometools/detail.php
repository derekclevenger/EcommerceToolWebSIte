<?

  require_once("header.php");
  $id = $_GET['id'];
  require_once('classes/review_class.php');


  $r = $p->getProducts();
  foreach($r as $products)
  {

    $pro = $products[pro_ID];
    $name[] = $products[pro_Name];
    $descript[] = $products[pro_Descript];
    $price[] = $products[pro_Price];
    $quantity[] = $products[pro_Qty];
    $manufacturer[] = $products[pro_Manufacturer];
    $model[] = $products[pro_Model];
    $product_type[] = $products[cat_ID];
    $weight[] = $products[pro_Weight];

  }

?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>

                        <li><? echo $manufacturer[$id - 1]; ?></li>

                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Category</h3>
                            <?
                             $num = $product_type[$id];

                            $d = $p->getCategory();
                            foreach($d as $prod)
                            {
                              if($prod[cat_ID] == $product_type[$id-1])
                                {
                                  echo "<p>$prod[cat_Name]</p>";
                                  $group = $prod[cat_ID];
                                  $mainCat = $prod[cat_SubCat];
                                }
                              }
                            ?>


                        </div>

                      </div>

                      <div class="panel panel-default sidebar-menu">
                          <div class="panel-heading">
                              <h3 class="panel-title">Review This Item</h3><br>
                              <?
                                      echo "<p>" . $name[$id - 1] ."</p>";

                              ?>
                            <form action='rating.php' method = 'POST' id = '' type='rating'>
                                <input value="0" id="rating_star" name = "rating_star" type="hidden" postID="<?echo $id;?>" />
                                <input value="<?echo $id;?>" id="prod_id" name = "prod_id" type="hidden" postID="" />
                              <div id = 'review-box'>
                                <textarea id = 'review'  name = 'review' placeholder= 'Review' required='required' ></textarea>
                              </div>
                                <div  id = 'review-button' >
                                  <button type = 'submit'  id = 'reviewbutton' required="required" class="btn btn-primary"  name="submit" aria-required="true">
                                              <i></i> Submit Review</button>
                                </div>
                            </form>
                      </div>
                        </div>




                      <!-- *** MENUS AND FILTERS END *** -->



                </div>

                <div class="col-md-9">



                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                              <?



                              echo (file_exists("../../products/" . $id . ".jpg")
                                 ? "<a class = 'group1' href = '../../products/" . $id . ".jpg'><img src='../../products/" . $id . ".jpg'"
                                 : "<img src='img/unavailable.jpg'")
                                 . " class='img-responsive'/></a>";




                              ?>
                            </div>


                            <!-- /.ribbon -->

                        </div>

                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><? echo $manufacturer[$id-1]; ?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to"><? echo $name[$id-1]; ?></a>
                                </p>
                                <h3 class="text-center">$ <span class = 'price' id = '<?echo $id;?>_prodtotal'><? echo $price[$id-1]; ?></span></h3>
                                    <form action='addcart.php' method = 'POST' id = '' type='cart'>

                                <input value="<?echo $id;?>" id="prod_id" name = "prod_id" type="hidden" postID="" />

                                <div  id = 'cart-button' class = 'text-center buttons'>
                                  <button type = 'submit'  id = 'cartbutton' required="required" class="btn btn-primary"  name="submit" aria-required="true">
                                          <i class="fa fa-shopping-cart"></i>Add to Cart</button>

                                </div>



                                <?



                                $opts = $p->getOpts($id);
                                if(!empty($opts))
                                {

                                foreach($opts as $opt)
                                {
                                //echo $opt[opt_Group];

                                  if($mainCat != $opt[opt_Group] && $opt[opt_Group] != $group)
                                  {
                                    echo "<h4>Option : " . $opt[opt_Value] . "</h4>";
                                    echo "<div id = 'optbutton'><input type = 'checkbox'  id =" . $opt[opt_ID] ." name = 'option' class = 'option' value = " . $opt[opt_ID] . " >"
                                ?>
                                          <?echo $opt[opt_Name];?> ,
                                            Option: <?echo $opt[opt_Value];?> ,
                                            Price: $<span id ='<?echo $opt[opt_ID];?>_optprice'><?echo $opt[opt_Price];?></span>
                                  <?

                                  echo " </div>";
                                  }

                                else
                                  {
                                      echo "<h4>Option : " . $opt[opt_Value] . "</h4>";
                                    echo "<div id = 'optbutton'><input type = 'radio'  id =" . $opt[opt_ID] ." name = 'option' class = 'option' value = " . $opt[opt_ID] . " >"
                                ?>
                                          <?echo $opt[opt_Name];?> ,
                                            Option: <?echo $opt[opt_Value];?> ,
                                            Price: $<span id ='<?echo $opt[opt_ID];?>_optprice'><?echo $opt[opt_Price];?></span>
                                  <?

                                  echo " </div>";

                                  }

                              }
                            

                                echo "<input type = 'reset' placeholder = 'standard' name = 'reset' class = 'reset'>";
                              }
                                ?>





                              </form>
                            </div>


                        </div>






                    </div>



                    <div class="row" id="thumbs">
                        <div class="col-xs-4">

                            <?

                             echo (file_exists("../../products/" . $id . ".jpg")
                                 ? "<a class = 'thumb' href = '../../products/" . $id . ".jpg'><a class = 'group1' href = '../../products/" . $id . ".jpg'><img src='../../products/" . $id . ".jpg'"
                                 : "<img src='img/unavailable.jpg'")
                                 . " class='img-responsive'/></a></a>";
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

                               echo "<a class = 'group1' href='" . $value . "'><img src='" . $value . "' class='img-responsive' /></a>";

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
                            <p><?echo $descript[$id-1]; ?> </p>


                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
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


                  // $products = new products();
                  $row = $p->getProducts();


                        $while = 0;
                        $number = 0;

                        //drawing table info

                               foreach($row as $product)
                               {

                                // print_r($product);

                                if(($product[cat_ID] == $product_type[$id-1])&&($product[pro_ID] != $id))
                              //  if($product[cat_ID] == $product_type[$id-1])
                            //  if($product[pro_ID] != $id)
                                {
                                  //  echo $product_type[$id];
                                  if($product[pro_ID] == $id)
                                  {
                                    echo "<br/><br/>";
                                  }
                                    else
                                    while($while == 0)
                                      {
                                    echo  "<div class='row same-height-row'>
                                      <div class='col-md-3 col-sm-6'>
                                          <div class='box same-height'>
                                              <h3>Products you may like</h3>

                                          </div>
                                      </div>";
                                      $while++;
                                    }

                                    if($number < 3)
                                    {

                        ?>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?echo $product[pro_ID];?>">
                                                <img src="../../products/<?echo $product[pro_ID];?>.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?echo $product[pro_ID];?>">
                                                <img src="../../products/<?echo $product[pro_ID];?>.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?id=<?echo $product[pro_ID];?>" class="invisible">
                                    <img src="../../products/<?echo $product[pro_ID];?>.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                  <a href="detail.php?id=<?echo $product[pro_ID];?>" >
                                    <h3><?echo $product[pro_Manufacturer];?></h3>
                                    </a>
                                    <p class="price">$<?echo $product[pro_Price];?></p>

                                </div>
                            </div>
                            <!-- /.product -->

                        </div>
                        <?

                      ++$number;  }

                }


             }

                        ?>


                    </div>



                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

<?
  require_once("footer.php");
?>
