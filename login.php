<?php
require_once("functions.php");




//RESTRICTION-NOT LOGGED IN
if(isset($_SESSION["user_id"])){
//redirect the user to restricted page
header("Location: restrict.php");

}

//login button clicked
if(isset($_POST["login"])) {

//login

echo "logging in....";

//the username and password is not empty
if(!empty($_POST["username"]) && !empty($_POST["password"])) {

//save to DB

login($_POST["username"], $_POST["password"]);

}else{

echo "both fields are required";

}


//signup button clicked
}else if(isset($_POST["signup"])){

  //signup

  echo "Signing up...";

//the fields are empty
if(!empty($_POST["username"]) && !empty($_POST["password"])&& !empty($_POST["firstname"])) {

//save to DB

signup($_POST["username"], $_POST["password"], $_POST["firstname"]);

}else{

echo "All fields are required";

}




}




 ?>

<h1>Log in</h1>


<form method="POST">
<input type="text" placeholder="username" name="username">
<input type="password" placeholder="password" name="password">


<input type="submit" name="login" value="Log in">
</form>


<h1>Sign up</h1>


<form method ="POST">
  <input type="text" placeholder="First name" name="firstname">
  <br>
    <input type="text" placeholder="Favourite animal" name="Favourite animal"> <br>
<input type="text" placeholder="New username" name="username"> <br>
<input type="password" placeholder="New password" name="password">
<br>
<input type="submit" name="signup" value="Sign up">


</form>
