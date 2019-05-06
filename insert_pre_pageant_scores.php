<?php
    $query = "SELECT * FROM score WHERE criteria_id = '1'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0)
    {
        for($i=1; $i<8; $i++)
        {
            $query = "INSERT INTO score (user_id, criteria_id, contestant_id, score) VALUES ('" . ($i + 1) . "', '1', '1', '21')";
            $result = mysqli_query($conn, $query);
        }
    }
?>