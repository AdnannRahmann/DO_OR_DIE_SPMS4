<?php

    include 'connect.php';

    session_start();

    $id = $_SESSION['ID'] ;

    $studentID = $_POST['stdID'];
    $grade = $_POST['grade'];
    $year  = $_POST['year'];
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $new_registrationID = NULL;
    $new_scpID= NULL;
    $valid = 1;

    $section_check = $con->query("SELECT * FROM section_t WHERE facultyID = '$id' AND courseID = '$course' 
                            AND sectionNUM = '$section' AND year = '$year' AND semester = '$semester'")->fetch_assoc();
                                   
   
    if($section_check != NULL){

        $secID = $section_check['sectionID'];

        $reg_check = $con->query("SELECT * FROM registration_t WHERE sectionID = '$secID' AND studentID = '$studentID'")->fetch_assoc();

        if($reg_check ==  NULL){
            $reg_insert = "INSERT INTO registration_t (registrationID, sectionID, studentID)
                    VALUES (NULL, '$secID', '$studentID')";
                    if($con->query($reg_insert) == TRUE){
                        $reg_check = $con->query("SELECT * FROM registration_t WHERE sectionID = '$secID' AND studentID = '$studentID'")->fetch_assoc();
                        $new_registrationID = $reg_check['registrationID'];
                    }
        }
        else{
            $new_registrationID = $reg_check['registrationID'];
        }
    }
    else{
        $section_insert = "INSERT INTO section_t (sectionID, sectionNum, semester, courseID, facultyID, year)
          VALUES (NULL, '$section', '$semester', '$course', '$id', '$year')";


          if($con->query($section_insert) == TRUE){
            $section_check2 =$con->query("SELECT sectionID FROM section_t WHERE facultyID = '$id' AND courseID = '$course' 
            AND sectionNUM = '$section' AND year = '$year' AND semester = '$semester'")->fetch_assoc();
                if($section_check2 != NULL){ 
                    $secID = $section_check2['sectionID'];           
                    $reg_insert = "INSERT INTO registration_t (registrationID, sectionID, studentID)
                    VALUES (NULL, '$secID', '$studentID')";
                    if($con->query($reg_insert) == TRUE){
                        $reg_check = $con->query("SELECT * FROM registration_t WHERE sectionID = '$secID' AND studentID = '$studentID'")->fetch_assoc();
                        $new_registrationID = $reg_check['registrationID'];
                    }
                }
          }
          else{print 'not saved';}
    }


    if($grade == 'A'){ $tmo = 100; $gp=4;}
    elseif($grade == 'A-'){ $tmo = 89; $gp=3.7;}
    elseif($grade == 'B+') {$tmo = 84; $gp=3.3;}
    elseif($grade == 'B') {$tmo = 79; $gp=3;}
    elseif($grade == 'B-'){$tmo = 74;$gp=2.7;}
    elseif($grade == 'C+'){$tmo = 69;$gp=2.3;}
    elseif($grade == 'C'){$tmo = 64;$gp=2;}
    elseif($grade == 'C-'){$tmo = 59;$gp=1.7;}
    elseif($grade == 'D+'){$tmo = 54;$gp=1.3;}
    elseif($grade == 'D'){$tmo = 49;$gp=1;}
    elseif($grade == 'F'){$tmo = 0;$gp=0;}
    else {$valid = 0;}
    

    $scp_insert = "INSERT INTO student_course_performance_t (scpID, registrationID, totalMarksObtained, gradePoint)
    VALUES (NULL, '$new_registrationID', '$tmo', '$gp')";

if($con->query($scp_insert) == TRUE){
    $scp =$con->query("SELECT * FROM student_course_performance_t WHERE registrationID = '$new_registrationID' AND totalMarksObtained= '$tmo' 
    AND gradePoint = '$gp'")->fetch_assoc();

    $new_scpID = $scp ['scpID'];
}


     $log_insert = "INSERT INTO student_perf_log_t (logID, time, grade, scpID, f_employeeID, registrationID)
         VALUES (NULL, NULL, '$grade', '$new_scpID', '$id', '$new_registrationID')";



    if($con->query($log_insert) == TRUE && $valid==1){

        header("Location: courseOutcomeForm.php?response=200");
        $newtmo=$scp ['tmo'];
        print $newtmo+'% acheived for all CO';
 }
 else{      
         header("Location: courseOutcomeForm.php?response=501");
     }


?>