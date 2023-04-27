<?php
  include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	  <title>PLO Analysis</title>

    <style>
      body{
        background-image:url('background.png');
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:50% 80%;
        background-position:center;
        background-color:#4d4d4d;
      }
    </style>

  </head>

  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
            <div class="logo">
                 SPMS 4.0
            </div>
                <br>
                <div class="left-navigation">
                    <ul class="list">
                      <li><a href="employee_dashboard.php" target="_self">Home</a></li>
                      
                    </ul>

                    <br>
                    <h3 class="list-header"><strong>Exam Entry</strong></h3>

                    <ul class="list">
                      <li><a href="addExam.php" target="_self">Add Exam</a></li>
                      <li><a href="viewExam.php" target="_self">View Exam</a></li>
                      <li><a href="viewStudentAnswerScript.php" target="_self">Evaluate Exam Script</a></li>
                    <br>

                    <ul class="list">
                       <li><a href="logout.php" target="_self">Logout</a></li>
                    
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 ">
            
            
        </div>
      </div>
  </body>
    <script src="bootstrap.min.js"></script>
</html>