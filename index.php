<?php

$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    include 'connect.php';
    
    $userType=$_POST['userType'];
    $ID=$_POST['ID'];
    $password=$_POST['password'];

  if($userType!='student'){
    $sql="SELECT * from employee_t where employeeID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

  elseif($userType=='student'){
    $sql="SELECT * from student_t where studentID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

        else{
            $invalid=1;
        }
  }
  ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-image:url('background.png');
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:50% 80%;
        background-position:center;
        background-color:#4d4d4d;
        background-position: left center;
      }


      .mainContainer {
        width: 350px;
        margin-left: 600px;
        background-color: #fff;
        border: 1px solid #dbdbdb;
        border-radius: 3px;
        padding: 20px;
        margin-top: 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      h1 {
        font-size: 2.5rem;
        margin: 0;
      }

      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 20px;
      }

      label {
        font-weight: bold;
        margin-right: auto;
        font-size: 14px;
        margin-bottom: 5px;
        color: #8e8e8e;
      }

      select,
      input {
        width: 100%;
        height: 40px;
        padding: 10px;
        margin-bottom: 10px;
        font-size: 14px;
        background-color: #fafafa;
        border: 1px solid #dbdbdb;
        border-radius: 3px;
      }

      select:focus,
      input:focus {
        outline: none;
        border: 1px solid #3797ef;
      }

      input[type="submit"] {
        width: 100%;
        background-color: #F17153;
        color: #fff;
        border: none;
        height: 40px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
      }

      input[type="submit"]:hover {
        background-color: #f1ab53;
      }

      .alert {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 3px;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
      }

      .alert-danger {
        background-color: #ed4956;
      }

      .logo {
        width: 175px;
        margin-bottom: 30px;
      }
    </style>


  </head>
  <body>

 <?php
 if($invalid==1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> Invalid credentials!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

<div style="display:flex;justify-content:center;">
  <div class="mainContainer">
   <form action="index.php" method="post">
  <div>
    
    <select name="userType" class="select selectNew">
             <option disabled selected>User Type</option>
             <option value="student">Student</option>
             <option value="faculty">Faculty</option>
             <option value="department head">Department Head</option>
             <option value="dean">Dean</option>
         </select>
         </div>
    <br>

    <label style="margin-left:10%;">
      ID  
    </label>
    <input class="ID" style="margin-left:0%;" type="text" name="ID" placeholder="Enter Your ID">
    <br>
    <label>
      Password  
    </label>
    <input class="ID" style="margin-left:0%;" type="password" name="password" placeholder="Enter Your Password"><br>
    <input type="submit" name="submit" value="Login" class="submitButton">
    </form>
  </div>
  </div>

</body>
</html> 