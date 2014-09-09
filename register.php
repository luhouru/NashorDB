<?php

// this script will insert the user into the users table
// as well as create a stats table for the user

function register($firstname, $username, $password, $email) {

$db = mysqli_connect("localhost", "root", "supfoo2971", "users");
		
	if (!$db) {
		return 2;
	}
	
	$password = sha1($password);
	$result = mysqli_query($db,"INSERT INTO users (username, password, email, type, firstname) VALUES ('".$username."', '".$password."', '".$email."', 'member', '".$firstname."');");
	if ($result == false) {
        echo "Insert failed: ".mysqli_error($db)."<br>";
        echo "Critical error occured, please e-mail baron@nashordb.net.";
        die();
	} else {
        // create stats table
        $db = mysqli_connect("localhost", "root", "supfoo2971", "stats");
		$stats_result = mysqli_query($db, "CREATE TABLE ".$username." (entry_id bigint(20), division  varchar(255), lp bigint(20), gain varchar(8), champion varchar(20), position varchar(20), kda varchar(30), cd int(10), mistakes varchar(255), improve_by varchar(255), PRIMARY KEY (entry_id) );");
        if ($stats_result == false) {
                echo "Create table failed: ".mysqli_error($db)."<br>";
                echo "Error creating performance table, please e-mail baron@nashordb.net.";
                die();
        }
	}
    $from = "baron@nashordb.net";
    $subject = "Welcome to NashorDB!";
    $message = "Welcome, fellow Summoner, \n\n
                I Hope you find everything here easy to use and look at. If you have any questions or problems, please e-mail me back at baron@nashordb.net. Wish you the best of luck in soloQ!
                \n\n
                Chris Luk
                    - NashorDB Admin";
    mail($email,$subject,$message,"From: $from\n");
    
    
}


?>