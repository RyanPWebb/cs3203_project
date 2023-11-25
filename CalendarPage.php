<?php  
  session_start();
  $name = $_SESSION["firstName"];
  $uid = $_SESSION["userID"];


	$dayHeaders = ["SUNDAY","MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY"];
	$sunlist = ["English Homework 1",null,null,null,null];
	$monlist = ["English Quiz 1",null,null,null,null];
	$tuelist = ["Bio Homework 1",null,null,null,null];
	$wedlist = ["Biology Quiz","English Homework 2 ",null,null,null];;
	$thulist = [null,null,null,null,null];
	$frilist = ["English Test 1",null,null,null,null];
	$satlist = [null,null,null,null,null];

	$sunContents = [True,False,False,False,False];
	$monContents = [True,False,False,False,False];
	$tueContents = [True,False,False,False,False];
	$wedContents = [True,True,False,False,False];
	$thuContents = [False,False,False,False,False];
	$friContents = [True,False,False,False,False];
	$satContents = [True,False,False,False,False];

	$gridFull = "grid-item";
	$gridEmpty = "grid-item-empty";
	$gridHeader = "grid-header";
	$gridFormats = [$gridHeader,$gridFull,$gridEmpty];



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

<h1><?php echo $name ?>, Here is your week at a glance.</h1>

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
  <div class=<?php echo $gridFormats[1]?>><?php echo $sunlist[0]; ?></div>
  <div class=<?php echo $gridFormats[1]?>><a href="url"><?php echo $monlist[0]; ?></a></div>
  <div class=<?php echo $gridFormats[1]?>><?php echo $tuelist[0]; ?></div>
  <div class=<?php echo $gridFormats[1]?>><?php echo $wedlist[0]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $thulist[0]; ?></div>
  <div class=<?php echo $gridFormats[1]?>><?php echo $frilist[0]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $satlist[0]; ?></div>

  <!-- Assignment Row 2 -->
  <div class=<?php echo $gridFormats[2]?>><?php echo $sunlist[1]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $monlist[1]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $tuelist[1]; ?></div>
  <div class=<?php echo $gridFormats[1]?>><?php echo $wedlist[1]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $thulist[1]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $frilist[1]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $satlist[1]; ?></div>
  
  <!-- Assignment Row 3 -->
  <div class=<?php echo $gridFormats[2]?>><?php echo $sunlist[2]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $monlist[2]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $tuelist[2]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $wedlist[2]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $thulist[2]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $frilist[2]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $satlist[2]; ?></div>
  <!-- Assignment Row 4 -->

  <div class=<?php echo $gridFormats[2]?>><?php echo $sunlist[3]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $monlist[3]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $tuelist[3]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $wedlist[3]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $thulist[3]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $frilist[3]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $satlist[3]; ?></div>

  <!-- Assignment Row 5 -->
  <div class=<?php echo $gridFormats[2]?>><?php echo $sunlist[4]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $monlist[4]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $tuelist[4]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $wedlist[4]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $thulist[4]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $frilist[4]; ?></div>
  <div class=<?php echo $gridFormats[2]?>><?php echo $satlist[4]; ?></div>

</div> 
<a href="AddNewTask.php"><button> Add New Task </button></a>
<!--<button onclick="window.location.href='AddNewTask.php';"> Add New Task </button> -->

<a href="DeleteTask.php"><button> Delete Task </button></a>
<!--<button onclick="window.location.href='DeleteTask.php';"> Delete Task </button>-->


</body>
</html>