<div class="wrapper"style="background-color: #efefef;">
<div style="padding:30px 0; display:block;" class="grid wide">
        <div class="row">
            <div class="col l-12">
                <div class="breadcrumb">
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/home' ?>" target="_self"><span>Trang chủ</span></a>
                    <p>/</p>
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/account/setting' ?>">Tài khoản</a>
                    <p>/</p>
                  
                    <a><span>Đăng nhập</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid wide">
    <div class="login-main">
    <div class="login-container">
        <div class="login-title">
            <h3>Đăng nhập</h3>
            <div style="color: red;text-align:center;"></div>
        </div>
        <?php if (isset($errors) && !empty($errors)) : ?>
            <?php foreach ($errors as $item) : ?>
       
                <small style="color:red;display:block;margin:10px 0;font-size:16px;text-align: center;"><?php echo $item ?></small>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="container-form">
            <form method="post" class="form-account">
                <div class="form-group">
                    <label  for="">Email:</label>
                    <input value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" require name="email" type="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label  for="">Mật khẩu:</label>
                    <input require type="password" name="password" placeholder="Mật khẩu">
                </div>
                <div style="margin:20px 0;display:flex;align-items: center;gap:10px;">
                    <input for="remember"style="width:15px;" type="checkbox" name="remember">
                        <label for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                <small class="d-block my-2">Quên mật khẩu? Nhấn vào
                    <a href="forget_password" style="font-size:14px;" class="btn-link-style text-primary"> đây </a></small>
                <div class="group-btn">
                    <button type="submit" class="btn-account">Đăng nhập</button>
                    <a href="register" class="tag-a">Đăng ký</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>