<?php
    include ('dbconfig.php');

    if($_POST['typee'] == 'judge')
    {
        $userid = $_POST['passwordd'];

        $query = mysqli_query($conn, "SELECT * FROM users WHERE user_password = '$userid' AND user_type_id = '2'");
        
        if(mysqli_num_rows($query)>0)
        {
        $result = mysqli_fetch_row($query);
        $_SESSION['signed_in'] = true;
        $_SESSION['user_name'] = $result[1];
        $_SESSION['user_password'] = $result[2];
        $_SESSION['user_type_id'] = $result[3];
        $_SESSION['user_id'] = $result[0];
        
        echo 'judge';
        }
        else
            echo "error";
    }
    else if($_POST['typee'] == 'admin')
    {
        $userid = $_POST['passwordd'];

        $query = mysqli_query($conn, "SELECT * FROM users WHERE user_password = '$userid' AND user_type_id = '1'");
        
        if(mysqli_num_rows($query)>0)
        {
        $result = mysqli_fetch_row($query);
        $_SESSION['signed_in'] = true;
        $_SESSION['user_name'] = $result[1];
        $_SESSION['user_password'] = $result[2];
        $_SESSION['user_type_id'] = $result[3];
        $_SESSION['user_id'] = $result[0];
        
        echo 'admin';
        }
        else
            echo "error";
    }
    else if($_POST['typee'] == 'next_round')
    {
        $level = $_POST['levell'];
        $query = "select * from score join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level'";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)>0)
        {
            $candidate_ranking = $_SESSION['candidate_ranking'];
            $query1 = "SELECT level_limit FROM levels WHERE level_id = '$level' AND level_active = '1'";
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_row($result1);
            // $rank_no = 1;

            // randomize
            $randomize = array();
            for($i=0; $i<$row1[0]; $i++)
                array_push($randomize, $i);
            shuffle($randomize);

            for($i=0; $i<count($randomize); $i++)
            {
                
                $query1 = "INSERT INTO winners (level_id, rank_no, contestant_id) VALUES ('$level', " . ($randomize[$i] + 1) . ", " . $candidate_ranking[($randomize[$i])][1] . ")";
                $result1 = mysqli_query($conn, $query1); 
                // $rank_no++;   
            }    

            $newlevel = $level + 1;
            $query1 = "UPDATE levels SET level_active = 1 WHERE level_id = '$newlevel'";
            $result1 = mysqli_query($conn, $query1);
            if($result1)
                echo "successlevel";
            else 
                echo "errorupdating";
        }
    }
    else if($_POST['typee'] == 'next_level')
    {
        $output = '';
        $level = $_POST['levell'];
        $query = "select criteria_id from criteria where level_id = '$level' and visibility = '1' and active = '0' order by level_id, criteria_id limit 1";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_row($result);
            $criteria_id = $row[0];

            if($criteria_id == 7)
            {
                $query1 = "UPDATE criteria SET active = 1 WHERE level_id = '$level'";
                $result1 = mysqli_query($conn, $query1);

                $candidate_ranking = $_SESSION['candidate_ranking'];

                $newlevel = $level + 1;
                $query1 = "UPDATE levels SET level_active = 1 WHERE level_id = '$newlevel'";
                $result1 = mysqli_query($conn, $query1);

                $query1 = "SELECT level_limit FROM levels WHERE level_id = '$level' AND level_active = '1'";
                $result1 = mysqli_query($conn, $query1);
                $row1 = mysqli_fetch_row($result1);
                
                // randomize
                $randomize = array();
                for($i=0; $i<$row1[0]; $i++)
                    array_push($randomize, $i);
                shuffle($randomize);
    
                // print_r($randomize);
                for($i=0; $i<count($randomize); $i++)
                {
                    $query1 = "INSERT INTO winners (level_id, rank_no, contestant_id) VALUES ('$level', '" . ($randomize[$i] + 1) . "', '" . $candidate_ranking[$randomize[$i]][1] . "')";
                    $result1 = mysqli_query($conn, $query1); 
                    // $rank_no++;   
                }    
    
                if($result1)
                    $output = "successnextlevel";
                else 
                    $output = "errorupdating";

                $query1 = "select criteria_id from criteria where level_id = '$newlevel' and visibility = '1' and active = '0' order by level_id, criteria_id limit 1";
                $result1 = mysqli_query($conn, $query1);
                $criteria_id = mysqli_fetch_row($result1);
                $criteria_id = $criteria_id[0];
                $query2 = "UPDATE criteria SET active = 1 WHERE criteria_id = '$criteria_id'";
                $result2 = mysqli_query($conn, $query2);

            }

            $query1 = "UPDATE criteria SET active = 1 WHERE criteria_id = '$criteria_id'";
            $result1 = mysqli_query($conn, $query1);
            if($result1)
                $output = "successlevel";
            else 
                $output = "errorupdating";

            echo $output;
        }
        else
        {
            $query = "select * from score join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level'";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result)>0)
            {
                $output = 'successlevel';
                $candidate_ranking = $_SESSION['candidate_ranking'];

                if($level == 3)
                {
                    $query1 = "SELECT level_limit FROM levels WHERE level_id = '$level' AND level_active = '1'";
                    $result1 = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_row($result1);
                    
                    for($i=0; $i<$row1[0]; $i++)
                    {
                        $query1 = "INSERT INTO winners (level_id, rank_no, contestant_id) VALUES ('$level', " . ($i + 1) . ", '" . $candidate_ranking[$i][1] . "')";
                        $result1 = mysqli_query($conn, $query1); 
                    }    

                    $newlevel = $level + 1;
                    $query1 = "UPDATE levels SET level_active = 1 WHERE level_id = '$newlevel'";
                    $result1 = mysqli_query($conn, $query1);
                    if($result1)
                        $output = "successnextlevel";
                    else 
                        $output = "errorupdating";
                }
                else
                {
                    $query1 = "SELECT level_limit FROM levels WHERE level_id = '$level' AND level_active = '1'";
                    $result1 = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_row($result1);
                    // $rank_no = 1;
        
                    // randomize
                    $randomize = array();
                    for($i=0; $i<$row1[0]; $i++)
                        array_push($randomize, $i);
                    shuffle($randomize);
        
                    // print_r($randomize);
                    for($i=0; $i<count($randomize); $i++)
                    {
                        $query1 = "INSERT INTO winners (level_id, rank_no, contestant_id) VALUES ('$level', '" . ($randomize[$i] + 1) . "', '" . $candidate_ranking[$randomize[$i]][1] . "')";
                        $result1 = mysqli_query($conn, $query1); 
                        // $rank_no++;   
                    }    
        
                    $newlevel = $level + 1;
                    $query1 = "UPDATE levels SET level_active = 1 WHERE level_id = '$newlevel'";
                    $result1 = mysqli_query($conn, $query1);
                    if($result1)
                        $output = "successnextlevel";
                    else 
                        $output = "errorupdating";
    
                    $query1 = "select criteria_id from criteria where level_id = '$newlevel' and visibility = '1' and active = '0' order by level_id, criteria_id limit 1";
                    $result1 = mysqli_query($conn, $query1);
                    $criteria_id = mysqli_fetch_row($result1);
                    $criteria_id = $criteria_id[0];
                    $query2 = "UPDATE criteria SET active = 1 WHERE criteria_id = '$criteria_id'";
                    $result2 = mysqli_query($conn, $query2);
                }
                
                echo $output;
            }
        }
    }
    else if($_POST['typee'] == 'reset_data')
    {
        $output = 'successlevel';
        $query = "TRUNCATE TABLE score";
        $result = mysqli_query($conn, $query);
        if($result){}
        else
            $output = 'error';
        $query = "TRUNCATE TABLE winners";
        $result = mysqli_query($conn, $query);
        if($result){}
        else
            $output = 'error';
        $query = "UPDATE levels SET level_active = 0 WHERE level_id > 0";
        $result = mysqli_query($conn, $query);
        if($result){}
        else
            $output = 'error';
        $query = "UPDATE levels SET level_active = 1 WHERE level_id = 1";
        $result = mysqli_query($conn, $query);  
        if($result){}
        else
            $output = 'error';
        $query = "UPDATE criteria SET active = 0 WHERE criteria_id > 0";
        $result = mysqli_query($conn, $query);
        if($result){}
        else
            $output = 'error';
        $query = "UPDATE criteria SET active = 1 WHERE criteria_id = 1";
        $result = mysqli_query($conn, $query);
        if($result){}
        else
            $output = 'error';
        $query = "UPDATE criteria SET active = 1 WHERE criteria_id = 2";
        $result = mysqli_query($conn, $query);
        if($result){}
        else
            $output = 'error';
        echo $output;
    }
    else 
        echo "error";
?>