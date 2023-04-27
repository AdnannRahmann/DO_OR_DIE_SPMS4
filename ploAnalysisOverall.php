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

                    
                    
                    <ul class="list">
                      
                      <li><a href="ploAnalysisDepartmentProgramSchoolAverage.php" target="_self">PLO Analysis With Department/ Program/ School Average</a></li>
                      <li><a href="ploAnalysisOverall.php" target="_self">PLO Analysis (Overall, CO Wise, Course Wise)</a></li>
                      
                      
                      <br>

                    <ul class="list">
                       <li><a href="logout.php" target="_self">Logout</a></li>
                    
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 ">
              <div class="background">

<div style="height:80px;"class="row1">
  <form method="POST">
  <input style="background-color:#F58D63;height:50px;border: 1px solid;cursor: pointer;border-radius: 0px;font-size: 14px;letter-spacing:2px;
                font-weight: bold;text-transform:uppercase; border: none;outline: none;text-align: center;margin-right:20px;
                color:white;margin-left:43%;margin-top:13px;" type="text" placeholder="Enter Student ID" name="studentID"/>
       
  <input style="background:#f1ab53;border-radius:0px; border:none;outline:none;color:#fff;font-size:14px;
              letter-spacing:2px;text-transform:uppercase;cursor:pointer;font-weight:bold;margin-left:5px;height: 36px;width: 100px;"
        
  type="submit" name="submit" value="Submit"/>
  </form>
  </div>

<div style="display:flex;justify-content:space-around" class="row2">
<div class="col"><button onclick="overallPlo()" style="width:300px;margin-left:0px;" class="School-wise">Overall PLO</button></div>
<div class="col"><button onclick="coWisePlo()" style="width:300px;" class="Department-wise">CO Wise PLO</button></div>
<div class="col"><button onclick="courseWisePlo()" style="width:300px;" class="Program-wise">Course Wise PLO</button></div>
</div>

<div style="display:flex;justify-content:center;" class="row3" style="margin-top:20px;"> 
 <div id="Autumn" style="width: 65%; height: 500px; display:inline-block;margin-top:23px;"></div>
 
</div>
</div>
            
            
        </div>
      </div>

    

<?php
if(isset($_POST['submit'])){
  $studentID=$_POST['studentID'];
}
?>

<!-- Overall plo -->
<script>
    function overallPlo(){
    <?php

    $sql="SELECT plo.ploNum AS ploNum, 
    AVG((ans.markObtained/q.markPerQuestion)*100) AS percent
    FROM registration_t AS r, answer_t AS ans, question_t AS q, 
    co_t AS co, plo_t AS plo
    WHERE r.registrationID=ans.registrationID 
    AND ans.examID=q.examID
    AND ans.answerNum=q.questionNum AND q.coNum=co.coNum 
    AND q.courseID=co.courseID AND co.ploID=plo.ploID 
    AND r.studentID='$studentID'
    GROUP BY plo.ploNum,r.studentID";

    $result=mysqli_query($con,$sql);
    ?>
    
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawAutumnChart);

      function drawAutumnChart() {
        var data = google.visualization.arrayToDataTable([
          ['ploNum','PLO Percentage'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
             
              $ploNum="PLO".$data['ploNum'];
              $percent=$data['percent'];
              
           ?>

           ['<?php echo $ploNum;?>',<?php echo $percent;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Overall PLO Analysis',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Autumn'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
}
</script> 


<!-- Co wise plo -->
<script>
function coWisePlo(){
   
    }
</script>

<!-- course wise plo -->

<script>
function courseWisePlo(){


    }
</script>

</body>
    <script src="bootstrap.min.js"></script>

</html>