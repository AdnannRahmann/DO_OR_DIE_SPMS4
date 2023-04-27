<?php
  include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>GPA Analysis</title>
   

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

                    <h2 class="list-header"><strong>GPA Analysis</strong></h2>
                    
                    <ul class="list">
                      <li><a href="school_department_program_stats.php" target="_self">School/ Department/ Program-wise</a></li>
                      <li><a href="courseWisePerformance.php" target="_self">Course-wise</a></li>
                      <li><a href="instructorWisePerformance.php" target="_self">Instructor-wise</a></li>
                      <li><a href="instructorWiseChosenCourse.php" target="_self">Instructor-wise (Chosen Course)</a></li>
                      <li><a href="enrollmentStatistics.php" target="_self">VC/Dean/Head-wise</a></li>
                      
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