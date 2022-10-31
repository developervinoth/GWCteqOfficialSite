<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','u927690231_gwcteq_web_db');
define('DB_PASS','RAJA5kavi#');
define('DB_NAME','u927690231_gwcteq_web_db');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>



<!-- define('DB_HOST','localhost');
define('DB_USER','u927690231_gwcteq_web_db');
define('DB_PASS','RAJA5kavi#');
define('DB_NAME','u927690231_gwcteq_web_db'); -->