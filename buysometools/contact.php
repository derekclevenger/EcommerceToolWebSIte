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
                        <li>Contact</li>
                    </ul>



                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->



                    <!-- *** PAGES MENU END *** -->



                 <div class="banner">
                     <a href="#">
                          <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                  </div>
               </div>

                <div class="col-md-9">


                    <div class="box" id="contact">
                        <h1>Contact</h1>

                        <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                        <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Address</h3>
                                <p>BuySomeTools Inc.
                                  <br>2345 Every Tool Lane
                                  <br>Toolville
                                  <br>California
                                  <br>93221
                                  <br>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Call center</h3>
                                <p class="text-muted">This number is toll free if calling from the United States, otherwise we advise you to use the electronic form of communication.</p>
                                <p><strong> 555 444 333</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                                <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                                <ul>
                                    <li><strong><a href="mailto:">support@buysometools.com</a></strong>
                                    </li>
                                    <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->







                        <hr>
                        <h2>Contact form</h2>

                        <form class = "contact-form" id = 'contact-form' action = 'sendemail.php'>
                            <div class="row">

                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="firstname">First Name</label>
                                          <input name = 'firstname' type="text" class= "form-control" id= "firstname" required = 'required' >
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="lastname">Last Name</label>
                                          <input type="text" class= "form-control" id="lastname" name = 'lastname' required = 'required'>
                                      </div>
                                  </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class= "form-control" id="email" name = 'email' required = 'required'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class= "form-control" id="subject" name = 'subject' required = 'required'>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea id="message" class= "form-control" name = 'message' required = 'required'></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary" required = 'required' >
                                      <i class="fa fa-envelope-o"></i> Send message</button>

                                </div>
                            </div>
                            <!-- /.row -->
                        </form>


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
