<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BEAUTY PAGEANT TABULAR SYSTEM</title>
    <link rel="shortcut icon" href="lib/img/aclc_logo.png" />
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="lib/css/compiled.min.css">
    <link rel="stylesheet" href="lib/sweetalert2/sweetalert2.min.css">
    <style>
body{
    margin: 0;
    padding: 0;
}
body {
  height: 100%;
  overflow: hidden;
  width: 100% !important;
  box-sizing: border-box;
  font-family: 'Roboto', sans-serif;
}



.backRight {
  position: absolute;
  right: 0;
  width: 50%;
  height: 100%;
  background: #3498db url("lib/img/ms_marikina.jpg");
  background-size: 100% 110%;
  background-position: 50% 50%;
}

.backLeft {
  position: absolute;
  left: 0;
  width: 50%;
  height: 100%;
  background: #e74c3c url("lib/img/ms_marikina.jpg");
  background-size: 100% 110%;
  background-position: 50% 50%;
}

#back {
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: -999;
}

#slideBox {
  width: 50%;
  max-height: 100%;
  height: 100%;
  overflow: hidden;
  margin-left: 50%;
  position: absolute;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
.topLayer {
  width: 200%;
  height: 100%;
  position: relative;
  left: 0;
  left: -100%;
}

.left {
  width: 50%;
  height: 100%;
  background: #2C3034;
  left: 0;
  position: absolute;
}

.right {
  width: 50%;
  height: 100%;
  background: #f3f4cb;
  right: 0;
  position: absolute;
}

.content {
  width: 75%;
  margin: 0 auto;
  top: 20%;
  position: absolute;
  left: 30%;
  margin-left: -125px;
}

.content h2 {
  color: #03A9F4;
  font-weight: 300;
  font-size: 35px;
}

.buttonn {
  background: #03A9F4;
  padding: 10px 16px;
  width: auto;
  font-weight: 600;
  text-transform:  uppercase;
  font-size: 14px;
  color: #fff;
  line-height: 16px;
  letter-spacing: 0.5px;
  border-radius: 2px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
  border: 0;
  outline: 0;
  margin: 15px 15px 15px 0;
  transition: all 0.25s;
}
.buttonn:hover {
  background: #0288D1;
  box-shadow: 0 4px 7px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
}
.off {
  background: none;
  color: #03A9F4;
  box-shadow: none;
}

