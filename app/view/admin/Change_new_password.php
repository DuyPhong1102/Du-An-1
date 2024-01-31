<!DOCTYPE html>
<html lang="en">

<head>
    <title>Khôi phục mật khẩu | Website quản trị v2.0</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/app/public/assets/admin/css/util.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/app/public/assets/admin/css/sub.css">
    <?php require_once  __DIR_ROOT.'/app/library/admin/admin.library.php'?>
</head>

<body>
  
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo _WEB_ROOT;?>/app/public/assets/admin/images/team.jpg" alt="IMG">
                </div>
                <form method="post"class="login100-form validate-form" >
                    <span class="login100-form-title">
                        <b>KHÔI PHỤC MẬT KHẨU</b>
                    </span>
                    <form  >
                   <input type="hidden"name="token" value="<?php echo $token;?>">

                        <div class="wrap-input100 validate-input" >
                            <input name="password"style="padding:0 20px 0 20px"class="input100" type="password" placeholder="Nhập mật khẩu mới" name="newPassword" id="emailInput" value="" />
                            
                        </div>
                        <div class="container-login100-form-btn">
                            <input type="submit" value="Đổi mật khẩu" />
                        </div>

                        <div class="text-center p-t-12">
                            <a class="txt2" href="<?= _WEB_ROOT."admin/account/login" ?>">
                                Trở về đăng nhập
                            </a>
                        </div>
                    </form>
                    <div class="text-center p-t-70 txt2">
                        Phần mềm quản lý bán hàng <i class="far fa-copyright" aria-hidden="true"></i>
                        <script type="text/javascript">
                      document.write(new Date().getFullYear());
                    </script> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>

</html>