<?php 
    include ('dbconfig.php'); 
    $user_id = $_SESSION['user_id'];
    $contestant_id = 0;
    $contestant_name = "";
    $contestant_location = "";
    $contestant_description = "";
    $contestant_picture = "";
    $criteria_name = "";
    $criteria_percentage = "";
    $completed = 1;
    
    $query = "select level_id from levels where level_active = 1 order by level_id desc limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $level = $row[0];    

    if($level == 1)
    {
        $query = "select * from criteria where level_id = '$level' and visibility = '1' and active = '1'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result))
        {
            $criteria_id = $row["criteria_id"];
            $criteria_name = $row["criteria_name"];
            $criteria_percentage = $row["criteria_percentage"];

            $query1 = "select * from contestants where contestant_id not in (select contestant_id from score where user_id = '$user_id' and criteria_id = '$criteria_id') limit 1";
            $result1 = mysqli_query($conn, $query1);
            
            if(mysqli_num_rows($result1))
            {
                $row1 = mysqli_fetch_array($result1);
                $contestant_id = $row1["contestant_id"];
                $contestant_name = $row1["contestant_name"];
                $contestant_location = $row1["contestant_location"];
                $contestant_description = $row1["contestant_details"];
                $contestant_picture = $row1["contestant_picture"];
                $_SESSION['criteria_id'] = $criteria_id;
                $_SESSION['contestant_id'] = $contestant_id;
                $completed = 0;
                $done = '';
                break;
            }
        }
    }
    // NEXT LEVEL
    else
    {
        $query = "select * from criteria where level_id = '$level' and visibility = '1' and active = '1'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result))
        {
            $criteria_id = $row["criteria_id"];
            $criteria_name = $row["criteria_name"];
            $criteria_percentage = $row["criteria_percentage"];

            $query1 = "SELECT contestants.contestant_id, contestants.contestant_name, contestants.contestant_location, contestants.contestant_details, contestants.contestant_picture FROM winners JOIN contestants ON contestants.contestant_id = winners.contestant_id WHERE winners.level_id = ".($level - 1)." AND contestants.contestant_id NOT IN (SELECT contestant_id FROM score WHERE user_id = '$user_id' AND criteria_id = '$criteria_id') LIMIT 1";
            $result1 = mysqli_query($conn, $query1);
            
            if(mysqli_num_rows($result1))
            {
                $row1 = mysqli_fetch_array($result1);
                $contestant_id = $row1["contestant_id"];
                $contestant_name = $row1["contestant_name"];
                $contestant_location = $row1["contestant_location"];
                $contestant_description = $row1["contestant_details"];
                $contestant_picture = $row1["contestant_picture"];
                $_SESSION['criteria_id'] = $criteria_id;
                $_SESSION['contestant_id'] = $contestant_id;
                $completed = 0;
                $done = '';
                break;
            }
        }
    }
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
    <script src="lib/js/jquery-3.2.1.js"></script>
    <style>
        .hidden_this{
            visibility: hidden;
        }
    </style>
    <script>
        function show_this(){
            $('.hidden_this').css('visibility', 'visible');
        }
        function finish_na(){
		    swal(
                'Congrats!',
                "You have successfully voted on this round. Please wait for further announcements.",
                'info'
            ).then((result) => {
                setTimeout(function() {
                    location="index.php";
                }, 100);
            })
        }
    </script>
