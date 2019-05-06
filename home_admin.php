<?php include('dbconfig.php'); 

// NEED MAGKAROON NG VARIABLE NA MAUUNA MA READ KUNG ANONG LEVEL NYA

$query = "select level_id from levels where level_active = 1 order by level_id desc limit 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$level = $row[0];

$judge_with_scores = array();

// THESE ARE THE LIST OF CANDIDATES BASED ON IT'S RANKING
$candidate_ranking = array();

// FIXED PRE PAGEANT SCORES
$pre_pageant_score = array();

array_push($pre_pageant_score,	74.52	);
array_push($pre_pageant_score,	69.90	);
array_push($pre_pageant_score,	73.58	);
array_push($pre_pageant_score,	84.86	);
array_push($pre_pageant_score,	70.64	);
array_push($pre_pageant_score,	69.29	);
array_push($pre_pageant_score,	79.88	);
array_push($pre_pageant_score,	68.56	);
array_push($pre_pageant_score,	72.86	);
array_push($pre_pageant_score,	68.30	);
array_push($pre_pageant_score,	83.16	);
array_push($pre_pageant_score,	81.47	);
array_push($pre_pageant_score,	77.88	);
array_push($pre_pageant_score,	65.20	);
array_push($pre_pageant_score,	70.48	);
array_push($pre_pageant_score,	80.76	);
array_push($pre_pageant_score,	68.51	);
array_push($pre_pageant_score,	74.86	);
array_push($pre_pageant_score,	67.68	);
array_push($pre_pageant_score,	78.17	);
array_push($pre_pageant_score,	65.86	);
array_push($pre_pageant_score,	76.07	);
array_push($pre_pageant_score,	67.50	);
array_push($pre_pageant_score,	66.42	);
array_push($pre_pageant_score,	80.66	);
array_push($pre_pageant_score,	81.64	);
array_push($pre_pageant_score,	72.08	);
array_push($pre_pageant_score,	65.11	);
array_push($pre_pageant_score,	74.21	);
array_push($pre_pageant_score,	81.26	);
array_push($pre_pageant_score,	75.87	);
array_push($pre_pageant_score,	69.43	);
array_push($pre_pageant_score,	85.30	);
array_push($pre_pageant_score,	74.63	);
array_push($pre_pageant_score,	73.41	);

$query = "select * from score join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0)
    $no_result = "false";
else
    $no_result = "true";

// ALLOW ADMIN TO VIEW THE LATEST SCORES ON GIVEN LEVEL
if($level == 4)
{
    $no_result = "false";
    $level = $_SESSION['changeable_level'];
    $level = 3;
}
else
    $_SESSION['changeable_level'] = 3;

?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags always come first -->    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Beauty Pageant Tabulation System</title>
    <link rel="shortcut icon" href="lib/img/aclc_logo.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="lib/css/material.indigo-blue.min.css">
    <script defer src="lib/js/material.min.js"></script>
    <link rel="stylesheet" href="lib/semantic/semantic.min.css">
    <!-- Bootstrap core CSS -->
    <link href="lib/css/compiled.min.css" rel="stylesheet">
    <script src="lib/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="lib/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="lib/css/datatables.min.css">
    <script src="lib/js/jquery-3.2.1.js"></script>
    <style>
        table, table tr, table tr th, table tr td{
            text-align: center;
            font-family: Arial;
        }
        .custom-select{
            padding: 0 !important;
        }
        .invisible_part{
            visibility: hidden;
            opacity: 0;
        }
    </style>

