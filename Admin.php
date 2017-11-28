<?php
	require('Aheader.html');
?>
<style type="text/css">
#details {
	font-size: 20px;
	font-family: Verdana;
	flaot: left;
}

c {
	font-size: 30px;
}

b {
	font-size: 20px;
}

#img_div {
	padding: 5px;
	padding-left: 15px;
	margin: 15px auto;
	border: 5px solid #cbcbcb;
	border-radius: 5px;
	height: 300px;
}

#img_div:after {
	content: "";
	display: block;
	clear: both;
}

img{
	float: left;
	width: 300px;
	height: 300px;
}

#img_div p {
	float: left;
	margin-left: 120px;
	margin-top : 70px;
}

#carimg {
	height: 300px;
}

#FormNav {
	float:left;
	color:white;
	padding-top:15px;
	font-size:20px;
	font-family: "Arial";
	margin:15px auto;
	background:#585858;
	width:330px;
	height: auto;
	border-radius:10px;
	text-align: center;
}

#pickup_location {
	margin-top:20px;
	width:280px;
	height:40px;
	font-size:15px;
	font-family: "Tahoma";
	border-radius:5px;
	border: none;
	padding-left: 15px;

}

#dropoff_location {
	margin-top:20px;
	width:280px;
	height:40px;
	font-size:15px;
	font-family: "Tahoma";
	border-radius:5px;
	border: none;
	padding-left: 15px;

}

#dt1 {
	width: 130px;
	height: 40px;
	font-size: 15px;
	font-family: "Tahoma";
	margin-top:20px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}
	
#dt2 {
	width: 130px;
	height: 40px;
	font-size: 15px;
	font-family: "Tahoma";
	margin-top:20px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}

#pickup_time {
	width: 130px;
	height: 40px;
	font-size: 15px;
	font-family: "Tahoma";
	margin-top:20px;
	margin-left: 15px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}

#dropoff_time {
	width: 130px;
	height: 40px;
	font-size: 15px;
	font-family: "Tahoma";
	margin-top:20px;
	margin-left: 15px;
	border-radius:5px;
	border: none;
	padding-left: 15px;
}
	
#FormNav input[type="submit"]{
	-webkit-tap-highlight-color: transparent;
	background-color: #55a1fb;
	border-radius: 5px;
	border: none;
	box-sizing: border-box;
	color: #fff;
	cursor: pointer;
	display: inline-block;
	font-size: 20px;
	font-family: "Tahoma";
	height: 42px;
	line-height: 42px;
	outline: none;
	padding: 0 24px;
	text-align: center;
	text-decoration: none;
	-webkit-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	white-space: nowrap;
	width: 130px;
	margin-top: 20px;
	margin-left: 150px;
}
#FormNav input[type="submit"]:hover{	 
	background: #2287FF;
	color: white;
}

</style>
<div id="container">
<div id="content">
	<div id="details">
		<?php
			$dbc = mysqli_connect('localhost','root','');
			mysqli_select_db($dbc,'car');
			
			$query = 'SELECT * FROM car_info ORDER BY car_rent_price ASC';
			if($info=mysqli_query($dbc,$query)){
				while ($allinfo=mysqli_fetch_array($info)) {
					echo "<div id='img_div'>";
						echo "<img src='uploads/".$allinfo['car_image'].".jpg'>";
						echo "<p><b><c>".$allinfo['car_name']."</c></b><br/>";
						echo "<b>".$allinfo['car_type']."</b><br/>";
						echo "".$allinfo['transmission']." Transmission<br/>";
						echo "".$allinfo['door']." Doors<br/>";
						echo "".$allinfo['seat']." Seats<br/>";
						echo "<b>MYR ".$allinfo['car_rent_price']." per day</b></p><br/>";
					echo "</div>";
				}
			}
		?>
	</div>
</div>
</div>
</body>
</html>