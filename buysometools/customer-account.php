<?
require_once("cartAccountUpdate.php");
  require_once("header.php");
  if(!$userObject)
  {
    header("location:register.php");
  }
?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My account</li>
                    </ul>

                </div>


                  <?
                  require_once("customer-menu.php");
                  ?>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->


                <div class="col-md-9">

                  <div class="box">



                        <h3>Change password</h3>
                        <form class = "contact-form" action = 'update-pass.php' method="post" id = 'newpass-form'>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type = 'password'  id="oldpassword" name="oldpassword" placeholder="Old Password" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                        <label for="password">Old Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type = 'password'  id="password" name="password" placeholder="New Password" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                        <label for="password">Password(Must be 8 characters long)</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type = 'password' id="password2" name="password2" placeholder="Confirm New Password" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                      <label for="password">Confirm Password(Must match original)</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                        <hr>
                      </div>
                        <div class="box">
                        <h3>Add New Address</h3>
                        <form class = "contact-form" action='addNewAddy.php' method="post"  id = 'checkout-form'>
                        <!-- /.row -->

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
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save New Address</button>

                            </div>
                          </div>

                        <!-- /.row -->

                      </form>
                    </div>
                      <div class="box">
                        <h3>New Payment Information</h3>
                        <form class = "contact-form" action='addNewCard.php'  method="post"  id = 'payment-form'>
                        <!-- /.row -->
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
                                    <label for="cardSec">Card Security Code(3 Digit Code On Back)</label>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save New Payment</button>

                            </div>
                          </div>

                        <!-- /.row -->
                    </div>

                  </form>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


      <?
        require_once("footer.php");
      ?>
