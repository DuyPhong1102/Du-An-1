<?php
$web_root = constant('_WEB_ROOT');
$id = $info_user['id'];
$fullname = $info_user['fullname'];
$phone_number = $info_user['phone_number'];
$email = $info_user['email'];
$image = $info_user['image'];
$gender = $info_user['gender'];
?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="wrapper" style="background-color: #efefef;">
    <div style="padding:30px 0; display:block;" class="grid wide">
        <div class="row">
            <div class="col l-12">
                <div class="breadcrumb">
                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/home' ?>" target="_self"><span>Trang chủ</span></a>
                    <p>/</p>

                    <a class="breadcrumb-item" href="<?= _WEB_ROOT . '/account/setting' ?>">Tài khoản</a>
                    <p>/</p>

                    <a><span>Cài đặt</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid wide">
        <div class="row account-setting">
            <div class="col l-12 info-left">
                <div class="">
                    <span class="info-title">Thông tin cá nhân</span>
                    <div class="styles__StyledAccountInfo-sc-s5c7xj-2 khBVOu">
                        <form id="updateUser" method="post" class="xbLgBv">

                            <div class="cfTCNE">
                                <input type="hidden" name="id_user" value="<?= $id ?>">


                                <div class="es8DWX">
                                    <div class="_5eQ8vX">
                                        <div class="_3cfiVM"><label>Họ & Tên</label></div>
                                        <div class="v1Bl9+">
                                            <div class="input-with-validator-wrapper">
                                                <div class="input-with-validator">
                                                    <input type="search" placeholder="Thay đổi họ tên" name="fullname" maxlength="255" value="<?= $fullname ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="es8DWX">
                                    <div class="_5eQ8vX">
                                        <div class="_3cfiVM"><label>Email</label></div>
                                        <div class="v1Bl9+">
                                            <div class="_2MJTPE">
                                                <div class="J7g-AJ email"><?= $email ?></div><button data-bs-toggle="modal" data-bs-target="#edit_email" style="cursor: pointer;" type="button" class="OcJZJm">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                               
                                <div class="es8DWX">
                                    <div class="_5eQ8vX">
                                        <div class="_3cfiVM"><label>Số điện thoại</label></div>
                                        <div class="v1Bl9+">
                                            <div class="_2MJTPE">
                                                <div class="J7g-AJ phone_number"><?= $phone_number ?></div>
                                                <button data-bs-toggle="modal" data-bs-target="#edit-phone-number" style="cursor: pointer;" type="button" class="OcJZJm">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="es8DWX">
                                    <div class="_5eQ8vX">
                                        <div class="_3cfiVM"><label>Giới tính</label></div>
                                        <div class="v1Bl9+">
                                            <div class="fkl4oC">
                                                <div class="stardust-radio-group" role="radiogroup">
                                                    <div class="stardust-radio stardust-radio--checked" tabindex="0" role="radio" aria-checked="true">

                                                        <div class="stardust-radio__content">
                                                            <input type="radio" value="0" <?php if ($gender == "0") echo "checked" ?> name="gender">
                                                            <div class="stardust-radio__label">Nam</div>
                                                        </div>
                                                    </div>
                                                    <div class="stardust-radio" tabindex="0" role="radio" aria-checked="false">

                                                        <div class="stardust-radio__content">
                                                            <input type="radio" value="1" <?php if ($gender == "1") echo "checked" ?> name="gender">
                                                            <div class="stardust-radio__label">Nữ</div>
                                                        </div>
                                                    </div>

                                                    <div class="stardust-radio" tabindex="0" role="radio" aria-checked="false">

                                                        <div class="stardust-radio__content">
                                                            <input type="radio" value="2" <?php if ($gender == "2") echo "checked" ?> name="gender">
                                                            <div class="stardust-radio__label">Khác</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="es8DWX">
                                    <div class="_5eQ8vX">
                                        <div class="_3cfiVM"><label>Thay đổi mật khẩu</label></div>
                                        <div class="v1Bl9+">
                                            <div class="_2MJTPE">
                                                <a href="<?= _WEB_ROOT."/account/change_password" ?>"class="OcJZJm">Thay đổi</a>
                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="HqWwZ8">
                                    <button type="submit" name="update_info_user" class="styles__StyledBtnSubmit-sc-s5c7xj-3 cqEaiM btn-submit">Lưu thay đổi</button>
                                </div>

                            </div>


                            <div class="x40Sa7">
                                <div class="_8LEXgI">
                                    <div class="snzcsS">
                                        <?php if (empty($image)) {
                                            echo "<div class='Nv+s+w preview' style='background-image: url(&quot;https://media.istockphoto.com/vectors/user-icon-flat-isolated-on-white-background-user-symbol-vector-vector-id1300845620?k=20&m=1300845620&s=612x612&w=0&h=f4XTZDAv7NPuZbG0habSpU0sNgECM0X7nbKzTUta3n8= &quot);'></div>";
                                        } else {
                                            echo " <div class='Nv+s+w preview' style='background-image: url(&quot;{$web_root}/app/public/assets/clients/images/{$image} &quot);'></div>";
                                        }

                                        ?>

                                    </div>

                                    <input type="file" name="file-user" id="file-upload" accept=".jpg,.jpeg,.png">
                                    <label style="margin-top:20px" class="file-upload Choicefile" for="file-upload">Chọn ảnh</label>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <form id="editEmail">
                            <div class="modal-body">
                                <div>
                                    <div class="form-group  col-md-12">
                                        <span class="thong-tin-thanh-toan">
                                            <h5>Địa chỉ email </h5>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Nhập địa chỉ email mới</label>
                                        <input type="hidden"name="id_user"value="<?= $id ?>">
                                        <input class="form-control" name="input_email" type="search" value="<?= $email ?>">
                                        <small  class="error"></small>
                                        <span></span>
                                    </div>

                                </div>
                                <BR>
                                <button class="btn-custome btn-save " type="submit">Lưu lại</button>
                                <button class="btn-custome btn-cancel" type="button" data-bs-dismiss="modal">Hủy bỏ</button>
                                <BR>
                            </div>
                        </form>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit-phone-number" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <form id="editPhoneNumber">
                            <div class="modal-body">
                                <div>
                                    <div class="form-group  col-md-12">
                                        <span class="thong-tin-thanh-toan">
                                            <h5>Số điện thoại </h5>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Nhập số điện thoại mới</label>
                                        <input class="form-control" name="phone_number" type="search" value="<?= $phone_number ?>">
                                        <small ></small>
                                        <span></span>
                                    </div>

                                </div>
                                <BR>
                                <button class="btn-custome btn-save  "name="submit" type="submit">Lưu lại</button>
                                <button class="btn-custome btn-cancel " type="button" data-bs-dismiss="modal">Hủy bỏ</button>
                                <BR>
                            </div>
                        </form>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script defer type="module" src="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/js/Setting.js"></script>