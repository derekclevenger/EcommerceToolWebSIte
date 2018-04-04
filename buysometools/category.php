<?
  require_once("header.php");
  require_once('classes/review_class.php');

  $id = $_GET['id'];

$rows = $p->getCategory();
                              foreach($rows as $category)
                                {
                              $names[] = $category[cat_Name];
                              $sub_cat[] = $category[cat_SubCat];
                              $cat[] = $category[cat_ID];
                            }


?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                  <ul class="breadcrumb">
                      <li><a href="index.php">Home</a>
                      </li>
                      <li><?echo $names[$id - 1]; ?></li>
                  </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Filter by Rating</h3>
                        </div>



                        <div class="panel-body" >


                              <div class = 'rating'>
                              <input  id = "rating_star" name="rating" type="text"  placeholder ="0" value = '' hidden>
                            </div>







                        </div>
                    </div>
                    <div class="panel panel-default sidebar-menu" id = 'pushdown'>

						<div class="panel-heading">
                            <h3 class="panel-title">Filter by Price</h3>
                        </div>


                        <div class="panel-body">

                          <table cellpadding="3" cellspacing="3" border="0">
                                <tbody><tr>
                                    <td>Minimum Price:</td>
                                  </tr>
                                  <tr>
                                    <td><input  id = "min" name="min" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Maximum Price:</td>
                                  </tr>
                                  <tr>
                                    <td><input id="max" name="max" type="text"></td>
                                </tr>
                            </tbody></table>



                        </div>
                    </div>



                    <!-- *** MENUS AND FILTERS END *** -->


                </div>
                <div class="col-md-9">








                    <?


                    echo "<table id='products'><thead><tr><th>" . $names[$id-1] . "</th>
                           <th>Description</th><th><p class = 'hide'>Rating</p></th><th id = 'headleft'>Price</th>
                           </tr></thead><tbody>";



                           $row = $p->getDataTable();

                           $r = $p->getProducts();


                           $rev = new review();
                           $reviews = $rev->getReviews();




                           foreach($row as $product)//was category
                         {




                    $rating_id = $rev->getRatings($product[pro_ID]);//$number);

                    if($rating_id == "")
                    {
                      $rating_id = 1;
                    }

                        //  $rating_id = $rev->getRevRatings($product[pro_ID]);

                              echo "<div class='col-md-4 col-sm-6'>";
                              echo "<tr><td class = 'preview' ><a href='detail.php?id="
                                 . $product[pro_ID] . "'>"  .
                                 (file_exists("../../products/" . $product[pro_ID] . ".jpg")
                                    ? "<img src='../../products/" . $product[pro_ID] . ".jpg'"
                                       : "<img src='img/unavailable.jpg'")
                                          . "/></a><br/><span class = 'quickview' id ='" . $product[pro_ID] . "' ><button>QUICK VIEW</button></span></td><td><a href='detail.php?id="
                                             . $product[pro_ID] . "'>" . $product[pro_Manufacturer] . " <br/>"
                                                . $product[pro_Name] . "</a></td><td id = 'right'><p class = 'hide'>" . $rating_id . "</p>$</td><td id = 'left'>"
                                                 .  $product[pro_Price] . "</td></tr>";
                             echo "</div>";


                           }
                  //    }
                  //    }



                           // close up our table
                            echo "</tbody></table>";

                    ?>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->



      <?

        require_once("footer.php");
      ?>
