<?php
	require('config.php');
	require ('fun.php');

	$query="SELECT * from minute";//select query for viewing users.  
	$run=mysqli_query($dbcon,$query);//here run the sql query.  
	while ($row = mysqli_fetch_assoc($run)) {
		$a['data'][] = $row;
	}

	echo (json_encode($a));

?>