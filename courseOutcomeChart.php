
<?php
  include 'connect.php';
  session_start();


  $studentID = $_POST['stdID'];
  $year  = $_POST['year'];
  $semester = $_POST['semester'];
  $course = $_POST['course'];
  $percentage =NULL;
  $time = NULL;
  $valid = 1;

  $section_check = $con->query("SELECT * FROM section_t WHERE courseID = '$course' 
  AND year = '$year' AND semester = '$semester'")->fetch_assoc();

     
if($section_check != NULL){

    $secID = $section_check['sectionID'];

    $reg_check = $con->query("SELECT * FROM registration_t WHERE sectionID = '$secID' AND studentID = '$studentID'")->fetch_assoc();

    if($reg_check ==  NULL){
        $valid = 0;
    }
    else{
        $regID = $reg_check['registrationID']; 
        $regID = 48;
        $scp_check = $con->query("SELECT * FROM student_course_performance_t WHERE registrationID = '$regID'")->fetch_assoc();
        $percentage = $scp_check['totalMarksObtained'];
        $scpID = $scp_check['scpID'];
        $spl_check = $con->query("SELECT * FROM student_perf_log_t WHERE scpID ='$scpID' AND 'registrationID = '$regID'")->fetch_assoc();
        $time = $spl_check['time'];

    }
}
else{
    $valid = 0;
}
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
                  <li><a href="courseOutcomeForm.php" target="_self">Course Outcome</a></li>
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
                

<h1><?php print $percentage; 
print $time?></h1>
                
        
        </div>
    </div>
   

  </body>

</html>