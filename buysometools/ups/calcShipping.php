<?
session_start();
require_once("securitycheck.php");



  //Configuration
  $access = "6D26840AB12F568C";
  $userid = "paul.d.clevenger";
  $passwd = "clever=21";
  $wsdl = "ups\SCHEMA-WSDLs\RateWS.wsdl";
  $operation = "ProcessRate";
  $endpointurl = '';
  $outputFileName = "XOLTResult.xml";

echo "hello";
exit();


  function processRate()
  {


      //create soap request
      $option['RequestOption'] = 'Shop';
      $request['Request'] = $option;

      $pickuptype['Code'] = '01';
      $pickuptype['Description'] = 'Daily Pickup';
      $request['PickupType'] = $pickuptype;

      $customerclassification['Code'] = '01';
      $customerclassification['Description'] = 'Classification';
      $request['CustomerClassification'] = $customerclassification;

      $shipper['Name'] = 'BuySomeTools';
      $shipper['ShipperNumber'] = '4Y6F81';
      $address['AddressLine'] = array
      (
          'One John Marshall Drive',
          'Morrow 114'
      );
      $address['City'] = 'Huntington';
      $address['StateProvinceCode'] = 'WV';
      $address['PostalCode'] = '25755';
      $address['CountryCode'] = 'US';
      $shipper['Address'] = $address;
      $shipment['Shipper'] = $shipper;

     // PULL CUSTOMER INFO FOR SHIPPING FROM DB and PLUG IN
     $address = $userObject->getShipAddress($_SESSION[add_ID]);
     foreach($address as $addy)
      {
        $shipto['Name'] = $userObject->getName();
        $addressTo['AddressLine'] = $addy[add_Street];
        $addressTo['City'] = $addy[add_City];
        $addressTo['StateProvinceCode'] = $addy[add_State];
        $addressTo['PostalCode'] = $addy[add_Zip];
        $addressTo['CountryCode'] = 'US';
        $addressTo['ResidentialAddressIndicator'] = '';
        $shipto['Address'] = $addressTo;
        $shipment['ShipTo'] = $shipto;
      }
      $ShipFrom['Name'] = 'BuySomeTools';
      $addressFrom['AddressLine'] = array
      (
          'One John Marshall Drive',
          'Morrow 114'
      );
      $addressFrom['City'] = 'Huntington';
      $addressFrom['StateProvinceCode'] = 'WV';
      $addressFrom['PostalCode'] = '25755';
      $addressFrom['CountryCode'] = 'US';
      $ShipFrom['Address'] = $addressFrom;
      $shipment['ShipFrom'] = $ShipFrom;

      $service['Code'] = '03';
      $service['Description'] = 'Service Code';
      $shipment['Service'] = $service;

      $packaging1['Code'] = '02';
      $packaging1['Description'] = 'Rate';
      $package1['PackagingType'] = $packaging1;
      $dunit1['Code'] = 'IN';
      $dunit1['Description'] = 'inches';
      $dimensions1['Length'] = '12';
      $dimensions1['Width'] = '12';
      $dimensions1['Height'] = '12';
      $dimensions1['UnitOfMeasurement'] = $dunit1;
      $package1['Dimensions'] = $dimensions1;
      $punit1['Code'] = 'OZ';
      $punit1['Description'] = 'Ounces';
      $packageweight1['Weight'] = $_SESSION[weight];
      $packageweight1['UnitOfMeasurement'] = $punit1;
      $package1['PackageWeight'] = $packageweight1;

      $shipment['Package'] = array(	$package1);
      $shipment['ShipmentServiceOptions'] = '';
      $shipment['LargePackageIndicator'] = '';
      $request['Shipment'] = $shipment;
    //  echo "Request.......\n";
    // print_r($request);
     //exit();
    //  echo "\n\n";

      return $request;
  }

  try
  {

    $mode = array
    (
         'soap_version' => 'SOAP_1_1',  // use soap 1.1 client
         'trace' => 1
    );

    // initialize soap client
    $client = new SoapClient($wsdl , $mode);

    //set endpoint url
    $client->__setLocation($endpointurl);


    //create soap header
    $usernameToken['Username'] = $userid;
    $usernameToken['Password'] = $passwd;
    $serviceAccessLicense['AccessLicenseNumber'] = $access;
    $upss['UsernameToken'] = $usernameToken;
    $upss['ServiceAccessToken'] = $serviceAccessLicense;

    $header = new SoapHeader('http://www.ups.com/XMLSchema/XOLTWS/UPSS/v1.0','UPSSecurity',$upss);
    $client->__setSoapHeaders($header);


    //get response
    $resp = $client->__soapCall($operation ,array(processRate()));

    //get status
   // echo "Response Status: " . $resp->Response->ResponseStatus->Description ."\n";

    //save soap request and response to file
  //  $fw = fopen($outputFileName , 'w');
  //  fwrite($fw , "Request: \n" . $client->__getLastRequest() . "\n");
  //  fwrite($fw , "Response: \n" . $client->__getLastResponse() . "\n");
  //  fclose($fw);
  $allData = $client->__getLastResponse();
  $dataArray = explode("USD", $allData);
  echo strip_tags($dataArray[1]);
  exit();

  }
  catch(Exception $ex)
  {
    print_r ($ex);
  }




?>
