<?php
function getDB(){
$dsn='mysql:host=localhost;port=3306;dbname=rpe_gym';
$username='mgs_user0';
$password='pa55word';


//changes these 3 variables for different server configuration

try {
    $db=new PDO($dsn,$username,$password);
    //echo '<p>You are connected to the database!</p>';
    return $db;
}
//PDO is object
//PDO exceotion
//pdo statement
catch(PDOException $exception) {
    $error_message=$exception->getMessage();
    echo $error_message;
    exit();


}
}