<?
session_start();

	// this page simply process the form submission for adding an account
  require_once("includes/config.php");

$db = new DB();
if ($_POST)
{
  $db = new DB();

  // we have the login, verify user info

 $_POST[Email] = $db->clean($_POST[Email]);

  $q = "select * from customer where cus_EMail ='$_POST[Email]'
    and cus_Password='" . md5($_POST[userpassword]) . "'";


  // issue the query against the server, verify
  $data = $db->get_results($q);
  // or get_row with the list function
  //$data = $db->get_row($q);
  //list($id, $fn, $ln, $em, $p, $ph) = $data;

  // MORGAN METHOD FOR DEBUGGING THE OUTPUTTING ARRAYS
/*
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    exit();
*/
  if ($data)
  {
    // establish our USER object
    $userObject = new user($data[0][cus_FirstName],
    $data[0][cus_LastName],
    $data[0][cus_EMail],
    $data[0][cus_ID]);

    // serialize our object's data and store in a session variable
    $_SESSION[userObject] = serialize($userObject);


  }
  else
  {
    $error = "Invalid credentials.  Try again.";
      header("location:register.php");
  }
  // redirect to our index page
  header("location:customer-account.php");
  }

?>
