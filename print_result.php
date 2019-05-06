<?php 
    include('dbconfig.php'); 
    $level = 3;
    
    $query = "SELECT level_name FROM levels where level_id = '$level' AND level_active = '1'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $level_name = $row[0];

    $judge_with_scores = array();
    $candidate_ranking = array();  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PRINT</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="lib/css/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link href="lib/css/compiled.min.css" rel="stylesheet">
  <link rel="stylesheet" href="lib/css/bootstrap.min.css">
  <link rel="stylesheet" href="lib/css/datatables.min.css">
  <link rel="stylesheet" href="lib/css/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 landscape } table { float: left; }</style>
  <style>
    table td, table th {
        font-size: 90%;
        text-align: center;
    }
    .tableee {
        page-break-before: always;
        page-break-after: always;
        float: left;
        width: 100%;
        height: 100%;
    }
    .tableeee{
        border: 2px solid #000;
        margin: 1%;
    }
    .text-center{
        padding: 10px;
        text-transform: uppercase;
    }
    h3 {
        font-size: 100%;
        font-weight: bold;
    }
    @media print {
        h3 {
            font-size: 100%;
            font-weight: bold;
        }
        .tableee {
            page-break-before: always;
            page-break-after: always;
            float: left;
            /* width: 50%; */
            height: 100%;
            /* padding: 15px; */
            box-sizing: border-box;
            margin: 0 !important;
            margin-top: 1px !important;
        }
        .tableeee{
            border: 2px solid #000;
        }

        body{
            background: #0a1334;
        }

        table, table tr, table tr th, table tr td{
            text-align: center;
            font-family: Arial;
        }

        .text-center{
            margin-bottom: 0px;
            text-transform: uppercase;
        }
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape" onload="print(); location='home_admin.php';">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-0mm">

    <!-- Write HTML just like a web page -->
    <!-- <article>This is an A4 document (landscape).</article> -->
    <!-- <div style="width: 50%; height: 100%; float: left; background: #0a1334;"></div> -->
        <div style="width: 100%; height: 105%; float: left; background: #0a1334;">
            <img src="lib/img/print_cover_back.jpg" style="width: 50%; height: 100%; float: left;">
            <img src="lib/img/ms_marikina.jpg" style="width: 50%; height: 100%; float: left;">
        </div>

      </section>

    <section class="sheet padding-0mm">
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <br><br>
                
                <?php
                    $query = "
                                SELECT t1.contestant_id, contestants.contestant_name, (t1.ss + t2.swimsuit_grade)/2 as C
                                FROM 
                                (SELECT *, SUM(score) as ss  FROM score WHERE criteria_id = 3 GROUP BY contestant_id ) t1
                                JOIN
                                (SELECT * FROM swimsuit) t2
                                ON (t1.contestant_id = t2.contestant_id)
                                JOIN contestants ON t1.contestant_id = contestants.contestant_id
                                ORDER BY C DESC
                                LIMIT 1
                    ";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_row($result);
                        echo '<h3 class="text-center">Best in Swimsuit</h3><p class="text-center">Candidate #' . $row[0] . ' — ' . $row[1] . '</p>';                        
                    }
                ?>

                <?php
                    $query = "
                    SELECT contestants.contestant_id, contestants.contestant_name, SUM(score)
                    FROM score
                    JOIN contestants ON contestants.contestant_id = score.contestant_id
                    WHERE criteria_id = 4
                    GROUP BY contestant_id
                    ORDER BY SUM(score) DESC
                    
                    ";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_row($result);
                        echo '<h3 class="text-center">Best in Long Gown</h3><p class="text-center">Candidate #' . $row[0] . ' — ' . $row[1] . '</p>';                        
                    }
                ?>

                    <?php
                        $query = "select contestants.contestant_id, contestants.contestant_name from winners join contestants on contestants.contestant_id = winners.contestant_id where level_id = '1' order by winner_id";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) > 0)
                        {
                            echo '<h3 class="text-center">Top 15 Candidates</h3>
                            <ul class="text-center">';
                            while($row = mysqli_fetch_row($result))
                            {
                                echo '<li> Candidate #' . $row[0] . ' — ' . $row[1] . '</li>';
                            }
                        }
                    ?>
                </ul>
                
                


                
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <br><br>
              
                
                    <?php
                        $query = "select contestants.contestant_id, contestants.contestant_name from winners join contestants on contestants.contestant_id = winners.contestant_id where level_id = '2' order by winner_id";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) > 0)
                        {
                            echo '<h3 class="text-center">Top 5 Candidates</h3>
                            <ul class="text-center" style="list-style: none;">';
                            while($row = mysqli_fetch_row($result))
                            {
                                echo '<li> Candidate #' . $row[0] . ' — ' . $row[1] . '</li>';
                            }
                        }
                    ?>
                </ul>
        
                    <?php
                        $query = "select contestants.contestant_id, contestants.contestant_name from winners join contestants on contestants.contestant_id = winners.contestant_id where level_id = '3' order by winner_id";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) > 0)
                        {
                            echo '<h3 class="text-center" class="margin-top: 0;">Winners</h3>
                            <ul class="text-center" style="list-style: none; font-size: 90%;">';
                            $ctr = 0;
                            while($row = mysqli_fetch_row($result))
                            {
                                $ctr++;
                                
                                if($ctr == 1)
                                    $title = "MS. MARIKINA 2018";
                                else if($ctr == 2)
                                    $title = "MS. MARIKINA - EARTH 2018";
                                else if($ctr == 3)
                                    $title = "MS. MARIKINA - TOURISM 2018";
                                else if($ctr == 4)
                                    $title = "1ST RUNNER UP";
                                else
                                    $title = "2ND RUNNER UP";
                                    
                                echo '<li> <b>' . $title . '</b> — Candidate #' . $row[0] . ' — ' . $row[1] . '</li>';
                            }
                        }
                    ?>
                </ul>
                
                    <?php
                        $query = "select score.user_id from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level' group by score.user_id";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result))
                        {
                            while($row = mysqli_fetch_row($result))
                            {
                                $judge_id = $row[0] - 1;
                                array_push($judge_with_scores, $judge_id);
                                $judge[$judge_id] = new stdClass();
                                $judge[$judge_id]->id = $judge_id;
                                $judge[$judge_id]->level = $level;
                                $judge[$judge_id]->total_percentage = array();
                                $judge[$judge_id]->arrangement = array();
                                

                                // echo '  <div class="tab-pane fade" id="panel'.$judge_id.'" role="tabpanel">';
                                
                                // echo '  <table class="table table-striped table-hover table-sm">
                                    // <thead>
                                        // <tr class="text-center">
                                            // <th scope="col">Candidate No.</th>
                                            // <th scope="col">Candidate Full Name</th>';
                                            // <th scope="col">Beauty and Personality (50%)</th>
                                            $query_criteria_th = "select * from criteria where level_id = '$level'";
                                            $result_query_criteria_th = mysqli_query($conn, $query_criteria_th);
                                            if(mysqli_num_rows($result_query_criteria_th))
                                            {
                                                while($row_query_criteria_th = mysqli_fetch_row($result_query_criteria_th))
                                                {
                                                    // echo '<th scope="col">'.$row_query_criteria_th[1].'('.($row_query_criteria_th[2] * 100).'%)</th>';
                                                }
                                            }
                                            
                                // echo    '   <th scope="col">Total Percentage</th>
                                        // </tr>
                                    // </thead>
                                    // <tbody>';

                                $query1 = "select score.contestant_id, contestants.contestant_name, level_id from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where user_id = " . ($judge_id + 1) . " and level_id = '$level' group by score.contestant_id";
                                $result1 = mysqli_query($conn, $query1);
                                if(mysqli_num_rows($result1) > 0)
                                {
                                    while($row1 = mysqli_fetch_row($result1))
                                    {
                                        $candidate_id = $row1[0];
                                        $candidate_name = $row1[1];
                                        $total_percentage = 0;
                                        $temp_total = 0;
                                        
                                        // echo '<tr>';
                                            // echo '<td>'.$candidate_id.'</td>';
                                            // echo '<td>'.$candidate_name.'</td>';

                                        $query2 = "select score_id, score.contestant_id, contestants.contestant_name, score.criteria_id, criteria_percentage, score, score*criteria.criteria_percentage from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where user_id = " . ($judge_id + 1) . " and score.contestant_id = '$candidate_id' and criteria.level_id = '$level'";
                                        $result2 = mysqli_query($conn, $query2);

                                        if(mysqli_num_rows($result2) > 0)
                                        {   
                                            if($level == 1)
                                            {
                                                // echo '<td>' . $pre_pageant_score[$candidate_id-1] . '</td>';
                                                $total_percentage += ($pre_pageant_score[$candidate_id-1] * 0.5);
                                            }

                                            while($row2 = mysqli_fetch_row($result2))
                                            {
                                                $temp_total += $row2[6];
                                                // echo '<td>' . $row2[5] . '</td>';
                                            }                                                
                                        }
                                        
                                        

                                        if($level == 1)
                                            $total_percentage += ($temp_total * 0.5);
                                        else
                                            $total_percentage = $temp_total;

                                        
                                        array_push($judge[$judge_id]->total_percentage, $total_percentage);
                                        array_push($judge[$judge_id]->arrangement, $candidate_id);
                                            // echo '<td>' . $total_percentage . '</td>';
                                        // echo '</tr>';
                                    }
                                }
                                else
                                {
                                    // echo 'NO DATA';
                                }

                                // echo '</body></table>';

                                // print_r($judge[$judge_id]->total_percentage);

                                // echo '  </div>';
                            }
                                     
                            // echo '<div class="tab-pane fade in show active" style="margin-top: 30px; width: 100%;" id="overall" role="tabpanel">';
                                echo '<h3 class="text-center">'.$level_name.' SCORES</h3>';    
                                echo '  <table id="dtBasicExample" class="table table-striped table-bordered table-sm tableee" cellspacing="0" width="100%" style="text-align:center; table-layout: fixed;">                    
                                            <thead>
                                                <tr>
                                                
                                                    <th class="th-sm redd borderr">Rank No.</th>
                                                
                                                    <th class="th-sm bluee">Candidate No.</th>';
                                                    $query_1 = "select score.user_id from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level' group by score.user_id";
                                                    $result_1 = mysqli_query($conn, $query_1);

                                                    if(mysqli_num_rows($result_1) > 0)
                                                    {
                                                        while($row_1 = mysqli_fetch_row($result_1))
                                                        {
                                                            echo '<th class="th-sm">Judge '.($row_1[0] - 1).'</th>';
                                                        }
                                                        
                                                        echo '<th class="th-sm violett">Total Score</th>';                                                            
                                                    }
                                            echo '                
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            $query_2 = "select score.contestant_id, contestants.contestant_name, level_id from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level' group by score.contestant_id";
                                            $result_2 = mysqli_query($conn, $query_2);
                                            if(mysqli_num_rows($result_2))
                                            {
                                                
                                                while($row_2 = mysqli_fetch_row($result_2))
                                                {
                                                    $candidate_id1 = $row_2[0];

                                                    echo '<tr>';
                                                        echo '<td style="background: #FFCDD2;"></td>';
                                                        echo '<td style="background: #BBDEFB;">' . $candidate_id1 . '</td>';
                                                        
                                                        $totalscore_rank = 0;
                                                        // print_r($judge);
                                                        for($i=0; $i<count($judge_with_scores); $i++)
                                                        {
                                                            if($level == 1)
                                                                $key = $candidate_id1;
                                                            else
                                                                $key = array_search($candidate_id1, $judge[$judge_with_scores[$i]]->arrangement);

                                                            $totalscore_rank += $judge[$judge_with_scores[$i]]->total_percentage[$key];
                                                            // echo $judge[$judge_with_scores[$i]]->total_percentage[$candidate_id1-1];
                                                            echo '<td>' . number_format($judge[$judge_with_scores[$i]]->total_percentage[$key], 2) . '</td>'; 
                                                        }

                                                        $totalscore_rank /= count($judge_with_scores);

                                                        echo '<td style="font-weight: 600; background: #E1BEE7;">' . number_format($totalscore_rank, 2) . '</td>'; 
                                                        array_push($candidate_ranking, array($totalscore_rank, $candidate_id1));

                                                    echo '</tr>';
                                                }
                                                
                                            }
                                            
                                            echo '
                                            </tbody>
                                        </table>';
                                    
                        }
                    ?>


                
                
        </div>  
            </div>
        </div>
        
    </section>


    <script src="lib/js/jquery-3.2.1.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            var t = $('#dtBasicExample').DataTable(
                {
                    "searching": false,
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bInfo": false,
                    "order": [[ <?php echo count($judge_with_scores) + 2; ?>, "desc" ]],
                    "lengthMenu": [ 5, 10 ],
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ]
                }
            );
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        }); // END OF document script
    </script>

</body>

</html>