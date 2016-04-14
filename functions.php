<?php

require_once("../config.php");

//start new session to store data
//in every file you want to access session
//you should require functions

session_start();

function login($user, $pass){

  $pass = hash ("sha512", $pass);
  $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_laukoi");
  $stmt= $mysql->prepare("SELECT id, name FROM users WHERE username=? and password=?");
echo $mysql->error;
$stmt->bind_param("ss", $user,$pass);
$stmt->bind_result($id, $name);
$stmt->execute();

//get the data
if($stmt->fetch()){
				echo "user with id".$id."logged in!";

//create session variables
//redirect user
$_SESSION["user_id"] = $id;
$_SESSION["name"]= $name;
$_SESSION["username"]= $user;

header("Location: restrict.php");

			}else{
				echo "Wrong credentials!";
			}


}

function signup($user, $pass, $name) {

  //hash the password
  $pass = hash ("sha512", $pass);


  //GLOBALS - access outside variable in function
  $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_laukoi");




  $stmt = $mysql->prepare("INSERT INTO users(username, password, name) VALUES (?, ?, ?) ");

  echo $mysql->error;

  $stmt-> bind_param("sss",$user, $pass, $name);

  if($stmt->execute()){
    echo "user saved successfully";
  }else{
  echo $stmt->error;

  }

}

function saveInterest($interest){

    $mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_laukoi");
      $stmt= $mysql->prepare("INSERT INTO interests (name) VALUE (?)");
echo $mysql->error;
$stmt->bind_param("s", $interest);
if($stmt->execute()){
  echo "interest saved";
}else{

  echo $stmt->error;
}


}
/*$name = "Laura";

hello($name, "thursday", 7);
hello("Toomas", "esmapaev", 1);


function hello($recieved_name, $day_of_the_week, $day){
echo "Hello " .$recieved_name."!";
echo "<br>";
echo "Today is ".$day_of_the_week." ".$day;
echo "<br>";

}*/

?>
