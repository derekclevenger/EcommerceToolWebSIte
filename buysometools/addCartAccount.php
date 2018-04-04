<?
session_start();
require_once("classes/user_class.php");
	// this page simply process the form submission for adding an account
  require_once("includes/config.php");


  if ($_POST)
  {
    $db = new DB();
    // we have a registration
    $data[cus_FirstName] = $_POST[fname];
    $data[cus_LastName] = $_POST[lname];
    $data[cus_EMail] = $_POST[email];
    $data[cus_Password] = md5($_POST[password]);

    $validInsert = $db->insert("customer", $data);

    if ($validInsert)
    {

      // establish our USER object
      $userObject = new user($data[cus_FirstName],
      $data[cus_LastName],
      $data[cus_EMail],
      $data[cus_ID] = $db->lastid());



      // serialize our object's data and store in a session variable
      $_SESSION[userObject] = serialize($userObject);

      // redirect to our index page
      header("location:basket.php");
    }
    else
    {
      $error = "Account not created because of user entry error.";
      header("location:register.php");
    }
  }



?>
