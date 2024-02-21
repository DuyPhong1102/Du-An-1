<div class="wrapper"style="background-color: #efefef;">
<div style="padding:30px 0; display:block;" class="grid wide">
        <div class="row">
            <div class="col l-12">
                <div class="breadcrumb">
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/home' ?>" target="_self"><span>Trang chủ</span></a>
                    <p>/</p>
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/account/setting' ?>">Tài khoản</a>
                    <p>/</p>
                  
                    <a><span>Quên mật khẩu</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid wide">
    <div class="login-main">
    <div class="login-container">
        <div class="login-title">
            <h3>Quên mật khẩu</h3>
            <div style="color: red;text-align:center;"></div>
        </div>
        <?php if (isset($errors) && !empty($errors)) : ?>
            <?php foreach ($errors as $item) : ?>
       
                <small style="color:red;display:block;margin:10px 0;font-size:16px;text-align: center;"><?php echo $item ?></small>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if(isset($success)){?>
                        <?php foreach ($success  as $item): ?>
                            <small style="color:#21c421;display:block;margin:10px 0;font-size:16px;text-align:center;"><?php echo $item;?></small>
                       <?php endforeach;?>
                        <?php }?>
        <div class="container-form">
            <form method="post" class="form-account">
                <div class="form-group">
                    <label  for="">Vui lòng nhập email của bạn </label>
                    <input value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" require name="email" type="email" placeholder="Email">
                </div>
            
             
                <div class="group-btn">
                    <button type="submit" class="btn-account">Tìm kiếm</button>
                    <a href="login" class="tag-a">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>