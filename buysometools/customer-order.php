<?
  require_once("header.php");
?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="#">My order</a>
                        </li>
                        <li>Order # <?echo $_SESSION[ord_ID];?></li>
                    </ul>

                </div>



                <?
                require_once("customer-menu.php");
                ?>


                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>Order #<?echo $_SESSION[ord_ID];?></h1>

                        <p class="lead">Order #<?echo $_SESSION[ord_ID];?> was placed on <strong><?echo $_SESSION[ord_date];?></strong> and is currently <strong>Being prepared</strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                      <th>Product</th>
                                      <th>Model</th>
                                      <th>Quantity</th>
                                      <th>Unit price</th>
                                      <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?$order = $userObject->getOrder();

                                    foreach($order as $ord)
                                    {




                                  ?>
                                  <tr >
                                      <td>

                                            <img src="../../products/<?echo $ord[pro_ID];?>.jpg" alt="" class="img-responsive">

                                      </td>
                                      <td>

                                        <?echo $ord[pro_Manufacturer] . "<br/>" . $ord[pro_Model];?>

                                       </td>


                                       <td ><span class = 'move-right' id='<?echo $ord[pro_ID];?>optqty' ><span   id = '<?echo $ord[pro_ID];?>' ><?echo $ord[ord_Qty];?></span></span></td>

                                  <td>$<span id = '<?echo $ord[pro_ID];?>_price'><?echo $ord[pro_Price];?></span></td>

                <td>$<span id = '<?echo $ord[pro_ID];?>_total'><?echo number_format($ord[pro_Price] * $ord[ord_Qty],2);?></span></td>

              </tr >
              <?
              $ordOpts = $userObject->getOrderOpt();
              foreach($ordOpts as $opts)
              {
                if($opts[pro_ID] == $ord[pro_ID])
                {
                ?>
              <tr id = '<?echo $opts[pro_ID];?>options'>

                <td></td>
                <td><?echo $opts[opt_Name];?><br/><?echo $opts[opt_Value]; ?></td>



                <td ><span class = 'move-right' id='<?echo $opts[pro_ID];?>optqty' ><span   id = '<?echo $opts[pro_ID];?>' ><?echo $ord[ord_Qty];?></span></span></td>

                <td>$<span id = '<?echo $opts[pro_ID];?>_optionprice'><?echo $opts[opt_Price];?></span></td>

                  <td >$<span id = '<?echo $opts[pro_ID];?>_opttotal'><?echo number_format($ord[ord_Qty] * $opts[opt_Price],2);?></span></td>

              </tr>

                                    <?
                                  }
                                  }
                                  }
                                  ?>
                                </tbody>
                                <tfoot>
                                  <?$tax = $_SESSION[sum] * .06;
                                    $total = $_SESSION[sum] + $tax + $_SESSION[shipCost];?>
                                    <tr>
                                        <th colspan="4" class="text-right">Order subtotal</th>
                                        <th>$<?echo number_format( $_SESSION[sum],2);?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Shipping and handling</th>
                                        <th>$<?echo $_SESSION[shipCost];?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Tax</th>
                                        <th>$<?echo number_format($tax,2);?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">Total</th>
                                        <th>$<?echo number_format($total,2);?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-6">
                              <?if($_SESSION[add_ID] != $_SESSION[add_Bill])
                              {
                              $invoice = $userObject->getShipAddress($_SESSION[add_Bill]);
                              foreach($invoice as $add)
                              {
                                ?>
                                <h2>Invoice address</h2>
                                <p><?echo  $_SESSION[cardName]; ?>
                                    <br><?echo  $add[add_Street];?>
                                    <br><?echo $add[add_City];?>
                                    <br><?echo $add[add_State];?>
                                    <br><?echo $add[add_Zip];?></p>

                                <?
                              }
                            }
                            else {


                              ?>
                                <h2>Invoice address</h2>
                                <p><?echo  $_SESSION[cardName]; ?>
                                    <br><?echo  $_SESSION[street];?>
                                    <br><?echo $_SESSION[city];?>
                                    <br><?echo $_SESSION[state];?>
                                    <br><?echo $_SESSION[zip];?></p>
                                  <?
                                  }
                                    ?>
                            </div>
                            <div class="col-md-6">
                                <h2>Shipping address</h2>
                                <p><?echo  $_SESSION[userName]; ?>
                                  <br><?echo  $_SESSION[street];?>
                                  <br><?echo $_SESSION[city];?>
                                  <br><?echo $_SESSION[state];?>
                                  <br><?echo $_SESSION[zip];?></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


      <?
        require_once("footer.php");
      ?>