</head>
<body class="fixed-sn light-blue-skin" onload="$('#score').focus();$('#score6').focus();">
    <div class="hidden_this" style="width:100%; height: 60px; background-color: #01579B;">
    <center>
        
        <img src="lib/images/marikina_logo.jpg" width="50px" style="margin: 5px; box-shadow: 0px 0px 10px #fff; border-radius: 100%;">
        <img src="lib/images/img3.jpg" width="130px" style="margin: 5px; height: 45px; box-shadow: 0px 0px 10px #fff;">
        <img src="lib/images/img2.png" width="60px" style="margin: 5px; height: 45px; box-shadow: 0px 0px 10px #fff;">
        <img src="lib/images/img1.jpg" width="130px" style="margin: 5px; height: 45px; box-shadow: 0px 0px 10px #fff;">
        
    </center>
    </div>
    <!--Double navigation-->
    <header class="hidden_this">
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed mdb-sidenav" style="transform: translateX(-100%); background: none; background-color: #01579B;">
            <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;">
                <!-- NAVIGATION -->
                <h2 style="margin: 15% 20px;"><?php echo 'Judge '.($user_id-1);?></h2>
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a href="home_judge.php" class="collapsible-header waves-effect arrow-r">Home</a></li>
                        <li><a href="logout.php" class="collapsible-header waves-effect arrow-r"><b>Logout</b></a></li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav" style="background: #0277BD;">
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
    <main class="hidden_this" style="margin-top: 0; padding-top: 0; top: 0;">
        <div class="container-fluid mt-4" style="margin-top: 0; padding-top: 0; top: 0; width: 100%; margin-left: 0;">
            <!-- START -->
                <input type="text" id="complete_checker" value="<?php echo $completed; ?>" hidden>
                
                <div class="row">
                    <div class="col-6 col-md-6 col-lg-6">
                        <!-- Card Wider -->
                        <div class="card card-cascade wider">
                            <!-- Card image -->
                            <div class="view view-cascade overlay">
                                <img class="card-img-top" src="lib/img/Headshot/<?php echo $contestant_picture; ?>" style="height: 70vh;" alt="Card image cap">
                                <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!-- Card content -->
                            <div class="card-body card-body-cascade text-center">
                                <!-- Title -->
                                <h2 class="card-title"><strong><?php echo $contestant_name; ?></strong></h2>
                            </div>
                        </div>
                        <!-- Card Wider -->
                    </div> <!-- END OF COL-6 -->
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="grey lighten-3 z-depth-2" style="width: 100%; height: 100%;">
                            <div class="jumbotron">
                                <?php
                                    echo '<h1 class="text-center" style="font-size: 3.5rem; letter-spacing: 5px; font-weight: 500;">Candidate #' . $contestant_id . '</h1>';
                                    if($level == 1 || $level == 3)
                                    {
                                        echo '<h1 class="text-center" style="font-size: 2.7rem; border-top: 2px solid #222; padding: 30px 15px;">' . $criteria_name . '<span style="font-size: 1.8rem; margin-left: 5px;">(' . ($criteria_percentage * 100) . '%)</span></h1>';
                                    }
                                ?>
                            </div>
                            <form action="insert_score.php" method="POST">
                                <?php
                                    $query = 'select * from criteria where level_id = 2';
                                    $result = mysqli_query($conn, $query);

                                    $output1 = '<input type="number" name="score" id="score" max="100" min="0" class="text-center" style="font-size: 9rem; padding: 25px; box-sizing: border-box; height: 25vh;">
                                    <center>
                                        <input type="submit" name="submit_button" class="btn btn-danger" style="margin-top: 50px; padding: 15px 35px; font-size: 130%;" value="Submit">
                                    </center>';

                                    $output3 = '<input type="number" name="score" id="score" max="100" min="0" class="text-center" style="font-size: 9rem; padding: 25px; box-sizing: border-box; height: 25vh;">
                                    <center>
                                        <input type="submit" name="submit_button" class="btn btn-danger" style="margin-top: 50px; padding: 15px 35px; font-size: 130%;" value="Submit">
                                    </center>';
                                    
                                    $output2 = '<div class="row">';

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $output2 .= '<div class="col-lg-7 col-md-7 col-7" style="padding-top: 15px;">';
                                            $output2 .= '<h3 class="text-center">' . $row['criteria_name'] . '</h3>';
                                            $output2 .= '</div>';
                                            $output2 .= '<div class="col-lg-5 col-md-5 col-5">';
                                            $output2 .= '<input type="number" name="score' . $row['criteria_id'] . '" id="score' . $row['criteria_id'] . '" max="100" min="0" class="text-center" style="font-size: 3rem; padding: 10px; box-sizing: border-box; height: 10vh;" required>';
                                            $output2 .= '</div>';
                                        }
                                        $output2 .= '<div class="col-lg-12 col-md-12 col-12"><center>
                                                    <input type="submit" name="submit_buttonn" class="btn btn-danger" style="width: 100%; margin-top: 30px; padding: 15px 35px; font-size: 130%;" value="Submit"></div>
                                                </center>';
                                    }
                                    
                                    $output2 .= '</div>';
                                    
                                    //     <div class="col-lg-6 col-md-6 col-6" style="padding-top: 15px;">
                                    //         <h1 class="text-center">Beauty</h1>
                                    //     </div>
                                    //     <div class="col-lg-6 col-md-6 col-6">
                                    //         <input type="number" name="score" id="score" max="100" min="0" class="text-center" style="font-size: 3rem; padding: 10px; box-sizing: border-box; height: 10vh;">
                                    //     </div>
                                                                    
                                    // </div>
                                    
                                    

                                    if($level == 1)
                                        echo $output1;
                                    else if($level == 2)
                                        echo $output2;    
                                    else 
                                        echo $output3;                            
                                ?>
                            </form>
                        </div>
                    </div> <!-- END OF COL-6 -->
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
    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();
    </script><div class="drag-target" style="left: 0px; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
<div class="hiddendiv common"></div></body></html>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<script>
    var completed = $('#complete_checker').val();
    if (completed == 1)
        finish_na();
    else
        show_this();
</script>

<script>
    $('#score').keyup(function(){
        var score = $('#score').val();
        if(score == '')
            $('#score').val('');
    });
</script>