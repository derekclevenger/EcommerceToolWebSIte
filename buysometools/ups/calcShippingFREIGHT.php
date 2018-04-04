<?php
session_start();
require_once("securitycheck.php");
  //Configuration
  $access = "6D26840AB12F568C";
  $userid = "paul.d.clevenger";
  $passwd = "clever=21";
  $wsdl = "ups\SCHEMA-WSDLs\FreightRate.wsdl";
  $operation = "ProcessFreightRate";
  $endpointurl = '';
  $outputFileName = "XOLTResult.xml";
  echo "here";
  exit();
  function processFreightRate()
  {
      //create soap request
      $option['RequestOption'] = 'RateChecking Option';
      $request['Request'] = $option;
      $shipfrom['Name'] = 'Buy Some Tools';
      $addressFrom['AddressLine'] = 'One John Marshall Drive';
      $addressFrom['City'] = 'Huntington';
      $addressFrom['StateProvinceCode'] = 'WV';
      $addressFrom['PostalCode'] = '25755';
      $addressFrom['CountryCode'] = 'US';
      $shipfrom['Address'] = $addressFrom;
      $request['ShipFrom'] = $shipfrom;

	  // PULL CUSTOMER INFO FOR SHIPPING FROM DB and PLUG IN
    $shipto['Name'] = $_SESSION[userName];
          $addressTo['AddressLine'] = $_SESSION[street];
          $addressTo['City'] = strtoupper($_SESSION[city]);
          $addressTo['StateProvinceCode'] = strtoupper($_SESSION[state]);
          $addressTo['PostalCode'] = $_SESSION[zip];
          $addressTo['CountryCode'] = 'US';
          $addressTo['ResidentialAddressIndicator'] = '';
          $shipto['Address'] = $addressTo;
          $shipment['ShipTo'] = $shipto;

      $payer['Name'] = 'Payer inc';
      $addressPayer['AddressLine'] = '435 SOUTH STREET';
      $addressPayer['City'] = 'RIS TOWNSHIP';
      $addressPayer['StateProvinceCode'] = 'NJ';
      $addressPayer['PostalCode'] = '07960';
      $addressPayer['CountryCode'] = 'US';
      $payer['Address'] = $addressPayer;
      $shipmentbillingoption['Code'] = '10';
      $shipmentbillingoption['Description'] = 'PREPAID';
      $paymentinformation['Payer'] = $payer;
      $paymentinformation['ShipmentBillingOption'] = $shipmentbillingoption;
      $request['PaymentInformation'] = $paymentinformation;

      $service['Code'] = '308';
      $service['Description'] = 'UPS Freight LTL';
      $request['Service'] = $service;

      $handlingunitone['Quantity'] = '0';
      $handlingunitone['Type'] = array
      (
          'Code' => 'PLT',
          'Description' => 'PALLET'
      );
      $request['HandlingUnitOne'] = $handlingunitone;

      $commodity['CommodityID'] = '';
      $commodity['Description'] = 'No Description';
      $commodity['Weight'] = array
      (
         'UnitOfMeasurement' => array
         (
             'Code' => 'LBS',
             'Description' => 'Pounds'
         ),
         'Value' => '$_SESSION[weight]'
      );
      $commodity['Dimensions'] = array
      (
          'UnitOfMeasurement' => array
          (
              'Code' => 'IN',
              'Description' => 'Inches'
          ),
          'Length' => '24',
          'Width' => '24',
          'Height' => '24'
      );
      $commodity['NumberOfPieces'] = '1';
      $commodity['PackagingType'] = array
      (
           'Code' => 'BAG',
           'Description' => 'BAG'
      );
      $commodity['DangerousGoodsIndicator'] = '';
      $commodity['CommodityValue'] = array
      (
           'CurrencyCode' => 'USD',
           'MonetaryValue' => '0'
      );
      $commodity['FreightClass'] = '60';
      $commodity['NMFCCommodityCode'] = '';
      $request['Commodity'] = $commodity;

      $shipmentserviceoptions['PickupOptions'] = array
      (
            'HolidayPickupIndicator' => '',
	  	    'InsidePickupIndicator' => '',
	  		'ResidentialPickupIndicator' => '',
	  		'WeekendPickupIndicator' => '',
	  		'LiftGateRequiredIndicator' => ''
	  );
	  $shipmentserviceoptions['OverSeasLeg'] = array
	  (
	         'Dimensions' => array
	         (
	              'Volume' => '8',
	              'UnitOfMeasurement' => array
	              (
	                  'Code' => 'CF',
	                  'Description' => 'String'
	              )
	         ),
	         'Value' => array
	         (
	              'Cube' => array
	              (
	                   'CurrencyCode' => 'USD',
	                   'MonetaryValue' => '0'
	              )
	         ),
	         'COD' => array
	         (
	              'CODValue' => array
	              (
	                   'CurrencyCode' => 'USD',
	                   'MonetaryValue' => '0'
	              ),
	              'CODPaymentMethod' => array
	              (
	                   'Code' => 'M',
	                   'Description' => 'For Company Check'
	              ),
	              'CODBillingOption' => array
	              (
	                   'Code' => '01',
	                   'Description' => 'Prepaid'
	              ),
	              'RemitTo' => array
	              (
	                   'Name' => 'RemitToSomebody',
	                   'Address' => array
	                   (
	                         'AddressLine' => 'Buy Some Tools',
	  						 'City' => 'Huntington',
	  					     'StateProvinceCode' => 'WV',
	  					     'PostalCode' => '25755',
	  					     'CountryCode' => 'US'
	  				   ),
	  				   'AttentionName' => 'instructor'
	  			  )
	  		  ),
	  		  'DangerousGoods' => array
	  		  (
					'Name' => 'Very Safe',
					'Phone' => array
					(
						'Number' => '453563321',
						'Extension' => '1111'
					),
					'TransportationMode' => array
					(
						'Code' => 'CARGO',
						'Description' => 'Cargo Mode'
					)
	  		  ),
	  		  'SortingAndSegregating' => array
	  		  (
	  				'Quantity' => '23452'
	  		  ),
	  		  'CustomsValue' => array
	  		  (
	  				'CurrencyCode' => 'USD',
	  				'MonetaryValue' => '0'
	  		  ),
	  		  'HandlingCharge' => array
	  		  (
					'Amount' => array
					(
						'CurrencyCode' => 'USD',
						'MonetaryValue' => '0'
					)
	  		  )
	   );
	  $request['ShipmentServiceOptions'] = $shipmentserviceoptions;

   echo "Request.......\n";
    print_r($request);
    echo "\n\n";
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
  	$resp = $client->__soapCall($operation ,array(processFreightRate()));

    //get status
    echo "Response Status: " . $resp->Response->ResponseStatus->Description ."\n";

    //save soap request and response to file
    //$fw = fopen($outputFileName , 'w');
    //fwrite($fw , "Request: \n" . $client->__getLastRequest() . "\n");
   // fwrite($fw , "Response: \n" . $client->__getLastResponse() . "\n");
   // fclose($fw);

   echo $client->__getLastResponse();
   exit();

  }
  catch(Exception $ex)
  {
  	print_r ($ex);
  }

?>
