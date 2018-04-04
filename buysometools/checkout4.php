<?
  require_once("header.php");
?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="charge-credit-card.php">
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                              <li><a href="checkout1.php"><i class="fa fa-truck"></i><br>Address</a>
                                 </li>
                                 <li><a href="checkout2.php"><i class="fa fa-map-marker"></i><br>Delivery Method</a>
                                 </li>
                                 <li><a href="checkout3.php"><i class="fa fa-money"></i><br>Payment Method</a>
                                 </li>
                                 <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                 </li>
                            </ul>

                            <div class="content">
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

                                        <?//use sessionssssssssss
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


                                               <td ><span class = 'move-right' id='<?echo $opts[pro_ID];?>optqty' ><span   id = '<?echo $opts[pro_ID];?>' ><?echo $cart[cart_qty];?></span></span></td>

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

                                      }

                                      }

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
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Payment Method</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Place Order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                  <?$tax = $_SESSION[sum] * .06;
                                    $total = $_SESSION[sum] + $tax + $_SESSION[shipCost];?>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>$<?echo number_format( $_SESSION[sum],2);?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$<?echo $_SESSION[shipCost];?></th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$<?echo number_format($tax,2);?></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <?$_SESSION[totalPurchasePrice] = number_format($total, 2, '.', '');
										?>
                                        <th>$<?echo number_format($total,2);?></th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                            <h3>Purchasing Card</h3>


                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <td>Card Ending In  </td>
                                        <th><?echo substr($_SESSION[cardNum],12);?></th>
                                    </tr>
                                    <tr>
                                        <td>Expiration </td>
                                        <th><?echo $_SESSION[cardExp];?></th>
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
