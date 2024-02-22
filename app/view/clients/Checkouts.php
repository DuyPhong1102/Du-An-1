    <?php
    function product_price($priceFloat) {

        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
        return $price;
    }
    if (isset($_SESSION["user"])) {
        
        $id = $_SESSION["user"]["id"];
        $fullname = $_SESSION["user"]["fullname"];
        $email = $_SESSION["user"]["email"];
        $phone_number = $_SESSION["user"]["phone_number"];
    } else {
        $fullname = "";
        $email = "";
        $phone_number = "";
    }

    if(isset($_SESSION["cart"])){
        $cart=$_SESSION["cart"];
    }
$prices_value_final=0;
    
    foreach ($cart as $item) {
        $prices_value_final+=($item["price"]*$item["quantity"]);
    }
  
    ?>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/checkouts.css">

    <div class="checkouts">
        <div class="grid wide">
            <div class="row">
            <div class="col l-7 c-12">
                    <div class="infor-order">
                        <form action="checkouts/success" method="post">
                            <div class="title-infor">
                                <h2>Thông tin giao hàng</h2>
                            </div>
                            <div class="">
                                <div class="input-item">
                                    <input type="hidden"name="customer_id" value="<?=   $id ?>">
                                    <input type="hidden"name="total_price" value="<?= $prices_value_final ?>">
                                    <input type="text" name="name" placeholder="Họ và tên người nhận hàng" value="<?= $fullname ?>" required>
                                </div>
                                <div class="input-item">
                                    <input type="email" name="email" placeholder="Email" class="input-email" value="<?= $email ?>" required>
                                    <input type="phone" name="phone" placeholder="Số điện thoại" value=" <?= $phone_number ?>" required>
                                </div>
                                <div class="input-group mb-3">

                                <div class="input-item">
                                    <div class="tinh-thanh-pho select-wrapper  flex">
                                        <label for="">Tỉnh/thành phố:</label>
                                       <div style="display:flex;flex-direction: column;">
                                       <select  name='provinces' id="matp" class="select-provinces"  required>
                                            <option selected> Chọn Tỉnh/Thành phố </option>
                                            <?php foreach ($dataProvinces as $item) {
                                                echo "<option value='$item[code]'>$item[name]</option>";
                                            } ?>
                                        </select>
                                        
                                       </div>
                                    </div>
                                </div>
                                <div class="input-item">
                                    <div class="quan-huyen-main flex">
                                        <label for="">Quận/huyện:</label>
                                        <select class="select-districts" name="districts" id="maqh" required>
                                            <option value="#" selected>Chọn Quận/Huyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-item">
                                    <div class="xa-phuong flex">
                                        <label for="phuongxa">Thị trấn/xã/phường:</label>
                                        <select class="select-wards" name="wards" id="phuongxa" required>
                                            <option value="#" selected>Chọn Xã/Phường</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-item">
                                <div class="quan-huyen-main flex">
                                        <label for="street">Địa chỉ</label>
                                        <input style="width:505px"type="text" name="street" placeholder="Nhập địa chỉ" class="input-email" required>
                                    </div>
                                 
                               
                                </div>
                                <div class="phuong-thuc-pay" style="margin-top:20px;">
                                    <div class="phuong-thuc-pay-items-box">
                                        <div style="gap:10px;" class="phuong-thuc-pay-items flex">
                                            <input required="" checked type="radio" name="radio" value="Thanh toán khi nhận hàng">
                                            <span>Thanh toán khi nhận hàng</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="infor-order-end">
                                <div class="go-to-cart">
                                    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
                                    <a href="../cart" class="tag-a">Giỏ hàng</a>
                                </div>
                                <div class="continue-pay">
                                    <button name="submit" type="submit">Đặt Hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                     </div>
                <div class="col l-5 c-12 " style="background-color: #fafafa;border-radius: 15px;height:535px;">
                    <div class="checkout_product">
                        <div class="title-infor" style="padding: 5px 0;">
                            <h2>Thông tin đơn hàng</h2>
                        </div>
                        <div class="infor-product-order">
                            <div class="product-order">
                                  <?php foreach ($cart as $item): ?>   
                                <div class="product-item flex">
                                    <div class="product-left flex">
                                        <div class="product-img">
                                            <img src="<?= _WEB_ROOT.'/app/public/assets/admin/images/'.$item['image'] ?>" alt="error">
                                        </div>
                                        <div class="product-name">
                                            <span style="
                                                overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 1;
                                            line-clamp: 2;
                                            -webkit-box-orient: vertical;
                                            "><?= $item["name"]?></span>
                                            <div style="display:flex;align-items: center;">
                                                <b>x</b>
                                                <div class="quantity-product"><?= $item["quantity"] ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        <p><?= product_price( $item["price"] * $item["quantity"]) ?> </p><sup>đ</sup>
                                    </div>
                                </div>
                                 <?php endforeach;?>              
                            </div>
                        </div>
                        
                     
                        <div class="tong-cong flex">
                            <span>Tổng tiền:</span>
                            <h3 style="color:red;"><?= product_price($prices_value_final)?> <sup>đ</sup></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script defer type="module" src="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/js/Checkouts.js"></script>