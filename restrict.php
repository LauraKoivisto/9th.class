<?php
//we need functions for dealing with session_destroy
require_once("functions.php");

//RESTRICTION-LOGGED IN
if(!isset($_SESSION["user_id"])){
//redirect the not logged in user to log in page
header("Location: login.php");

}

//?logout is in the url
if (isset($_GET["logout"])){
//delete the session
session_destroy();


header("Location: login.php");

}
//someone clicked button add
if(isset($_GET["add_new_interest"])){
if(!empty($_GET["new_interest"])){
saveInterest($_GET["new_interest"]);
}else{

  echo "You left the field empty";
}



}
//someone clicked the button "select"
if(isset($_GET["select_new_interest"])){
if(!empty($_GET["user_interest"])){
saveUserInterest($_GET["user_interest"]);
}else{

  echo "error";
}



}


//createInterestDropdown();

?>
<br>
<a href="?logout=1">Log out</a>
<br>
<br>
<br>
<h1>Welcome <?php echo $_SESSION["name"];?> (<?=$_SESSION["user_id"];?>) </h1>

<h2> Add interests </h2>
<form>
<input type="text" name="new_interest">
<input type="submit" name="add_new_interest" value="add">

<h2> Select user interest </h2>
<form>
  <?php createInterestDropdown();?>
  <input type="submit" name="select_new_interest" value="Select">

  <?php createUserInterestList();?>
  <input type="submit" name="select_new_interest" value="Select">



</form>
