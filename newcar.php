<?php
	require ('Aheader.html');
?>
<style type="text/css">
body {
	width: 100%;
	margin: auto;
	background: url('McLaren_P1.jpg') no-repeat center center fixed;
	-webkit-background-size: cover;
	moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

#nav{
	color:white;
	padding-top:30px;
	padding-left:60px;
	font-size:15px;
	font-family: "Tahoma";
	margin:auto;
	background:#808080;
	width:460px;
	border-radius:10px;
	border: none;
}
#nav input{
	margin-top:30px;
	width:200px;
	height:40px;
	font-size: 15px;
	border-radius:5px;
	border: none;
}

#nav input[name="car_name"]{
	width:400px;
	padding-left: 15px;
}

#nav input[name="image"]{
	width:300px;
}

#nav input[name="car_rent_price"]{
	width:200px;
	padding-left: 15px;
}

#nav input[name="transmission"]{
	margin-top:12px;
	width:25px;
	padding-left: 15px;
}

#car_type {
	margin-top:30px;
	width:200px;
	height:40px;
	font-size:15px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}

#seat {
	margin-top:30px;
	width:200px;
	height:40px;
	font-size:15px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}

#transmission {
	margin-top:30px;
	width:200px;
	height:40px;
	font-size:15px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}

#door {
	margin-top:30px;
	width:200px;
	height:40px;
	font-size:15px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}

#nav input[type="submit"]{
	margin:20px;
	width:150px;
	margin-top: 20px;
	margin-left:250px;
	height:50px;
	background-color: #55a1fb;
	color:white;
	font-weight:bold;
}

#nav input[type="submit"]:hover{ 
	background: #2287FF;
	color:white; 
}
#error {
	color:red;
	font-size:15px;
	font-family: "Tahoma";
	margin:auto;
	background:black;
	width:400px;
	border-radius:10px;
	border: none;
	text-align: center;
}
</style>
<div id="dialog" title="Basic dialog">
  <p></p>
</div>
<div id="content">
	<div id="error">
	<?php
		if(isset($_POST['submitted'])){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["car_image"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		$dbc=mysqli_connect('localhost','root','');
		mysqli_select_db($dbc,'car');
		$problem=FALSE;
		if(!empty($_POST['car_name'])){
			$car_name=trim($_POST['car_name']);
		}
		else{
			print '<p>Please insert car name.</p>';
			$problem=TRUE;
		}
		if(!empty($_FILES['car_image'])){
			if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["car_image"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
			$car_image=basename( $_FILES["car_image"]["name"],".jpg");
		}
		else{
			print '<p>Please insert an image.</p>';
			$problem=TRUE;
		}
		if(!empty($_POST['car_type'])){
			$car_type=trim($_POST['car_type']);
		}
		else{
			print '<p>Please select a car type.</p>';
			$problem=TRUE;
		}
		if(!empty($_POST['seat'])){
			$seat=trim($_POST['seat']);
		}
		else{
			print '<p>Please insert available seat.</p>';
			$problem=TRUE;
		}
		if(!empty($_POST['transmission'])){
			$transmission=trim($_POST['transmission']);
		}
		else{
			print '<p>Please select a transmission type.</p>';
			$problem=TRUE;
		}
		if(!empty($_POST['door'])){
			$door=trim($_POST['door']);
		}
		else{
			print '<p>Please select a door type.</p>';
			$problem=TRUE;
		}
		if(!empty($_POST['car_rent_price'])){
			$car_rent_price=trim($_POST['car_rent_price']);
		}
		else{
			print '<p>Please insert the car rental price.</p>';
			$problem=TRUE;
		}
		if(!$problem){
				
			$query = "INSERT INTO car_info(car_name, car_image, car_type, seat, transmission, door, car_rent_price) VALUES ('$car_name','$car_image','$car_type','$seat','$transmission','$door','$car_rent_price')";
				
			if(mysqli_query($dbc,$query)){
				print '<p>'.$car_name.' has been added!</p>';
			}	
				
			else{
				print '<p">Could not add the entry because:<br />' .mysqli_error($dbc).' </p><p>
				The query was: ' .$query.'</p>';
			}
		}
		
		mysqli_close($dbc);
		
	}
	?>
	</div>
	<div id="nav">
		<h3>New Car Registration</h3>
		<form action="newcar.php" method="post" enctype="multipart/form-data">
		<input type="text" placeholder="Car Name" name="car_name"><br>
		Car image : 
		<input type="file" name="car_image"><br>
		<select id="car_type" name="car_type">
			<option disabled selected value>Car Type</option>
			<option value="Economy">Economy</option>
			<option value="Compact">Compact</option>
			<option value="Intermediate">Intermediate</option>
			<option value="Standard">Standard</option>
			<option value="Luxury">Luxury</option>
			<option value="SUV">SUV</option>
			<option value="MPV">MPV</option>
		</select><br>
		<select id="seat" name="seat">
			<option disabled selected value>Seat</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
		</select><br>
		<select id="transmission" name="transmission">
			<option disabled selected value>Transmission</option>
			<option value="Automatic">Automatic</option>
			<option value="Manual">Manual</option>
		</select><br>
		<select id="door" name="door">
			<option disabled selected value>Door</option>
			<option value="2">2</option>
			<option value="4">4</option>
		</select><br>
		<input type="text" placeholder="Rent price per day" name="car_rent_price"> <br>
		<input type="submit" value="Register" name="reg"><br>
		<input type="hidden" name="submitted" value="true"/>
	</div>
</div>
</body>
</html>