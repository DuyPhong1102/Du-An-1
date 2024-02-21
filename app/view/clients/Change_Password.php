<div class="wrapper"style="background-color: #efefef;">
<div style="padding:30px 0; display:block;" class="grid wide">
        <div class="row">
            <div class="col l-12">
                <div class="breadcrumb">
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/home' ?>"><span>Trang chủ</span></a>
                    <p>/</p>
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/account/setting' ?>">Tài khoản</a>
                    <p>/</p>
                    
                    <a><span>Đổi mật khẩu</span></a>
                </div>
            </div>
        </div>
    </div>
<div class="grid wide">
<div class="login-main">
    <div class="login-container">
     
     
       <div class="login-title">
            <h2 style="text-align: center;padding-top:25px;">Đổi mật khẩu</h2>
            <div style="color: red;text-align:center;"></div>
        </div>
           
        <?php if(isset($success)){ ?>
            <p style="color: #84bf29;text-align: center;margin:20px 0;"><?= $success ?></p>
       <?php  }?>
        <?php if(isset($errors)){ ?>
            <?php foreach ($errors as $item): ?>
             <ul>
             <li style="color: red;text-align: center;margin:20px 0;"><?= $item ?></li>
             </ul>
           <?php endforeach;?>
       <?php  }?>
        <div class="container-form">
            <form style="width: 400px;" action="" method="post" class="form-account">
            <div class="form-group">
                    <label for=""> Mật khẩu hiện tại</label>
                    <input style="width: 400px;"required minlength="6" name="oldPassword"  type="password" placeholder="Nhập mật khẩu hiện tại">

                </div>
                <div class="form-group">
                    <label for=""> Mật khẩu mới</label>
                    <input style="width: 400px;"required minlength="6" name="password"  type="password" placeholder="Nhập mật khẩu mới">

                </div>
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu mới</label>
                    <input style="width: 400px;"required minlength="6" name="confirmPassword"  type="password" placeholder="Nhập lại mật khẩu mới">
                </div>
               
                <div class="group-btn">
                    
                    <button style="width: 400px;"name="submit" type="submit" class="btn-account">Lưu thay đổi</button>

                </div>
            </form>
        </div>
      
       
    </div>
</div>
</div>
</div>