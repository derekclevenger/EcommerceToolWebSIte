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
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>


                        <hr>

                        <form class= "contact-form" id = "register-form" action = 'addCartAccount.php'  method="post">

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <input id="firstname" name="fname" placeholder="First Name" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                      <label for="firstname">First Name</label>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <input id="lastname" name="lname" placeholder="Last Name" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                      <label for="lastname">Last Name</label>
                                  </div>
                              </div>
                          </div>

							 <div class="col-sm-6">
                            <div class="form-group">
                              <input id="email" name="email" placeholder="Email" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                <label for="email">Email</label>
                            </div>
							</div>
							       <div class="col-sm-6">
							                 <div class="form-group">
                                 <input type = 'tel' id="tel" name="tel" placeholder="Telephone" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                <label for="tel">Telephone</label>
                            </div>
                            <br /><br/>
							                   </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type = 'password'  id="password" name="password" placeholder="Password" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                  <label for="password">Password(Must be 8 characters long)</label>

                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <input type = 'password' id="password2" name="password2" placeholder="Confirm Password" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                                  <label for="password">Confirm Password(Must match original password)</label>
                                </div>
                              </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                      </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                       <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>
                         !! Our customer service center is working for you 24/7.</p>
                        <hr>

                        <form class = "contact-form" id = "login-page" action="cartLoginAccount.php" method="post">
                           <div class="col-sm-6">
            <div class="form-group">
              <input id="Email" name="Email" placeholder="Email" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                              <label for="email">Email</label>
                          </div>
            </div>
             <div class="col-sm-6">
                          <div class="form-group">
                            <input type = 'password' id="userpassword" name="userpassword" placeholder="Password" class="[ form-control ]" data-toggle="floatLabel" data-value="no-js">
                              <label for="password">Password</label>
                          </div>
            </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary" >
                            Log in</button>
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
