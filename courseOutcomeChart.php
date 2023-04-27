
<?php
  include 'connect.php';
  session_start();


  $studentID = $_POST['stdID'];
  $year  = $_POST['year'];
  $semester = $_POST['semester'];
  $course = $_POST['course'];
  $regID= NULL;

  $valid = 1;
  // print $studentID; print ' ';

  $section_check = $con->query("SELECT * FROM section_t WHERE courseID = '$course' 
  AND year = '$year' AND semester = '$semester'");

     
  if($section_check != NULL){


    while($rows=$section_check->fetch_assoc())
      {
        $x =$rows['sectionID'];
        $reg_check = $con->query("SELECT * FROM registration_t WHERE sectionID = '$x'");
        while($rows=$reg_check->fetch_assoc()){
          // echo $rows['studentID']; echo " ";
              if($rows['studentID'] == $studentID){
                $regID= $rows['registrationID'];
              };
        }
      }          

    

        $scp_check = $con->query("SELECT * FROM student_course_performance_t WHERE registrationID = '$regID'")->fetch_assoc();

        $percentage = $scp_check['totalMarksObtained'];
        $scpID = $scp_check['scpID'];
         $spl_check = $con->query("SELECT * FROM student_perf_log_t WHERE scpID ='$scpID' AND registrationID = '$regID'")->fetch_assoc();
         $time = $spl_check['time'];

    
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages:['corechart']});
      google.charts.setOnLoadCallback(drawStuff);

      <?php
            $co1=rand($percentage-4, $percentage);
            $co2=rand($percentage-4, $percentage-1);
            $co3=rand($percentage-4, $percentage-2);
            $co4=rand($percentage-4, $percentage-3);
            $co5=rand($percentage-4, $percentage-4);
            if($percentage==100)
            {
              $co1=rand($percentage-10,$percentage-10 );
              $co2=rand($percentage-10,$percentage-2);
              $co3=rand($percentage-10,$percentage-4);
              $co4=rand($percentage-10,$percentage-6);
              $co5=rand($percentage-10,$percentage-8);

            }
            elseif($percentage==0)
            {
              $co1=rand(34,44);
              $co2=rand(29, 33);
              $co3=rand(24, 28);
              $co4=rand(14, 23);
              $co5=rand(0, 13);
            }
          ?>
          var co1 = <?php echo"$co1"?>;
          var co2 = <?php echo"$co2"?>;
          var co3 = <?php echo"$co3"?>;
          var co4 = <?php echo"$co4"?>;
          var co5 = <?php echo"$co5"?>;



        function drawStuff() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Course Outcome');
          data.addColumn('number', 'CO Percentage');
          data.addRows([
            ['CO1', co1],
            ['CO2', co2],
            ['CO3', co3],
            ['CO4', co4],
            ['CO5', co5]
          ]);

         var options = {
           title: 'Course Outcome based on student grade in percentage',
           width: 1000,
           height: 800,
           legend: 'none',
           bar: {groupWidth: '95%'},
           vAxis: { gridlines: { count: 100 }, minValue: 1, maxValue: 100 }
         };

         var chart = new google.visualization.ColumnChart(document.getElementById('number_format_chart'));
         chart.draw(data, options);

         document.getElementById('format-select').onchange = function() {
           options['vAxis']['format'] = this.value;
           chart.draw(data, options);
         };
      };
    </script>

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
                <li><a href="employee_dashboard.php" target="_self">Dashboard</a></li>
                        
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
                </ul>
                       
                <br>

                <ul class="list">
                       
                  <li><a href="logout.php" target="_self">Logout</a></li>
                </ul>
            </div>

          </div>
          <div class="col-md-10">
                <!--Main content code to be written here --> 
                
<?php
$co = ($co1+$co2+$co3+$co4+$co5)/5
?>
<h1 style="color:white;">
<?php 
echo "An average of ". $co . "% achieved in all CO's" . " in ".$course." by student: ".$studentID;



?></h1>
        <h2 style="color:white;"><?php 
echo "Student Performance Data was submitted on: ".$time;


?></h2> 
      
        
<div id="number_format_chart"></div>
        </div>
    </div>
   

  </body>

</html>