<?php
session_start();
include 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Employee Dashboard</title>
    <!--Google Font-->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="courseOutline.css">
    <link rel="stylesheet" href="questionform.css">

    <style>
      body{
        background-image:url('background.png');
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:40% 60%;
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
                    <h3 class="list-header"><strong>Data Entry</strong></h3>

                    <ul class="list">
                      <li><a href="exam.php" target="_self">Exam</a></li>
                      <li><a href="createCourseOutlinePage1.php" target="_self">Create Course Outline</a></li>
                      <li><a href="viewCourseOutline.php" target="_self">View Course Outline</a></li>
                    <br>

                    <ul class="list">
                       <li><a href="logout.php" target="_self">Logout</a></li>
                    
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 ">

  <form method="post">
  
  <div style="display:flex;justify-content:space-evenly;">
    
    <select style="width:200px;margin-left:0px;" name="courseID" class="select">
            <option disabled selected>Course</option>
             <option value="CSC101">CSC101</option>
             <option value="CSC303">CSC303</option>
             <option value="MIS430">MIS430</option>
             <option value="ENG101">ENG101</option>
         </select>

    <select style="width:200px;margin-left:0px;" name="sectionNum" class="select">
            <option disabled selected>Section</option>
             <option value="1">Section-1</option>
             <option value="2">Section-2</option>
             <option value="3">Section-3</option>
    </select>  
    
    <select style="width:200px;margin-left:0px;" name="semester" class="select">
            <option disabled selected>Semester</option>
             <option value="spring">spring</option>
             <option value="summer">summer</option>
             <option value="autumn">autumn</option>
    </select>  

    <select style="width:200px;margin-left:0px;" name="year" class="select">
            <option disabled selected>year</option>
             <option value="2020">2020</option>
             <option value="2021">2021</option>
             <option value="2022">2022</option>
    </select> 
    </div> 
   
  <div style="display:flex;justify-content:space-evenly;margin-top:15px;"> 
  <input style="margin-left:0px;width:200px;" type="submit" value="Submit" name="submit" class="select">
  </div> 

  </form>
     
  </div>
      </div>

<?php

include 'connect.php';

if(isset($_POST['submit'])){

    $sectionNum=$_POST['sectionNum'];
    $courseID=$_POST['courseID'];
    $semester=$_POST['semester'];
    $year=$_POST['year'];

  //Getting section ID from database
  $result=mysqli_query($con,"SELECT sec.sectionID AS sectionID
  FROM section_t AS sec
  WHERE sec.sectionNum='$sectionNum' AND sec.courseID='$courseID' 
  AND sec.semester='$semester' AND sec.year='$year'");
  $row=mysqli_fetch_assoc($result); 
  $_SESSION['sectionID']=$row['sectionID'];

  header('location:createpdf.php');

}?>



  </body>
    <script src="bootstrap.min.js"></script>
</html>
