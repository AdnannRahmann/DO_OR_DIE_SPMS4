<?php
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript"></script>  


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
                    <h3 class="list-header"><strong>PLO Comparison</strong></h3>
                    
                    <ul class="list">
                      
                      <li><a href="ploComparisonStudent.php" target="_self">Student</a></li>
                      <li><a href="ploComparisonCourse.php" target="_self">Course</a></li>
                      <li><a href="ploComparisonProgram.php" target="_self">Program</a></li>
                      <li><a href="ploComparisonSchool.php" target="_self">School</a></li>
                      <li><a href="ploComparisonDepartment.php" target="_self">Department</a></li>
                      
                      <br>

                    <ul class="list">
                       <li><a href="logout.php" target="_self">Logout</a></li>
                    
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 ">
              
<div class="background">

<div style="display:flex;justify-content:center;" class="row1">
<form method="POST">

<select style="margin-left:10px;" name="schoolID" class="select">
  <option disabled selected>School</option>
  <option value="SETS">SETS</option>
  <option value="SBE">SBE</option>
</select>


<select style="margin-left:10px;" name="year" class="select">
  <option disabled selected>Year</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
</select>
         <input style="background:#f1ab53;border-radius:0px;border:none;outline:none;color:#fff;font-size:14px;letter-spacing:2px;
         text-transform:uppercase;cursor:pointer;font-weight:bold;margin-left:10px;height: 36px;width: 100px;"
         type="submit" name="submit" value="Submit"/>
</form>       
</div>  <!-- div row-1 ends here -->

  
   <!-- div row-2 -->
   <div style="height:50px;padding-left:43%;margin-top:15px;">
   <button onclick="view()" style="height: 46px;width: 100px;margin-left:40px;display:inline-block;border-radius: 5px;
   border: none;outline: none;background:#f1ab53;color: #fff;font-size: 14px;letter-spacing:2px;
   text-transform: uppercase;cursor:pointer;font-weight: bold;">view</button>
   </div> <!-- div row-2 ends here -->

<div class="row3" style="margin-top:5px;"> 
  <div id="Spring" style="width: 500px; height: 500px; display:inline-block;margin-top:15px;"></div>
  <div id="Summer" style="width: 500px; height: 500px; display:inline-block;"></div>
  <div id="Autumn" style="width: 500px; height: 500px; display:inline-block;"></div>
</div>

   <!-- div row-3 ends here -->

</div>  <!-- background div ends here -->

            
            
        </div>
      </div>

<?php
    if(isset($_POST['submit'])){
    $year=$_POST['year'];
    $schoolID=$_POST['schoolID'];
  }?>

<script>
    function view(){
     
    <?php

    $sql="SELECT plo.ploNum AS ploNum, 
    AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
    FROM section_t AS sec, plo_t AS plo, answer_t AS ans, question_t AS q, 
    registration_t AS r, co_t AS co, student_t AS s, department_t AS d
    WHERE r.sectionID=sec.sectionID AND r.registrationID=ans.registrationID 
    AND ans.examID=q.examID
    AND ans.answerNum=q.questionNum AND q.coNum=co.coNum 
    AND q.courseID=co.courseID AND co.ploID=plo.ploID 
    AND sec.year='$year' AND r.studentID=s.studentID AND sec.semester='spring'
     AND s.departmentID=d.departmentID AND d.schoolID='$schoolID'
    GROUP BY plo.ploNum
    ORDER BY plo.ploNum";
    $result=mysqli_query($con,$sql);
    ?>
    
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawAutumnChart);
    google.charts.setOnLoadCallback(drawSummerChart);
    google.charts.setOnLoadCallback(drawSpringChart);

      function drawAutumnChart() {
        var data = google.visualization.arrayToDataTable([
          ['PLO','Achieved','Expected'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $ploNum="PLO".$data['ploNum'];
              $percent=$data['percent'];
           ?>
           ['<?php echo $ploNum;?>',<?php echo $percent;?>,<?php echo '70';?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Semester Wise PLO Achievement Comparison for School (Autumn)',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Autumn'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


<?php
$sql="SELECT plo.ploNum AS ploNum, 
AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
FROM section_t AS sec, plo_t AS plo, answer_t AS ans, question_t AS q, 
registration_t AS r, co_t AS co, student_t AS s, department_t AS d
WHERE r.sectionID=sec.sectionID AND r.registrationID=ans.registrationID 
AND ans.examID=q.examID
AND ans.answerNum=q.questionNum AND q.coNum=co.coNum 
AND q.courseID=co.courseID AND co.ploID=plo.ploID 
AND sec.year='$year' AND r.studentID=s.studentID AND sec.semester='summer' 
AND s.departmentID=d.departmentID AND d.schoolID='$schoolID'
GROUP BY plo.ploNum
ORDER BY plo.ploNum";
$result=mysqli_query($con,$sql);
?>

      function drawSummerChart() {
        var data = google.visualization.arrayToDataTable([
          ['PLO','Achieved','Expected'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
            $ploNum="PLO".$data['ploNum'];
            $percent=$data['percent'];
           ?>
           ['<?php echo $ploNum;?>',<?php echo $percent;?>,<?php echo '70';?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Semester Wise PLO Achievement Comparison for School (Summer)',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Summer'));

        chart.draw(data, google.charts.Bar.convertOptions(options)); 
    }
<?php
$sql="SELECT plo.ploNum AS ploNum, 
AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
FROM section_t AS sec, plo_t AS plo, answer_t AS ans, question_t AS q, 
registration_t AS r, co_t AS co, student_t AS s, department_t AS d
WHERE r.sectionID=sec.sectionID AND r.registrationID=ans.registrationID 
AND ans.examID=q.examID
AND ans.answerNum=q.questionNum AND q.coNum=co.coNum 
AND q.courseID=co.courseID AND co.ploID=plo.ploID 
AND sec.year='$year' AND r.studentID=s.studentID AND sec.semester='autumn' 
AND s.departmentID=d.departmentID AND d.schoolID='$schoolID'
GROUP BY plo.ploNum
ORDER BY plo.ploNum";
$result=mysqli_query($con,$sql);
?>

function drawSpringChart() {
        var data = google.visualization.arrayToDataTable([
          ['PLO','Achieved','Expected'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $ploNum="PLO".$data['ploNum'];
              $percent=$data['percent'];
           ?>
           ['<?php echo $ploNum;?>',<?php echo $percent;?>,<?php echo '70';?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Semester Wise PLO Achievement Comparison for School (Spring)',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Spring'));
        chart.draw(data, google.charts.Bar.convertOptions(options)); 
    }

  }

</script>



</body>
    <script src="bootstrap.min.js"></script>
</html>