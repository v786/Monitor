<?php
	require('config.php');
	require ('fun.php');

	$query="SELECT second, value from minute";//select query for viewing users.  
	$run=mysqli_query($dbcon,$query);//here run the sql query.  
  $a ['cols'][] = ['second', 'value']; 
  $i = 1;
	while ($row = mysqli_fetch_assoc($run)) {
    
	}

?>