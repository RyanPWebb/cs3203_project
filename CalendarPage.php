<?php  
session_start();

  //Arrays that will hold calendar container information
	$dayHeaders = ["SUNDAY","MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY"];
	$sunlist = array();
	$monlist = array();
	$tuelist = array();
	$wedlist = array();
	$thulist = array();
	$frilist = array();
	$satlist = array();

  //Formats for the header row, and for empty and full containers
	$gridFormats = ["grid-header","grid-item","grid-item-empty"]; 

  //Arrays managing formatting of columns, with all initially set to empty formatting
	$sunContents = [$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2]];
	$monContents = [$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2]];
	$tueContents = [$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2]];
	$wedContents = [$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2]];
	$thuContents = [$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2]];
	$friContents = [$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2]];
	$satContents = [$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2],$gridFormats[2]];

  //Variables used to connect to the SQL database
  $db_server = "localhost";
  $db_user = "user";
  $db_password = "password";
  $database = "engineering_project";
  $user_ID = $_SESSION["userID"];

  //Opening a connection to the database, with a connection failure error
  $conn = mysqli_connect($db_server,$db_user,$db_password,$database);
  if(!$conn){ echo 'Connection error: ' . mysqli_connect_error(); }

  //The first query collects data about all events belonging to the logged-in user
  $query1 = "SELECT e_id, title, e_date, e_time, description FROM events WHERE u_id = '$user_ID' ORDER BY e_date";
  $results1 = mysqli_query($conn, $query1);
  $events = mysqli_fetch_all($results1, MYSQLI_ASSOC);

  //The second query collect the user's first and last name
  $query2 = "SELECT name_first, name_last FROM users WHERE u_id = '$user_ID' ";
  $results2 = mysqli_query($conn, $query2);
  $name = mysqli_fetch_all($results2, MYSQLI_ASSOC);
  $name = $name[0];
  $name = $name['name_first'] . " " . $name['name_last'];
 
  //Freeing up the memory and closing the connection to the database
  mysqli_free_result($results1);
  mysqli_free_result($results2);
  mysqli_close($conn);
    
  //This loop runs evaluates the dates to find the day of the week they belong to
  //and places them in the corresponding array.
  $eventCount = count($events);
  for ($i=0; $i<$eventCount;$i++)
  {
  	$tempArray = $events[$i];
  	$eventDayOfWeek = date('w',strtotime($tempArray['e_date']));
  	switch($eventDayOfWeek) 
  	{
  		case 0: 
  		array_push($sunlist, $tempArray['title']);
  		$sunContents[count($sunlist)-1] = $gridFormats[1];
  		break;

  		case 1: 
  		array_push($monlist, $tempArray['title']);
  		$monContents[count($monlist)-1] = $gridFormats[1];  		
  		break;

  		case 2: 
  		array_push($tuelist, $tempArray['title']);
  		$tueContents[count($tuelist)-1] = $gridFormats[1];
  		break;

  		case 3: 
  		array_push($wedlist, $tempArray['title']);
  		$wedContents[count($wedlist)-1] = $gridFormats[1];
  		break;

  		case 4: 
  		array_push($thulist, $tempArray['title']);
  		$thuContents[count($thulist)] = $gridFormats[1];
  		break;

  		case 5: 
  		array_push($frilist, $tempArray['title']);
  		$friContents[count($frilist)-1] = $gridFormats[1];
  		break;

  		case 6: 
  		array_push($satlist, $tempArray['title']);
   		$satContents[count($satlist)-1] = $gridFormats[1]; 		
  		break;
  	}
  }
?>


<!-- Weekly View Calendar -->
<!DOCTYPE html>
<html>
<head>
<style>

.grid-container {
  display: grid;
  gap: 0px 0.3px;
  grid-template-columns: auto auto auto auto auto auto auto;
  padding: 10px;
}
.grid-header {
  background-color: cadetblue;
  border: 2px solid rgba(0, 0, 0, 0.8);
  padding: 10px;
  font-size: 12spx;
  font-weight: bold;
  text-align: center;
}
.grid-item {
  background-color: lightgray;
  border: 2px solid rgba(0, 0, 0, 0.8);
  padding: 10px;
  font-size: 12spx;
  text-align: center;
}
.grid-item-empty {
  background-color: white;
  padding: 20px;
}
</style>
</head>
<body>

<h1> <?php echo 'Hello '. $name . ', here is your week at a glance.'?></h1>

<p>Click an individual task to see more information.</p>



