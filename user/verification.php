<?php
    session_start();
    if(isset($_REQUEST['Verify']))
    {
        $otp=$_REQUEST['opt1'].$_REQUEST['opt2'].$_REQUEST['opt3'].$_REQUEST['opt4'];
        if($otp==$_SESSION['otp'])
        {
            header("location:login.php");
        }
        else
        {
            $msg="Enter Valid OTP or OTP Expired";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background:#eee;
            }

            .bgWhite{
            background:white;
            box-shadow:0px 3px 6px 0px #cacaca;
            }

            .title{
            font-weight:600;
            margin-top:20px;
            font-size:24px
            }

            .customBtn{
            border-radius:0px;
            padding:10px;
            }

            form input{
            display:inline-block;
            width:50px;
            height:50px;
            text-align:center;
            }
    </style>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let digitValidate = function(ele){
        console.log(ele.value);
        ele.value = ele.value.replace(/[^0-9]/g,'');
        }

        let tabChange = function(val){
            let ele = document.querySelectorAll('input');
            if(ele[val-1].value != ''){
            ele[val].focus()
            }else if(ele[val-1].value == ''){
            ele[val-2].focus()
            }   
        }


    </script>
</head>
<body>
<div class="container">
  <div class="row justify-content-md-center">
      <div class="col-md-4 text-center">
        <div class="row">
            
          <div class="col-sm-12 mt-5 bgWhite">
            <hr>
          <?php
            if(isset($msg))
            {
                ?>
                <div class="alert alert-danger"><?php echo $msg; ?></div>
                <?php
            }
            ?>
            <div class="title">
                
              Verify OTP
            </div>
            
            <form action="" id="validate" class="mt-5" method="post">
              <input class="otp" type="text"  id="opt1" name="opt1" required oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 >
              <input class="otp" type="text" id="opt1" name="opt2" required oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 >
              <input class="otp" type="text" id="opt1"  name="opt3" required oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 >
              <input class="otp" type="text" id="opt1"  name="opt4" required oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 >
              <input type="submit" class='btn btn-primary btn-block mt-4 mb-4 customBtn' value="Verify" name="Verify">
            </form>
            <hr class="mt-4">
            <a href="login.php" class="btn btn-danger">Home</a>
          </div>
        </div>
      </div>
  </div>
</div>

</body>
</html>