<?php


	$link = mysqli_connect("localhost", "root", "","usersReadNReview");
//(nameOfHost,"userName","passwordOfDatabase","NameofDataBase")
	if(mysqli_connect_error())
	{
		die("ERROR!");
	}

    echo "connected";


?>