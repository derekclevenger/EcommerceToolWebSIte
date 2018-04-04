<?
	session_start();

	// session check to see if a person is logged in
	if ($_SESSION[userObject])
	{
		// have a valid user
		require_once("includes/config.php");

		$db = new DB();
		$userObject = unserialize($_SESSION[userObject]);

	}


?>
