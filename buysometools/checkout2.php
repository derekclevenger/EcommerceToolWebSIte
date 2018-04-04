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
                        <li>Checkout - Billing Address</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">

                            <h1>Checkout - Billing Address</h1>

                            <ul class="nav nav-pills nav-justified">
                              <li><a href="checkout1.php"><i class="fa fa-truck"></i><br>Shipping Address</a>
                                 </li>
                                 <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Billing Address</a>
                                 </li>
                                 <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                 </li>
                                 <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                 </li>
                            </ul>
                            <div class="content">
                              <?

                              $getAddress = $userObject->getUserAddress();
                                if(isset($getAddress))
                                {
                                  echo "<h3>Use Current Address</h3>";
                                echo "<form class = 'contact-form' action='addBillingAddress.php' method='post'  id = 'current-address'>";
                                echo  "<div class='row'>";

                                  foreach($getAddress as $addy)
                                  {


                              ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                      <input type = 'radio' name = 'previous' id = '<?echo $addy[add_ID];?>' value ='<?echo $addy[add_ID];?>' required = 'required' >
                                      <p>
                                        <?echo $addy[add_Street];?><br/>
                                        <?echo $addy[add_City];?><br/>
                                        <?echo $addy[add_State];?> ,
                                        <? echo $addy[add_Zip];?>
                                       </p>
                                    </div>
                                </div>

                              <?
                                }
                                echo  "</div>";
                                echo "<div class='box-footer'>
                                    <div class='pull-right'>
                                        <button type='submit' class='btn btn-primary'>Payment Method<i class='fa fa-chevron-right'></i>
                                        </button>
                                    </div>
                                </div>";
                                echo "</form>";
                              }
                              ?>
                            </div>
                          </div>
                          <div class="box">
                                <form class = "contact-form" action='addBillingAddress.php' method="post"  id = 'checkout-form'>
                                <!-- /.row -->
                                <h3>Enter new Address</h3>
                                <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <input id="street" name="street" placeholder="Street" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                          <label for="street">Street</label>
                                      </div>
                                  </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <input id="street2" name="street2" placeholder="Street 2" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                            <label for="street">Street 2</label>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <!-- /.row -->

                                <div class="row">

                                  <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                        <input id="city" name="city" placeholder="City" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                          <label for="company">City</label>
                                      </div>
                                  </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                          <input type = 'text' id="state" name="state" placeholder="State" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                            <label for="state">State</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                          <input id="apartment" name="aptNum" placeholder="Apartment Number" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                            <label for="city">Apartment Number</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                          <input type = 'text' id="zip" name="zip" placeholder="Zip" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                            <label for="zip">ZIP</label>
                                        </div>
                                    </div>
                                  </div>

                                <!-- /.row -->


                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout1.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Shipping</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Payment Method<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                          </form>
                          </div>
                            </div>
                          <!-- /.box -->



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
                                        <th>$<?echo number_format($total,2);?></th>
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
