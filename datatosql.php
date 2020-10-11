<?php
	$servername = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'test_db';

	$conn = mysqli_connect($servername,$user,$pass,$dbname);

	echo "string";

	if ($conn) {
   // echo '<script type="text/javascript"> alert("Connection Connected") </script>';
  echo "Connected";
}

	$sql = "INSERT INTO users (id,name,email,credits)
			VALUES('1','Vishruth','Vishruth@gmail.com','435000'),
				  ('2','Sukhdeep','Sukhdeep@gmail.com','521090'),
			  	  ('3','Yuvraj','Yuvraj@gmail.com','23000000'),
				  ('4','Priya','Priya@gmail.com','452500'),
				  ('5','Keshav','Keshav@gmail.com','555000'),
				  ('6','Harsha','Harsha@gmail.com','365200'),
				  ('7','Lovedeep','Lovedeep@gmail.com','562000'),
				  ('8','Manav','Manav@gmail.com','156200'),
				  ('9','Arvind','Arvind@gmail.com','102300'),
				  ('10','Harish','Harish@gmail.com','12000');";

	$query_run = mysqli_query($conn,$sql);
    
    if($query_run)
    {
        echo '<script type="text/javascript"> alert("Data Saved") </script>';
    }
    else
    {
        //echo '<script type="text/javascript"> alert("Data Not Saved") </script>';
        echo $sql;
    }   
?>
