<?php

// this script will insert the user into the users table
// as well as create a stats table for the user

function register($username, $password, $email, $firstname) {

$db = mysqli_connect("localhost", "root", "supfoo2971", "users");
		
	if (!$db) {
		return 2;
	}
	
	$password = sha1($password);
	$result = mysqli_query($db,"INSERT INTO users (username, password, email, type, firstname) VALUES ($username, $password, $email, 'member', $firstname);");
	if (!$result) {
        echo "Critical error occured, please e-mail baron@nashordb.net.";
        die();
	} else {
		$real = mysqli_fetch_assoc($result);
		if ($real['username'] == $username && $real['password'] == $password) {
            // create a stats table
            $stats_result = mysqli_query($db, "CREATE TABLE ".$username." (entry_id bigint(20), division  varchar(255), lp bigint(20), gain varchart(8), champion varchar(20), position varchar(20), kda varchar(30), cd int(10), mistakes varchar(255), improve_by varchar(255), PRIMARY KEY (entry_id) );");
            if ($stats_result == false) {
                echo "Error creating performance table, please e-mail baron@nashordb.net.";
                die();
            }
		} else {
			echo "Wrong Username or Password";
		    die();
		}
	}
}


?>