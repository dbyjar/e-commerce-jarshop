<?php

	$server ="localhost";
	$username ="root";
	$password ="";
	$database ="weshop";

	$koneksi = new PDO("mysql:host=$server;dbname=$database", $username, $password);

