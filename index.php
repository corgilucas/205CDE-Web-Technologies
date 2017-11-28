<?php
ob_start();
session_start();
?>
<?php
	require('HomeHeader.html');
?>
<meta charset="UTF-8">
<div id="container">
</div>
<div id="booking_container">
<div id="content">
<div id="left">
<div id="warning">
<?php
	if (isset($_POST['submitted'])){
		$dbc=mysqli_connect('localhost','root','');
		mysqli_select_db($dbc,'booking');
		
		$problem=FALSE;
		if (!empty($_POST['pickup_location'])) {
			$_SESSION['pickup_location'] = $_POST['pickup_location'];
			$pickup_location=trim($_POST['pickup_location']);
		}
		else {
			print "Please pick a pick up location.<br>";
			$problem=TRUE;
		}
		if (!empty($_POST['dt1'])) {
			$_SESSION['dt1'] = $_POST['dt1'];
			$dt1=trim($_POST['dt1']);
		}
		else {
			print "Please pick a pick up date.<br>";
			$problem=TRUE;
		}
		if (!empty($_POST['pickup_time'])) {
			$_SESSION['pickup_time'] = $_POST['pickup_time'];
			$pickup_time=trim($_POST['pickup_time']);
		}
		else {
			print "Please pick a pick up time.<br>";
			$problem=TRUE;
		}
		if (!empty($_POST['dropoff_location'])) {
			$_SESSION['dropoff_location'] = $_POST['dropoff_location'];
			$dropoff_location=trim($_POST['dropoff_location']);
		}
		else {
			print "Please pick a drop off location.<br>";
			$problem=TRUE;
		}
		if (!empty($_POST['dt2'])) {
			$_SESSION['dt2'] = $_POST['dt2'];
			$dt2=trim($_POST['dt2']);
		}
		else {
			print "Please pick a drop off date.<br>";
			$problem=TRUE;
		}
		if (!empty($_POST['dropoff_time'])) {
			$_SESSION['dropoff_time'] = $_POST['dropoff_time'];
			$dropoff_time=trim($_POST['dropoff_time']);
		}
		else {
			print "Please pick a drop off time.<br>";
			$problem=TRUE;
		}
		
		if(!$problem){
			$query = "INSERT INTO booking(pickup_location, pickup_date, pickup_time, dropoff_location, dropoff_date, dropoff_time) VALUES ('$pickup_location','$dt1','$pickup_time','$dropoff_location','$dt2','$dropoff_time')";
			
			if(mysqli_query($dbc,$query)){
				print '<p>Your booking has been recorded!</p>';
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
		<div id="FormNav">
			ONLINE BOOKING
			<form action="index.php" method="post">
				<select id="pickup_location" name="pickup_location">
					<option disabled selected value>Pick-up location</option>
					<option value="Penang Jetty">Penang Jetty</option>
					<option value="Penang International Airport">Penang International Airport</option>
					<option value="Perangin Mall">Perangin Mall</option>
					<option value="Queensbay Mall">Queensbay Mall</option>
				</select>
				<input type="text" id="dt1" name="dt1">
				<select id="pickup_time" name="pickup_time">
					<option value="00:00:00">00:00</option>
					<option value="00:30:00">00:30</option>
					<option value="05:00:00">05:00</option>
					<option value="05:30:00">05:30</option>
					<option value="06:00:00">06:00</option>
					<option value="06:30:00">06:30</option>
					<option value="07:00:00">07:00</option>
					<option value="07:30:00">07:30</option>
					<option value="08:00:00">08:00</option>
					<option value="08:30:00">08:30</option>
					<option value="09:00:00" selected="selected">09:00</option>
					<option value="09:30:00">09:30</option>
					<option value="10:00:00">10:00</option>
					<option value="10:30:00">10:30</option>
					<option value="11:00:00">11:00</option>
					<option value="11:30:00">11:30</option>
					<option value="12:00:00">12:00</option>
					<option value="12:30:00">12:30</option>
					<option value="13:00:00">13:00</option>
					<option value="13:30:00">13:30</option>
					<option value="14:00:00">14:00</option>
					<option value="14:30:00">14:30</option>
					<option value="15:00:00">15:00</option>
					<option value="15:30:00">15:30</option>
					<option value="16:00:00">16:00</option>
					<option value="16:30:00">16:30</option>
					<option value="17:00:00">17:00</option>
					<option value="17:30:00">17:30</option>
					<option value="18:00:00">18:00</option>
					<option value="18:30:00">18:30</option>
					<option value="19:00:00">19:00</option>
					<option value="19:30:00">19:30</option>
					<option value="20:00:00">20:00</option>
					<option value="20:30:00">20:30</option>
					<option value="21:00:00">21:00</option>
					<option value="21:30:00">21:30</option>
					<option value="22:00:00">22:00</option>
					<option value="22:30:00">22:30</option>
					<option value="23:00:00">23:00</option>
					<option value="23:30:00">23:30</option>
				</select>
				<select id="dropoff_location" name="dropoff_location">
					<option disabled selected value>Drop-off location</option>
					<option value="Penang Jetty">Penang Jetty</option>
					<option value="Penang International Airport">Penang International Airport</option>
					<option value="Perangin Mall">Perangin Mall</option>
					<option value="Queensbay Mall">Queensbay Mall</option>
				</select>
				<input type="text" id="dt2" name="dt2">
				<select id="dropoff_time" name="dropoff_time">
					<option value="00:00:00">00:00</option>
					<option value="00:30:00">00:30</option>
					<option value="05:00:00">05:00</option>
					<option value="05:30:00">05:30</option>
					<option value="06:00:00">06:00</option>
					<option value="06:30:00">06:30</option>
					<option value="07:00:00">07:00</option>
					<option value="07:30:00">07:30</option>
					<option value="08:00:00">08:00</option>
					<option value="08:30:00">08:30</option>
					<option value="09:00:00" selected="selected">09:00</option>
					<option value="09:30:00">09:30</option>
					<option value="10:00:00">10:00</option>
					<option value="10:30:00">10:30</option>
					<option value="11:00:00">11:00</option>
					<option value="11:30:00">11:30</option>
					<option value="12:00:00">12:00</option>
					<option value="12:30:00">12:30</option>
					<option value="13:00:00">13:00</option>
					<option value="13:30:00">13:30</option>
					<option value="14:00:00">14:00</option>
					<option value="14:30:00">14:30</option>
					<option value="15:00:00">15:00</option>
					<option value="15:30:00">15:30</option>
					<option value="16:00:00">16:00</option>
					<option value="16:30:00">16:30</option>
					<option value="17:00:00">17:00</option>
					<option value="17:30:00">17:30</option>
					<option value="18:00:00">18:00</option>
					<option value="18:30:00">18:30</option>
					<option value="19:00:00">19:00</option>
					<option value="19:30:00">19:30</option>
					<option value="20:00:00">20:00</option>
					<option value="20:30:00">20:30</option>
					<option value="21:00:00">21:00</option>
					<option value="21:30:00">21:30</option>
					<option value="22:00:00">22:00</option>
					<option value="22:30:00">22:30</option>
					<option value="23:00:00">23:00</option>
					<option value="23:30:00">23:30</option>
				</select>
				<input type="submit" value="Book" name="bookhBtn">
				<input type="hidden" name="submitted" value="true"/>
			</form>
		</div>
		</div>	
	</div>
</div>
<?php
	require('footer.html');
?>