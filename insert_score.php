<?php
    include ('dbconfig.php');
    
    if(isset($_POST['submit_buttonn']))
    {
        $score6 = $_POST['score6'];
        $score7 = $_POST['score7'];
        $score8 = $_POST['score8'];
        $score9 = $_POST['score9'];
        if($score6 != '' && $score7 != '' && $score8 != '' && $score9 != '')
        {
            $user_id = $_SESSION['user_id'];
            $criteria_id = $_SESSION['criteria_id'];
            $contestant_id = $_SESSION['contestant_id'];
            $query = "INSERT INTO score(user_id, criteria_id, contestant_id, score) VALUES ('$user_id', '6', '$contestant_id', '$score6')";
            $result = mysqli_query($conn, $query);
            $query = "INSERT INTO score(user_id, criteria_id, contestant_id, score) VALUES ('$user_id', '7', '$contestant_id', '$score7')";
            $result = mysqli_query($conn, $query);
            $query = "INSERT INTO score(user_id, criteria_id, contestant_id, score) VALUES ('$user_id', '8', '$contestant_id', '$score8')";
            $result = mysqli_query($conn, $query);
            $query = "INSERT INTO score(user_id, criteria_id, contestant_id, score) VALUES ('$user_id', '9', '$contestant_id', '$score9')";
            $result = mysqli_query($conn, $query);
        }
    }
    else if(isset($_POST['score']) || isset($_POST['submit_button']))
    {
        $score = $_POST['score'];
        if($score != '')
        {
            $user_id = $_SESSION['user_id'];
            $criteria_id = $_SESSION['criteria_id'];
            $contestant_id = $_SESSION['contestant_id'];
            $query = "INSERT INTO score(user_id, criteria_id, contestant_id, score) VALUES ('$user_id', '$criteria_id', '$contestant_id', '$score')";
            $result = mysqli_query($conn, $query);
        }
    }
    header('location: home_judge.php');
?>