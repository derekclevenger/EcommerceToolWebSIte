<?

 define( 'DB_HOST', 'isat-cit.marshall.edu' ); // set database host
 define( 'DB_USER', 'CIT410Admin' ); // set database user
 define( 'DB_PASS', 'Th1515T0pS3cr3t' ); // set database password
 define( 'DB_NAME', 'CIT410' ); // set database name
 define( 'SEND_ERRORS_TO', 'clevenger7@live.marshall.edu' ); //set email notification email address
 define( 'DISPLAY_DEBUG', true ); //display db errors?

 function __autoload($className)
 {
	require_once("classes/" . $className . "_class.php");
 }


?>
