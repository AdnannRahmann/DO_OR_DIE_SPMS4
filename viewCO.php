
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
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    
    
    <script src="bootstrap.min.js"></script>
    <title>CO</title>
    <style>
      body{
        /* background-image:url('background.png'); */
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:50% 80%;
        background-position:center;
        background-color:#4d4d4d;
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
                  <li><a href="employee_dashboard.php" target="_self">Home</a></li>
                        
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
          <div class="col-md-10">
                <!--Main content code to be written here --> 
                
                <div class="alert alert-success" <?php if(isset($_GET['response']) && $_GET['response'] == 200){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> User Added Successfully.</span>
              </div>

              <div class="alert alert-danger" <?php if(isset($_GET['response']) && $_GET['response'] == 501){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Failed to add user.</span>
              </div>
              <div class="mt-5 text-center">
                <h1 class="card-title text-light">View Course Outcome</h1>
              </div>

                <form class="mt-5 container " action="courseOutcomeChart.php" method="POST" ><!--courseOutcomeChart.php -->

                <div class="row align-items-center">
                    <div class="col-6 mb-3 g-3 ">
                        <label class="form-label text-light fw-light">Student ID</label>
                        <input type="number" class="form-control" name="stdID">
                    </div>
                    <div class="col-6 mb-3 g-3">
                        <label class="form-label text-light fw-light">Course</label>
                        <input type="text" class="form-control" name="course" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mb-3 g-3">
                        <label class="form-label text-light fw-light">Year</label>
                        <input type="number" class="form-control" name="year" aria-describedby="emailHelp">
                    </div>
                    <div class="col-6 mb-3 g-3">
                        <label class="form-label text-light fw-light">Semester</label>
                        <input type="text" class="form-control" name="semester">
                    </div>
                </div>

                <div class="row">
                    
                    <div class="mt-5 py-3 position-relative">
                <button type="submit" class="button position-absolute bottom-0 end-0 ">Load Course Outcome</button>
                </div>
                </div>



                
      
                
                
                </form>

                
        
        </div>
    </div>
   

  </body>
          <script src="bootstrap.min.js"></script>

</html>
