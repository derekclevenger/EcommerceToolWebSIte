<?
require_once("cartAccountUpdate.php");
  require_once("header.php");
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



                        <?

                        $getAddress = $userObject->getUserAddress();
                          if(isset($getAddress))
                          {
                            echo "<h3>Remove Address</h3>";
                          echo "<form class = 'contact-form' action='addNewAddy.php' method='post'  id = 'current-address'>";
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
                          <div class='col-sm-12 text-center'>
                              <button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> Remove Address</button>

                          </div>
                          </div>";
                          echo "</form>";
                        }
                        ?>

                      </div>

                          <div class="box">


                        <?//use this structure to get other credit card information
                        $getCards = $userObject->getOldCards();
                          if(!empty($getCards))
                          {
                            echo "  <h3>Remove Card</h3>";
                          echo "<form class = 'contact-form' action='addNewCard.php' method='post'  id = 'current-payment'>";
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
                          <div class='col-sm-12 text-center'>
                              <button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> Remove Card</button>

                          </div>
                          </div>";

                        }  echo "</form>";
                        ?>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


      <?
        require_once("footer.php");
      ?>
