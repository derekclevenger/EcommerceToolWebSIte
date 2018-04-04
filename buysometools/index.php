

<?php

require_once("header.php");


?>





    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/tools.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/toolsatwork.jpg" alt="">
                        </div>
                        <div class="item">
                              <img class="img-responsive" src="img/tools2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/toolsatwork2.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->



 <div id="hot">
                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Featured Products</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                  <div class='row same-height-row'>
                    <div class="product-slider">

                      <?

                     
                      $rows = $p->getFeaturedProducts();
                      
                      foreach($rows as $product)
                      {





                      ?>


                        <div class="item">


                            <div class="product">

                              <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?echo $product[pro_ID];?>">
                                                <img src="../../products/<?echo $product[pro_ID]; ?>.jpg" alt="<?echo $product[pro_Manufacturer];?>" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                          <a href="detail.php?id=<?echo $product[pro_ID];?>">
                                              <img src="../../products/<?echo $product[pro_ID]; ?>.jpg" alt="<?echo $product[pro_Manufacturer];?>" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <a href="detail.php?id=<?echo $product[pro_ID];?>">
                                  <img src="../../products/<?echo $product[pro_ID]; ?>.jpg" alt="<?echo $product[pro_Manufacturer];?>" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?id=<?echo $product[pro_ID];?>">
                                        <?echo $product[pro_Manufacturer];?></a></h3>
                                    <p class="price">$<?echo $product[pro_Price];?></p>
                                </div>
                                <!-- /.text -->

                            <!-- /.product -->
                        <!--  -->
                      </div>
                      </div>
                    </div>





                        <?

                          }
                        ?>

</div>
                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->
            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get your inspiration for future projects</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="#">
                                    <img src="img/garage.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/kitchen.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/bathroom.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

        </div>
        <!-- /#content -->

      <?php
	  require_once("footer.php");
	  ?>
