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
                        <li>Checkout - Payment Method</li>
                    </ul>
                </div>

                <div class="col-md-9" id="payment">

                  <div class = 'box'>
                            <h1>Checkout - Payment method</h1>

                            <ul class="nav nav-pills nav-justified">
                              <li><a href="checkout1.php"><i class="fa fa-truck"></i><br>Shipping Address</a>
                            </li>
                            <li><a href="checkout2.php"><i class="fa fa-map-marker"></i><br>Billing Address</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="checkout4.php"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                            </ul>

                            <div class="content">
                              <?//use this structure to get other credit card information
                              $getCards = $userObject->getOldCards();
                                if(!empty($getCards))
                                {
                                  echo "<h3>Use Current Information</h3>";
                                echo "<form class = 'contact-form' action='processCard.php' method='post'  id = 'current-payment'>";
                                echo  "<div class='row'>";

                                  foreach($getCards as $card)
                                  {


                              ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                      <input type = 'radio' name = 'previous' id = '<?echo $card[car_ID];?>' value ='<?echo $card[car_ID];?>' required = 'required' >
                                      <p>
                                        <?echo "Card ending in " .  substr($card[car_Num],12);?><br/>
                                        <?echo "Expires " . $card[car_Exp];?>
                                       </p>
                                    </div>
                                </div>

                              <?
                                }
                                echo  "</div>";
                                echo "<div class='box-footer'>
                                    <div class='pull-right'>
                                        <button type='submit' class='btn btn-primary'>Order Review<i class='fa fa-chevron-right'></i>
                                        </button>
                                    </div>
                                </div>";

                              }  echo "</form>";
                              ?>
                              </div>
                            </div>
                              <div class = 'box'>

                              <form class = "contact-form" action='processCard.php'  method="post"  id = 'payment-form'>
                              <!-- /.row -->
                              <h3>Enter New Payment Information</h3>
                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <input  id="cardName" name="cardName" placeholder="Name on Card" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                        <label for="cardName">Name on Card</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                      <input type = 'text' id="cardNum" name="cardNum" placeholder="Credit Card Number" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                        <label for="cardNum">Credit Card Number</label>
                                    </div>
                                </div>
                              </div><br/ >
                              <div class = "row">

                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <input type = 'text' id="cardExp" name="cardExp" placeholder="Card Expiration E.G. 01/1111" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                          <label for="cardExp">Card Expiration e.g. 01/1111</label>
                                      </div>
                                  </div>

                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <input type = 'text' id="cardSec" name="cardSec" placeholder="Card Security Code" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                          <label for="cardSec">Card Security Code</label>
                                      </div>
                                  </div>

                                </div>

                              <!-- /.row -->




                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout2.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Billing Address</a>
                                </div>
                                <div class="pull-right">
                                  <button type="submit" class="btn btn-primary">Order Review<i class="fa fa-chevron-right"></i>
                                    </a>
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
