<?php
session_start();
require '../../../vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

//define("AUTHORIZENET_LOG_FILE","phplog");

// Common setup for API credentials
  $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
  $merchantAuthentication->setName("8bSvqV4a4C");
  $merchantAuthentication->setTransactionKey("7B8W2p9YU4aK6hjP");
  $refId = 'ref' . time();

// Create the payment data for a credit card
  $creditCard = new AnetAPI\CreditCardType();
  $creditCard->setCardNumber("2223000010309703");
  $creditCard->setExpirationDate("$_SESSION[cardExp]");
  $paymentOne = new AnetAPI\PaymentType();
  $paymentOne->setCreditCard($creditCard);


// Create a transaction
  $transactionRequestType = new AnetAPI\TransactionRequestType();
  $transactionRequestType->setTransactionType("authCaptureTransaction");
  $transactionRequestType->setAmount($_SESSION[totalPurchasePrice]);
  $transactionRequestType->setPayment($paymentOne);
  $request = new AnetAPI\CreateTransactionRequest();
  $request->setMerchantAuthentication($merchantAuthentication);
  $request->setRefId( $refId);
  $request->setTransactionRequest($transactionRequestType);


//failing either on request or controller
$controller = new AnetController\CreateTransactionController($request);
//exit();
  $response = $controller->executeWithApiResponse(net\authorize\api\constants\ANetEnvironment::SANDBOX);
//
if ($response != null)
{
 $tresponse = $response->getTransactionResponse();
//print_r($tresponse);

  if (($tresponse != null) && ($tresponse->getResponseCode()=="1"))
  {header("location:processOrder.php");
    echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
    echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
  }
  else
  {
    echo "Charge Credit Card ERROR :  Invalid response\n";
    echo $tresponse->getResponseCode();
  }
}
else
{
  echo  "Charge Credit Card Null response returned";
}
?>