.right .off:hover {
  background: #eee;
  color: #03A9F4;
  box-shadow: none;
}
.left .off:hover {
  box-shadow: none;
  color: #03A9F4;
  background: #363A3D;
}
input {
  background: transparent;
  border: 0;
  outline: 0;
  border-bottom: 1px solid #45494C;
  font-size: 14px;
  color: #959595;
  padding: 8px 0;
  margin-top: 20px;
}
.judgeID, .adminID {
    text-align: center;
}
.judgeID::placeholder, .adminID::placeholder{
    text-align: center;
}
    </style>
    <script>
      function error(){
        swal(
          'Invalid',
          'Sorry, username or user id not found!',
          'error'
        )
      }
    </script>
    <script>
      function numbersonly(){
        $.bootstrapGrowl("Only numbers are accepted in this field..", {
        ele: 'body', // which element to append to
        type: 'danger', // (null, 'info', 'danger', 'success')
        offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
        align: 'right', // ('left', 'right', or 'center')
        width: 350, // (integer, or 'auto')
        delay: 3000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
        allow_dismiss: true, // If true then will display a cross to close the popup.
        stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
      }

      function alphanumericsonly(){
        $.bootstrapGrowl("Only alphanumerics are accepted in this field..", {
        ele: 'body', // which element to append to
        type: 'info', // (null, 'info', 'danger', 'success')
        offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
        align: 'right', // ('left', 'right', or 'center')
        width: 320, // (integer, or 'auto')
        delay: 3500, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
        allow_dismiss: true, // If true then will display a cross to close the popup.
        stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
      }
    </script>
</head>
<body>



<div id="back">
  <div class="backRight"></div>
  <div class="backLeft"></div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2 class="text-center" style="margin: 0px; font-size: 400%; font-weight: 100; text-align: left;">Admin</h2>
          <div class="form-group">
            <input type="password" class="adminID" name="username_admin" id="admin" maxlength="8" placeholder="Username"/>
          </div>
          <div class="form-group"></div>
          <div class="form-group"></div>
          <div class="form-group"></div>

        <center>
            <button id="goLeft" class="buttonn off">Judge?</button>
            <input type="submit" class="buttonn" name="login_admin" id="login_admin" value="Login">
        </center>
        <br><br>
        <img src="lib/images/img3.jpg" alt="" width="60%;" style="height: 20vh; float: left;">
        <img src="lib/images/img2.jpg" alt="" width="40%;" style="height: 20vh; float: left; border-left: 7px solid rgb(44, 48, 52)">
        <img src="lib/images/img1.jpg" alt="" width="100%;" style="border-top: 7px solid rgb(44, 48, 52); height: 20vh; float: left;">
        
        
      </div>
    </div>
    <div class="right">
      <div class="content">
        <h2 class="text-center" style="margin: 0px; font-size: 400%; font-weight: 100; text-align: left;">Judge</h2>
          <div class="form-group">
            <input type="text" class="judgeID" name="userid_judge" id="judge" maxlength="8" placeholder="Enter your user ID" autofocus/>
          </div>
          <center>        
            <button id="goRight" class="buttonn off">Admin?</button>
            <input type="submit" class="buttonn" name="login_judge" id="login_judge" value="Login">
          </center>
          <br><br>
          <img src="lib/images/img3.jpg" alt="" width="60%;" style="height: 20vh; float: left;">
          <img src="lib/images/img2.jpg" alt="" width="40%;" style="height: 20vh; float: left; border-left: 7px solid rgb(243, 244, 203)">
          <img src="lib/images/img1.jpg" alt="" width="100%;" style="border-top: 7px solid rgb(243, 244, 203); height: 20vh; float: left;">
      </div>
      
    </div>
  </div>
<script src="lib/js/jquery.min.js"></script>
<script src="lib/sweetalert2/sweetalert2.min.js"></script>
<script src="lib/js/jquery.bootstrap-growl.js"></script>
<script>
  $(document).ready(function () {
    //called when key is pressed in textbox
    $("#judge").keypress(function (e) {
      //if the letter is not digit then display error and don't type anything
      if (e.which != 8 && e.which != 0 && e.which != 13 && (e.which < 48 || e.which > 57)) {
          // numbersonly();
          // $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
      }

      if(e.which == 13)
        $('#login_judge').click();
    });

    $('#login_judge').click(function(){
      $.ajax({  
        url:"login_validation.php",  
        method:"POST",  
        data: {
          typee: 'judge',
          passwordd: $('#judge').val()
        },
        success:function(data){
          if(data === 'judge')
          {
            swal(
              'Hi Judge!',
              'Welcome to Ms. Marikina 2018',
              'success'
            ).then((result) => {
              location = 'home_judge.php';
            })
            setTimeout(function(){ location = 'home_judge.php'; }, 3000);
          }
          else if(data === 'admin')
          {
            swal(
              'Hi Admin!',
              'Welcome to Ms. Marikina 2018',
              'success'
            ).then((result) => {
              location = 'home_admin.php';
            })
            setTimeout(function(){ location = 'home_admin.php'; }, 3000);
          }
          else
          {
            error();
            $('#admin').val('');
            $('#judge').val('');
          }
        }  
      });
    });

    //called when key is pressed in textbox
    $("#admin").keypress(function (e) {
      //if the letter is not digit then display error and don't type anything
      if (e.which != 8 && e.which != 0 && e.which != 13 && !(e.which >= 48 && e.which <= 57) && !(e.which >= 65 && e.which <= 90) && !(e.which >= 97 && e.which <= 122)) {
          //display error message
          // alert('heh');
          // alphanumericsonly();
          // // $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
      }
      if(e.which == 13)
        $('#login_admin').click();
    });

    $('#login_admin').click(function(){
      $.ajax({  
        url:"login_validation.php",  
        method:"POST",  
        data: {
          typee: 'admin',
          passwordd: $('#admin').val()
        },
        success:function(data){
          if(data === 'judge')
          {
            swal(
              'Hi Judge!',
              'Welcome to Ms. Marikina 2018',
              'success'
            ).then((result) => {
              location = 'home_judge.php';
            })
            setTimeout(function(){ location = 'home_judge.php'; }, 3000);
          }
          else if(data === 'admin')
          {
            swal(
              'Hi Admin!',
              'Welcome to Ms. Marikina 2018',
              'success'
            ).then((result) => {
              location = 'home_admin.php';
            })
            setTimeout(function(){ location = 'home_admin.php'; }, 3000);
          }
          else
          {
            error();
            $('#admin').val('');
            $('#judge').val('');
          }
        }  
      });
    });
  });
</script>

<script>
$(document).ready(function(){
  $('#goRight').on('click', function(){
    $('#slideBox').animate({
      'marginLeft' : '0'
    });
    $('.topLayer').animate({
      'marginLeft' : '100%'
    });
    $('.adminID').focus();
  });
  $('#goLeft').on('click', function(){
    $('#slideBox').animate({
      'marginLeft' : '50%'
    });
    $('.topLayer').animate({
      'marginLeft': '0'
    });
    $('.judgeID').focus();
  });
});
</script>
</body>
</html>