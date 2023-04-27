<?php
session_start();

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
    <link rel="stylesheet" href="questionform.css">

    <style>
        body{
            background-color:#4d4d4d;
        }

        ::placeholder{
          color:white;
        }

        ::-ms-input-placeholder{
          color:white;
        }

        :-ms-input-placeholder{
          color:white;
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

                    <ul class="list">
                          <li><a href="addExam.php" target="_self">Add Exam</a></li>
                          <li><a href="viewExam.php" target="_self">View Exam</a></li>
                          <li><a href="viewStudentAnswerScript.php">Evaluate Exam Script</a></li>
                      <br>

                    <ul class="list">
                       
                        <li><a href="logout.php" target="_self">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 ">

      <form method="post">
      <div style="display:flex;justify-content:space-evenly;margin-top:15px;">
        
        <input type="text" style="background-color:#F17153;height:36px;cursor: pointer;border-radius: 0px;
           font-size: 14px;letter-spacing:2px;font-weight: bold;text-transform: uppercase;border: none;
           outline:none;text-align:center;color:white;width:250px;margin-top:0px;" 
           placeholder="Exam Name" name="examName"/>


      <select style="width:250px;margin-left:0px;margin-top:0px;" name="courseID" class="select">
     <option disabled selected>Course</option>
     <option value="CSC101">CSC101</option>
      <option value="EEE131">EEE131</option>
      <option value="ENG101">ENG101</option>
     </select>              

    <select style="width:250px;margin-left:0px;margin-top:0px;" name="sectionNum" class="select">
    <option disabled selected>Section</option>
    <option value="1">section-1</option>
    <option value="2">section-2</option>
    <option value="3">section-3</option>
    <option value="4">section-4</option>
    </select>  

    </div>  <!-- div row-1 ends here -->

  

    <!-- div row-2 starts here -->

    <div style="display:flex;justify-content:space-evenly;margin-top:15px;">

    <select style="width:250px;margin-left:0px;margin-top:0px;" name="semester" class="select">
       <option disabled selected>Semester</option>
       <option value="spring">spring</option>
       <option value="summer">summer</option>
       <option value="autumn">autumn</option>
     </select>              


     <input type="submit" style="width:250px;margin-top:0px;margin-left:0px;" name="submit" value="Submit" class="submitButton">


     <select style="width:250px;margin-top:0px;margin-left:0px;" name="year" class="select">
       <option disabled selected>year</option>
       <option value="2020">2020</option>
       <option value="2021">2021</option>
       <option value="2022">2022</option>
     </select> 
     
     
    </div>

    
   </form>    

   <?php
      if(isset($_POST['submit'])){
      $_SESSION['examName']=$_POST['examName'];
      $_SESSION['courseID']=$_POST['courseID'];
      $_SESSION['sectionNum']=$_POST['sectionNum'];
      $_SESSION['semester']=$_POST['semester'];
      $_SESSION['year']=$_POST['year'];

      header('location:answerScriptGrading.php');
      } 
  ?>  

  </body>
    <script src="bootstrap.min.js"></script>

</html>