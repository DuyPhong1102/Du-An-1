<div class="wrapper"style="background-color: #efefef;">
<div style="padding:30px 0; display:block;" class="grid wide">
        <div class="row">
            <div class="col l-12">
                <div class="breadcrumb">
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/home' ?>"><span>Trang chủ</span></a>
                    <p>/</p>
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/account/setting' ?>">Tài khoản</a>
                    <p>/</p>
                    
                    <a><span>Đăng ký</span></a>
                </div>
            </div>
        </div>
    </div>
<div class="grid wide">
<div class="login-main">
    <div class="login-container">
     
     
       <div class="login-title">
            <h3>Đăng ký</h3>
            <div style="color: red;text-align:center;"></div>
        </div>
           
        <?php if(isset($success)){ ?>
            <p style="color: #84bf29;text-align: center;"><?= $success ?></p>
       <?php  }?>
        <?php if(isset($errors)){ ?>
            <?php foreach ($errors as $item): ?>
             <ul>
             <li style="color: red;text-align: center;margin:20px 0;"><?= $item ?></li>
             </ul>
           <?php endforeach;?>
       <?php  }?>
        <div class="container-form">
            <form action="" method="post" class="form-account">
                <div class="form-group">
                    <label for="">Họ và tên:</label>
                    <input required name="fullname" type="text" placeholder="Họ và tên...">
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" name="email"  type="email" placeholder="Email...">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input required pattern="\d+" name="phone_number"  type="text" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu:</label>
                    <input required type="password" id="pwd" name="password" placeholder="Mật khẩu..." minlength="6">
                </div>
            
                <div class="group-btn">
                    
                    <button name="submit" type="submit" class="btn-account">Đăng ký</button>
                    <a href="login" class="tag-a">Đăng nhập</a>
                </div>
            </form>
        </div>
      
       
    </div>
</div>
</div>
</div>