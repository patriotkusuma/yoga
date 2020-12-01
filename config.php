<?php
//koneksi Database
$server = "us-cdbr-east-02.cleardb.com";
	$user = "b0fc5f56ad9367";
	$pass = "a90b0f14";
	$database = "heroku_4ef18c188c03ee5";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
