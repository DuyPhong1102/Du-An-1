<?php
if (isset($_SESSION["user"])) {
    $info_user = $_SESSION["user"];
    $id = $info_user['id'];
    $fullname = $info_user['fullname'];
    $phone_number = $info_user['phone_number'];
    $email = $info_user['email'];
    $image = $info_user['image'];
}
$web_root = constant('_WEB_ROOT');
?>
<div class="wrapper-header">
    <div class="grid wide">
        <div class="header">
            <label for="nav-mobile-input" class="icon-bar-mobile c-2">
                <i class="fas fa-bars"></i>
            </label>

            <div class="">
                <div class="logo-header">
                    <a href="<?= _WEB_ROOT . '/home' ?> ">
                        <img src="<?= _WEB_ROOT . '/app/public/assets/clients/images/logo.png' ?>" alt="">
                    </a>
                </div>
            </div>

            <div class="">
                <div class="cart-group">
                    <div class="icon-search cart-group-item">
                        <div class="search-mini">
                            <div class="wrap-search ">
                                <input type="text" placeholder="Tìm kiếm..." id="input-search" class="button_gradient input-header">

                                <div id="ega-smartsearch-search-suggestion" class=" popup_search d-none">

                                    <div id="ega-smartsearch-search-header"><span class="ega-smartsearch-search-title">Kết quả tìm kiếm cho </span>
                                        <span style="color:red;padding-left:8px;" class="search-result"></span>
                                    </div>
                                    <div id="ega-smartsearch-search-top" style="display: block;">
                                        <div id="ega-smartsearch-product-results">
                                            <h3>Sản phẩm</h3>
                                            <ul class="all-product-search">



                                            </ul>
                                        </div>
                                        <div id="ega-smartsearch-article-results"></div>

                                    </div>

                                </div>
                            </div>

                            <button class="btn-search-mini">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class=" header-nav-box">
                <div class="header-nav">
                    <ul class="items-big">



                        <div class="cart-icon cart-group-item">
                            <a href="<?= _WEB_ROOT . '/category' ?>" class="tag-a">
                                <i class="fa-solid fa-store"></i>
                            </a>
                        </div>

                        <div class="user-icon cart-group-item">
                            <a href="<?= _WEB_ROOT . '/account/setting' ?>">
                                <?php
                                if (isset($info_user) && !empty($image)) {
                                    echo "
                                 <div class='user-avatar'>
                                 <img class='avatar__img' src='{$web_root}/app/public/assets/clients/images/{$image}'>                    
                                 </div>
                                 ";
                                } else {
                                    echo " <img class='avatar__img' src='{$web_root}/app/public/assets/clients/images/avatar_user.png'>                    ";
                                }
                                ?>
                            </a>

                            <div class="user-group">

                                <?php


                                if (isset($_SESSION["user"])) {
                                    echo "
                                    <a href='{$web_root}/account/setting' class='dang-ki user-group-item tag-a '>
                                    Tài khoản của tôi
                                    </a>
                                    <a href='{$web_root}/account/logout' class='dang-ki user-group-item tag-a '>
                                        Đăng xuất
                                        </a>
                                    ";
                                } else {
                                    echo  " 
                                    <a href='{$web_root}/account/login' class='dang-ki user-group-item tag-a '>
                                    Đăng nhập
                                      </a>
                                      <a href='{$web_root}/account/register' class='dang-ki user-group-item tag-a '>
                                        Đăng ký
                                        </a>
                                      ";
                                }
                                ?>



                            </div>
                        </div>
                        <div class="cart-wrapper cart-group-item">
                            <a href="<?= _WEB_ROOT . '/cart' ?>" class="tag-a">
                                <i class="fa-solid fa-basket-shopping"></i>

                                <span class="quanity-icon-cart button_gradient">
                                    <?php if (isset($_SESSION["cart"])) {
                                        $cart = $_SESSION["cart"];
                                        echo count($cart);
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </span>
                                <!-- <div class="CartNotification__Wrapper iiyvNb">
                                    <a class="btn-close"><i class="icomoon icomoon-close"></i></a>
                                <p class="status">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                        </svg>Thêm vào giỏ hàng thành công!</p>
                                        <a class="btn-view-cart" href="<?= _WEB_ROOT . '/cart' ?>">Xem giỏ hàng và thanh toán</a>
                                </div> -->
                            </a>


                        </div>

                    </ul>


                </div>
            </div>
        </div>
    </div>
    <div class="list-icon">


        <script defer src="https://dochat.vn/code.js?id=9221011134839101295"></script>
    </div>
    <a href="#" id="backtop" class="tag-a backtop" title="Lên đầu trang">
        <div class="border-backtop">
            <i class="fas fa-arrow-up"></i>
        </div>
    </a>
</div>