<body class="fixed-sn light-blue-skin">
    <!--Double navigation-->
    <header id="main_header" class="invisible_part">

        <!-- HIDDEN TEXT BOX  -->
        <input type="text" value="<?php echo $no_result; ?>" id="no_result" hidden>

        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed mdb-sidenav" style="transform: translateX(-100%); background: none; background-color: #0a1334;">
            <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;">
                <!-- NAVIGATION -->
                <h2 style="margin: 15% 20px;"><?php echo 'ADMIN';?></h2>
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a href="home_admin.php" class="collapsible-header waves-effect arrow-r">Home</a></li>
                        <li><a href="logout.php" class="collapsible-header waves-effect arrow-r"><b>Logout</b></a></li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <!-- 37474F -->
        <nav class="navbar navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav" style="background: #0a1334;">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><img src="lib/img/burger.png" width="25px" style="padding: 0; margin: 0;"></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto" style="float: left; padding: 0; margin: 0;">
                <p>Beauty Pageant Tabulation System</p>
            </div>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
    <!--Main Layout-->
    <main style="margin-top: 0; padding-top: 0; top: 0;" class="invisible_part">
        <div class="container-fluid mt-5" style="margin-top: 20px !important; padding-top: 0 !important; top: 0; width: 100%; margin-left: 0;">
            <!-- START -->
            <div class="row">
                <!-- LEFT -->
                <div class="col-8 col-md-8 col-lg-8" style="background: #fff;">
                    <!-- <h1 class="jumbotron text-center" style="text-transform: uppercase; background: #0a1334; color: #f0f0b0;">Summary</h1> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs nav-justified" style="background: #0a1334">
                    <?php
                        $query = "select score.user_id from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level' group by score.user_id";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result))
                        {
                            while($row = mysqli_fetch_row($result))
                            {
                                echo '  <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#panel'.($row[0]-1).'" role="tab">Judge'.($row[0]-1).'</a>
                                        </li>';
                            }

                                echo '  <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#overall" role="tab">Ranking</a>
                                        </li>';
                        }
                    ?>
                    
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content card">
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

                                echo '  <div class="tab-pane fade" id="panel'.$judge_id.'" role="tabpanel">';
                                
                                echo '  <table class="table table-striped table-hover table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Candidate No.</th>
                                            <th scope="col">Candidate Full Name</th>';
                                            // <th scope="col">Beauty and Personality (50%)</th>
                                            if($level == 1 || $level == 3)
                                                $query_criteria_th = "select * from criteria where level_id = '$level' and active = '1'";
                                            else if($level == 2)
                                                $query_criteria_th = "select * from criteria where level_id = '$level'";
                                            $result_query_criteria_th = mysqli_query($conn, $query_criteria_th);
                                            if(mysqli_num_rows($result_query_criteria_th))
                                            {
                                                while($row_query_criteria_th = mysqli_fetch_row($result_query_criteria_th))
                                                {
                                                    echo '<th scope="col">'.$row_query_criteria_th[1].'('.($row_query_criteria_th[2] * 100).'%)</th>';
                                                }
                                            }
                                            
                                echo    '   <th scope="col">Total Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

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
                                        
                                        echo '<tr>';
                                            echo '<td>'.$candidate_id.'</td>';
                                            echo '<td>'.$candidate_name.'</td>';

                                        $query2 = "select score_id, score.contestant_id, contestants.contestant_name, score.criteria_id, criteria_percentage, score, score*criteria.criteria_percentage from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where user_id = " . ($judge_id + 1) . " and score.contestant_id = '$candidate_id' and criteria.level_id = '$level'";
                                        $result2 = mysqli_query($conn, $query2);

                                        if(mysqli_num_rows($result2) > 0)
                                        {   
                                            if($level == 1)
                                            {
                                                echo '<td>' . $pre_pageant_score[$candidate_id-1] . '</td>';
                                                $total_percentage += ($pre_pageant_score[$candidate_id-1] * 0.5);
                                            }

                                            while($row2 = mysqli_fetch_row($result2))
                                            {
                                                $temp_total += $row2[6];
                                                echo '<td>' . $row2[5] . '</td>';
                                            }                                                
                                        }
                                        
                                        

                                        if($level == 1)
                                            $total_percentage += ($temp_total * 0.5);
                                        else
                                            $total_percentage = $temp_total;

                                        
                                        array_push($judge[$judge_id]->total_percentage, $total_percentage);
                                        array_push($judge[$judge_id]->arrangement, $candidate_id);
                                            echo '<td>' . $total_percentage . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                else
                                {
                                    echo 'NO DATA';
                                }

                                echo '</body></table>';

                                // print_r($judge[$judge_id]->total_percentage);

                                echo '  </div>';
                            }

                            echo '<div class="tab-pane fade in show active" id="overall" role="tabpanel">';

                                echo '<div class="row jumbotron"><div class="col-4 col-md-4 col-lg-4"><input type="button" class="btn btn-warning" id="reset_data" value="Reset Data" style="width: 15vw;"></div><div class="col-4 col-md-4 col-lg-4"><input type="button" class="btn btn-success" id="print_result" onclick=location="'."print_result.php".'" value="View Results" style="width: 15vw;"></div><div class="col-4 col-md-4 col-lg-4"><input type="button" class="btn btn-primary" id="next_level" value="Next Level" style="width: 15vw;"></div></div>';
                                echo '  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">                    
                                            <thead>
                                                <tr>
                                                
                                                    <th class="th-sm" style="background: #B71C1C; color: #fff;">Rank No.</th>
                                                
                                                    <th class="th-sm" style="background: #0D47A1; color: #fff;">Candidate No.</th>';
                                                    $query_1 = "select score.user_id from score join contestants on contestants.contestant_id = score.contestant_id join criteria on criteria.criteria_id = score.criteria_id where level_id = '$level' group by score.user_id";
                                                    $result_1 = mysqli_query($conn, $query_1);

                                                    if(mysqli_num_rows($result_1) > 0)
                                                    {
                                                        while($row_1 = mysqli_fetch_row($result_1))
                                                            echo '<th class="th-sm">Judge '.($row_1[0] - 1).'</th>';
                                                        
                                                        echo '<th class="th-sm" style="font-weight: 600; background: #4A148C; color: #fff;">Total Score</th>';                                                            
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
                                                                    $key = $candidate_id1-1;
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
                                    

                            echo '</div>';
                        }
                    ?>

                       
                    </div>
                    <!-- END OF TABS -->

                </div>

                <!-- RIGHT -->
                <div class="col-md-4 col-lg-4 col-4" style="background: #fff; padding: 0px;">
                <!-- SESSIONING THE CANDIDATE RANKING -->
                    <?php 
                        rsort($candidate_ranking); 
                        $_SESSION['candidate_ranking'] = $candidate_ranking; 
                        // print_r($candidate_ranking);
                    ?>

                    <img src="lib/img/ms_marikina.jpg" style="width: 100%; height: 57vh; margin-bottom: 10px;">
                    <img src="lib/images/img3.jpg" alt="" width="60%;" style="height: 15vh; float: left;">
                    <img src="lib/images/img2.jpg" alt="" width="40%;" style="height: 15vh; float: left; border-left: 7px solid #fff;">
                    <img src="lib/images/img1.jpg" alt="" width="100%;" style="border-top: 7px solid #fff; height: 15vh; float: left;">
                </div>
            </div>
 
            <!-- END -->
        </div> 
    </main>
    <!--Main Layout-->
    
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="lib/js/jquery-3.2.1.js"></script>
    <script src="lib/semantic/semantic.min.js"></script>
    <script type="text/javascript" src="lib/js/compiled.min.js"></script>
    <script src="lib/sweetalert2/sweetalert2.all.js"></script>
    <script src="lib/js/jquery.bootstrap-growl.js"></script>
    <script src="lib/js/datatables.min.js"></script>
    <script>
        function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
            //compatibility for firefox and chrome
            var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
            var pc = new myPeerConnection({
                iceServers: []
            }),
            noop = function() {},
            localIPs = {},
            ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
            key;

            function iterateIP(ip) {
                if (!localIPs[ip]) onNewIP(ip);
                localIPs[ip] = true;
            }

            //create a bogus data channel
            pc.createDataChannel("");

            // create offer and set local description
            pc.createOffer().then(function(sdp) {
                sdp.sdp.split('\n').forEach(function(line) {
                    if (line.indexOf('candidate') < 0) return;
                    line.match(ipRegex).forEach(iterateIP);
                });
                
                pc.setLocalDescription(sdp, noop, noop);
            }).catch(function(reason) {
                // An error occurred, so handle the failure to connect
            });

            //listen for candidate events
            pc.onicecandidate = function(ice) {
                if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
                ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
            };
        }

        function display_ipaddress(ip){
            $.bootstrapGrowl("Your current IP address is " + ip + ".", {
            ele: 'body', // which element to append to
            type: 'info', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 310, // (integer, or 'auto')
            delay: 10000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            allow_dismiss: true, // If true then will display a cross to close the popup.
            stackup_spacing: 10 // spacing between consecutively stacked growls.
            });
        }

        function display_ipaddress1(){
            $.bootstrapGrowl("In order to have a LAN Connection, users must only have a one connection.", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 515, // (integer, or 'auto')
            delay: 11000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            allow_dismiss: true, // If true then will display a cross to close the popup.
            stackup_spacing: 10 // spacing between consecutively stacked growls.
            });
        }

        function display_ipaddress2(ip){
            $.bootstrapGrowl("To access the system, please go to <b><u>" + ip + "/beautypageant</b></u>", {
            ele: 'body', // which element to append to
            type: 'info', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 460, // (integer, or 'auto')
            delay: 12000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            allow_dismiss: true, // If true then will display a cross to close the popup.
            stackup_spacing: 10 // spacing between consecutively stacked growls.
            });
        }

        getUserIP(function(ip){
            // display_ipaddress(ip);
            display_ipaddress1();
            display_ipaddress2(ip);
        });
    </script>
    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();
    </script><div class="drag-target" style="left: 0px; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>

    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

    <script>
        $(document).ready(function () {
            var t = $('#dtBasicExample').DataTable(
                {
                    "searching": false,
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bInfo": false,
                    "order": [[ <?php echo count($judge_with_scores) + 2; ?>, "desc" ]],
                    "lengthMenu": [ 10 ],
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
            $('select').material_select();

            $('#next_round').click(function(){
                $.ajax({  
                    url:"login_validation.php",  
                    method:"POST",  
                    data: {
                    typee: 'next_round',
                    levell: <?php echo $level; ?>
                    },
                    success:function(data){
                        if(data === 'successlevel')
                        {
                            swal(
                                'Successfully Updated',
                                '',
                                'success'
                            ).then((result) => {
                                setTimeout(function() {
                                    location="home_admin.php";
                                }, 100);
                            })
                        }
                        else
                        {
                            swal(
                                'Oops',
                                "There's an error on updating the next level, please make sure the judges have voted.",
                                'error'
                            )
                        }
                    }  
                });    
            })

            $('#next_level').click(function(){
                $.ajax({  
                    url:"login_validation.php",  
                    method:"POST",  
                    data: {
                    typee: 'next_level',
                    levell: <?php echo $level; ?>
                    },
                    success:function(data){
                        if(data === 'successlevel')
                        {
                            swal(
                                'Successfully Updated',
                                '',
                                'success'
                            ).then((result) => {
                                setTimeout(function() {
                                    location="logout.php";
                                }, 100);
                            })
                        }
                        if(data === 'successnextlevel')
                        {
                            swal(
                                'Successfully Updated',
                                '',
                                'success'
                            ).then((result) => {
                                // setTimeout(function() {
                                    // location="logout.php";
                                    location = 'print_result.php';
                                // }, 100);
                            })
                        }
                        else if (data === 'errorupdating')
                        {
                            swal(
                                'Oops',
                                "There's an error on updating the next round.",
                                'error'
                            )
                        }
                    }  
                });    
            })

            $('#reset_data').click(function(){
                $.ajax({  
                    url:"login_validation.php",  
                    method:"POST",  
                    data: {
                    typee: 'reset_data'
                    },
                    success:function(data){
                        if(data === 'successlevel')
                        {
                            swal(
                                'Successfully Reset',
                                '',
                                'success'
                            ).then((result) => {
                                setTimeout(function() {
                                    location="home_admin.php";
                                }, 100);
                            })
                        }
                        else
                        {
                            swal(
                                'Oops',
                                "There's an error on clearing the datas.",
                                'error'
                            )
                        }
                    }  
                });    
            })
        }); // END OF document script
    </script>

    <script>
        if($('#no_result').val() == 'false')
        {
            $('.invisible_part').css('visibility', 'visible');
            $('.invisible_part').css('opacity', '1');
        }
        else
        {
            
            swal(
                'Oops',
                "There's no score to be fetch on the database.",
                'error'
            ).then((result) => {
                setTimeout(function() {
                    location="logout.php";
                }, 100);
            })
        }
    </script>
<div class="hiddendiv common"></div></body></html>