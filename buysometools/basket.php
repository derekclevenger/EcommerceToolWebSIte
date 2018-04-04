<?
require_once("cartAccountUpdate.php");

  require_once("header.php");



  ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Shopping cart</li>

                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box" >

                        <form method="post" >


                              <h1>Shopping cart</h1>
                              <?
                              /*
                              $_SESSION[weight] = $userObject->getShippingWeight();
                              if($_SESSION[weight] > 150)
                              {
                                echo "<div id = 'freight'><h3>Ground shipping cannot weigh more than 150 lbs!</h3></div>";
                              }
                              */

                              ?>
                            <div class="table-responsive" id ='cart-table'>
                                <table class="table" id = 'cart'>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Model</th>

                                            <th>Quantity</th>
                                              <th>Unit price</th>
											<th class = 'hidden'>Total</th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?
                                        $c = $shop->getCart($tempID);



                                        if(empty($c))
                                        {
                                          Echo "<p name = 'emptycart' class = 'center'> You have no items in your cart!</p>";

                                        }


                                              foreach($c as $cart)
                                                {



                                      ?>
                                        <tr >
                                            <td>
                                                <a href="detail.php?id=<?echo $cart[pro_ID];?>">
                                                  <img src="../../products/<?echo $cart[pro_ID];?>.jpg" alt="" class="img-responsive">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="detail.php?id=<?echo $cart[pro_ID];?>">
                                              <?echo $cart[pro_Manufacturer] . "<br/>" . $cart[pro_Model];?>
                                            </a>
                                             </td>


                                            <td>
                                          <input type = 'text' name='prods' id='<?echo $cart[pro_ID];?>' value="<?echo $cart[cart_qty];?>" class = 'qty'>
                                        </td>
                                        <td>$<span id = '<?echo $cart[pro_ID];?>_price'><?echo $cart[pro_Price];?></span></td>

											<td class = 'hidden'>$<span id = '<?echo $cart[pro_ID];?>_total'><?echo number_format($cart[cart_qty] * $cart[pro_Price],2);?></span></td>

                    </tr >

                                  <?


                                  $opt = $shop->cartOpts($tempID, $cart[pro_ID]);
                                    foreach($opt as $opts)
                                    {

                                      ?>
                                      <tr id = '<?echo $opts[pro_ID];?>options'>

                                        <td></td>
                                        <td><?echo $opts[opt_Name];?><br/><?echo $opts[opt_Value]; ?></td>



                                        <td ><span class = 'move-right' id='<?echo $opts[pro_ID];?>optqty' ><span   id = '<?echo $opts[pro_ID];?>' ><?echo $cart[cart_qty];?></span></span></td>

                                        <td>$<span id = '<?echo $opts[pro_ID];?>_optionprice'><?echo $opts[opt_Price];?></span></td>

                                          <td class = 'hidden'>$<span id = '<?echo $opts[pro_ID];?>_opttotal'><?echo number_format($cart[cart_qty] * $opts[opt_Price],2);?></span></td>

                                      </tr>

                                      <?/*
                                      <tr >

                                        <td></td>
                                        <td><?echo $opts[opt_Name];?><br/><?echo $opts[opt_Value]; ?></td>



                                        <td ><span  id= '<?echo $opts[pro_ID];?>optqty'  ><span class = 'move-right'><?echo $cart[cart_qty];?></span></span></td>

                                        <td>$<span class = '<?echo $cart[pro_ID];?>_price'><?echo $opts[opt_Price];?></span></td>
                                          <td >$<span class = '<?echo $opts[opt_ID];?>_total'><?echo number_format($cart[cart_qty] * $opts[opt_Price],2);?></span></td>

                                      </tr>
                                      */
                                        ?>





                                      <?
                                      
                                      $opt_tot = $opt_tot + $cart[cart_qty] * $opts[opt_Price];
                                    }
                                    $rando_prod = $rando_prod + $cart[pro_Price] * $cart[cart_qty];

                                    }

                                      $_SESSION[sum] = $rando_prod + $opt_tot;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" >Subtotal</th>

                                            <th colspan="1" >$<span class ='cartTotal'><?echo number_format($_SESSION[sum],2);?></span></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.php?id=1" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                  <a href = "verifylogin.php" button type="submit" class="btn btn-primary">Checkout <i class="fa fa-chevron-right"></i>
                                  </a>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>



<?


                                                              $row = $p->getFeaturedProducts();


                                                                    $while = 0;
                                                                    $number = 0;

                                                                    //drawing table info

                                                                           foreach($row as $product)
                                                                           {

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

                                  ++$number;     }

                                        }




                                                ?>


                                            </div>

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted"> Costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>$<span class = 'cartTotal'><?echo number_format($_SESSION[sum],2);?></span></th>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <?$tax = $_SESSION[sum] * .06;
                                          $total = $_SESSION[sum] + $tax + $shipping;?>
                                        <th>$<span id = 'tax'><?echo number_format($tax,2);?></span></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$<span id = 'orderTotal'><?echo number_format($total,2);?></span></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>




                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    <?
      require_once("footer.php");
    ?>
