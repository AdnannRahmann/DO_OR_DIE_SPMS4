<?php
  include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!---->
	<!----> 
	  <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="bootstrap.min.css">
      
    
    
	  <title>CO</title>
    <style>
      body{
        background-image:url('background.png');
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:50% 80%;
        background-position:center;
        background-color:#4d4d4d;
      }
      .button{
        width:100px;
      }

      
    </style>
  </head>

  <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 col-sm-4 sidebar1">
            <div class="logo">
                 SPMS 4.0
            </div>
                <br>
            <div class="left-navigation">
              <ul class="list">
                <li><a href="employee_dashboard.php">Dashboard</a></li>
                        
                </ul>

                <br>

                <ul class="list">
                  <li><a href="ploAnalysis.php" target="_self">PLO Analysis</a></li>
                  <li><a href="ploAchieveStats.php" target="_self">PLO Achievement Stats</a></li>
                  <li><a href="spiderChart.php" target="_self">Spider Chart Analysis</a></li>
                  <li><a href="dataEntry.php" target="_self">Data Entry</a></li>
                  <li><a href="viewCourseOutline.php" target="_self">View course Outline</a></li>
                  <li><a href="enrollmentStatistics.php" target="_self">Enrollment Stats</a></li>
                  <li><a href="performanceStats.php" target="_self">GPA Analysis</a></li>
                  <li><a href="courseOutcomeForm.php" target="_self">Submit Student Performance Data</a></li>
                  <li><a href="viewCO.php" target="_self">View Course Outcome</a></li>
                </ul>
                       
                <br>

                <ul class="list">
                       
                  <li><a href="logout.php" target="_self">Logout</a></li>
                </ul>
            </div>

          </div>
          <div class="col-md-10 ">
                <!--Main content code to be written here --> 
 
    <div class="wrapper transition">
  <div class="title">
    <h1>Submit Student Performance Data</h1>
  </div>
  <div class="contact-form">
    <div class="input-fields">
    <form class="mt-5"action="courseOutcomeConfig.php" method="POST" >
      <input type="number" class="input" name="stdID"placeholder="ID">
      <input type="text" class="input" name="grade" placeholder="Grade">
      <input type="year" class="input" name="year" placeholder="Year">
      <input type="text" class="input" name="semester" placeholder="Semester">
      <input type="text" class="input" name="course" placeholder="Course">
      <input type="text" class="input" name="section" placeholder="Section">    
      <input type="file" class="input">
      <h4>upload csv file above</h4>
      <button type="submit" class="button">Submit</button>
      </form>
    </div>


      

  </div>
</div>

<div class="col-lg-12">
            <div class="card card-chart">

              <div class="alert alert-success" <?php if(isset($_GET['response']) && $_GET['response'] == 200){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Student Performance Data Stored to database. Go to View course outcome to see CO percentage Achieved in ALL CO's</span>
              </div>

              <div class="alert alert-danger" <?php if(isset($_GET['response']) && $_GET['response'] == 501){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Invalid data input/field info missing.</span>
              </div>
   

  </body>

  <script src="bootstrap.min.js"></script>


</html>


    