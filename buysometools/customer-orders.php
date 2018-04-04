<?
  require_once("header.php");
?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My orders</li>
                    </ul>

                </div>

                <?
                require_once('customer-menu.php');
                ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My orders</h1>


                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Tracking Number</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?
                                  $review = $userObject-> getOrderReview();
                                  foreach($review as $order)
                                  {



                                  ?>
                                    <tr>
                                        <th># <?echo $order[ord_ID];?></th>
                                        <td><?echo $order[order_date];?></td>
                                        <td><span class="label label-info"><?echo $order[ord_track];?></span>
                                        </td>
                                        <td><a href="order-detail.php?id=<?echo $order[ord_ID];?>" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <?
                                      }
                                    ?>
                                </tbody>
                            </table>
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