<div class="grid-container">
  <!-- Days of the Week Headers -->
  <div class=<?php echo $gridFormats[0]?>><?php echo $dayHeaders[0]; ?></div>
  <div class=<?php echo $gridFormats[0]?>><?php echo $dayHeaders[1]; ?></div>
  <div class=<?php echo $gridFormats[0]?>><?php echo $dayHeaders[2]; ?></div>  
  <div class=<?php echo $gridFormats[0]?>><?php echo $dayHeaders[3]; ?></div>
  <div class=<?php echo $gridFormats[0]?>><?php echo $dayHeaders[4]; ?></div>
  <div class=<?php echo $gridFormats[0]?>><?php echo $dayHeaders[5]; ?></div>  
  <div class=<?php echo $gridFormats[0]?>><?php echo $dayHeaders[6]; ?></div>
  <!-- Assignment Row 1 -->
  <div class=<?php echo $sunContents[0]?>><?php if ($sunContents[0]==$gridFormats[1]) {echo $sunlist[0];}?></div>
  <div class=<?php echo $monContents[0]?>><?php if ($monContents[0]==$gridFormats[1]) {echo $monlist[0];}?></div>
  <div class=<?php echo $tueContents[0]?>><?php if ($tueContents[0]==$gridFormats[1]) {echo $tuelist[0];}?></div>
  <div class=<?php echo $wedContents[0]?>><?php if ($wedContents[0]==$gridFormats[1]) {echo $wedlist[0];}?></div>
  <div class=<?php echo $thuContents[0]?>><?php if ($thuContents[0]==$gridFormats[1]) {echo $thulist[0];}?></div>
  <div class=<?php echo $friContents[0]?>><?php if ($friContents[0]==$gridFormats[1]) {echo $frilist[0];}?></div>
  <div class=<?php echo $satContents[0]?>><?php if ($satContents[0]==$gridFormats[1]) {echo $satlist[0];}?></div>
  <!-- Assignment Row 2 -->
  <div class=<?php echo $sunContents[1]?>><?php if ($sunContents[1]==$gridFormats[1]) {echo $sunlist[1];}?></div>
  <div class=<?php echo $monContents[1]?>><?php if ($monContents[1]==$gridFormats[1]) {echo $monlist[1];}?></div>
  <div class=<?php echo $tueContents[1]?>><?php if ($tueContents[1]==$gridFormats[1]) {echo $tuelist[1];}?></div>
  <div class=<?php echo $wedContents[1]?>><?php if ($wedContents[1]==$gridFormats[1]) {echo $wedlist[1];}?></div>
  <div class=<?php echo $thuContents[1]?>><?php if ($thuContents[1]==$gridFormats[1]) {echo $thulist[1];}?></div>
  <div class=<?php echo $friContents[1]?>><?php if ($friContents[1]==$gridFormats[1]) {echo $frilist[1];}?></div>
  <div class=<?php echo $satContents[1]?>><?php if ($satContents[1]==$gridFormats[1]) {echo $satlist[1];}?></div>
  <!-- Assignment Row 3 -->
  <div class=<?php echo $sunContents[2]?>><?php if ($sunContents[2]==$gridFormats[1]) {echo $sunlist[2];}?></div>
  <div class=<?php echo $monContents[2]?>><?php if ($monContents[2]==$gridFormats[1]) {echo $monlist[2];}?></div>
  <div class=<?php echo $tueContents[2]?>><?php if ($tueContents[2]==$gridFormats[1]) {echo $tuelist[2];}?></div>
  <div class=<?php echo $wedContents[2]?>><?php if ($wedContents[2]==$gridFormats[1]) {echo $wedlist[2];}?></div>
  <div class=<?php echo $thuContents[2]?>><?php if ($thuContents[2]==$gridFormats[1]) {echo $thulist[2];}?></div>
  <div class=<?php echo $friContents[2]?>><?php if ($friContents[2]==$gridFormats[1]) {echo $frilist[2];}?></div>
  <div class=<?php echo $satContents[2]?>><?php if ($satContents[2]==$gridFormats[1]) {echo $satlist[2];}?></div>
  <!-- Assignment Row 4 -->
  <div class=<?php echo $sunContents[3]?>><?php if ($sunContents[3]==$gridFormats[1]) {echo $sunlist[3];}?></div>
  <div class=<?php echo $monContents[3]?>><?php if ($monContents[3]==$gridFormats[1]) {echo $monlist[3];}?></div>
  <div class=<?php echo $tueContents[3]?>><?php if ($tueContents[3]==$gridFormats[1]) {echo $tuelist[3];}?></div>
  <div class=<?php echo $wedContents[3]?>><?php if ($wedContents[3]==$gridFormats[1]) {echo $wedlist[3];}?></div>
  <div class=<?php echo $thuContents[3]?>><?php if ($thuContents[3]==$gridFormats[1]) {echo $thulist[3];}?></div>
  <div class=<?php echo $friContents[3]?>><?php if ($friContents[3]==$gridFormats[1]) {echo $frilist[3];}?></div>
  <div class=<?php echo $satContents[3]?>><?php if ($satContents[3]==$gridFormats[1]) {echo $satlist[3];}?></div>




</div> 
<button onclick="window.location.href='https://w3docs.com';"> Add New Task </button>


</body>
</html>