<?php 
 
function product_price($priceFloat) {

    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price;
}
$id_user=isset($_SESSION["user"]) ? $_SESSION["user"]["id"] : "" ;
$prices_value_final=0;

if (isset($cart)) { 
foreach ($cart as $item) {
    $prices_value_final+=($item["price"]*$item["quantity"]);
}

}
?>
<link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/cart.css">

<div class="cart">
    <div class="grid wide">
        <div class="cart-title">


        </div>
        <form id="form_add_product" method="post">
            <div class="cart-main">

                <?php if (isset($cart) && count($cart) > 0) { ?>

                    <?php foreach ($cart as $item) : ?>
                        
                            <div class="cart-item product-item-<?= $item['id'] ?>">
                            <div class="cart-item-left">
                                <div class="cart-img">
                                    <img src="<?= _WEB_ROOT . '/app/public/assets/admin/images/' . $item['image'] ?>" alt="">
                                </div>
                                <div class="cart-name-price">
                                    <div class="cart-name">
                                        <span><?= $item['name'] ?></span>
                                    </div>
                                    <div class="cart-price" style="margin-top:10px;">
                                        <h3><?= product_price($item['price']) ?></h3>
                                        <b>đ</b>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-item-right">
                                <div class="quantity-product">
                                    <div class="box-quantity-product">
                                        <input data-view-id="<?= $item['id'] ?>" type="button" value="-" class="minus tru">
                                        <input readonly type="number" name="quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="value-quantity" value="<?= $item['quantity'] ?>" onchange="if(this.value == 0)this.value=1;"">
                                <input data-view-id="<?= $item['id'] ?>" type="button" value="+" class="increase cong">
                                    </div>
                                </div>
                                <div class="total-item">
                                    <div class="total-title" style="text-align:end;">
                                        <span>Tổng tiền:</span>
                                    </div>
                                    <div class="total-item-main">
                                        <h3 style="text-align:end;" class="product__final-prices">
                                        <?= product_price($item['price'] * $item['quantity']); ?>
                                    </h3>
                                        <b>đ</b>
                                    </div>
                                    <div data-id="<?= $item['id']?> "class="cart-item-delete" >                               
                                        <img src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/trash.svg" alt="deleted">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="cart-footer-box">
                    <div class="cart-footer">
                        <div class="total-main">
                            <span>Thành tiền: </span>
                            <h1 style="font-weight: 600;color:red;"class="prices__value--final"><?= product_price($prices_value_final); ?></h1>
                            <b style="color:red;">đ</b>
                        </div>
                        <div class="cart-footer-main">
                            <div class="continue-buy">
                                <a href="<?= _WEB_ROOT . '/category' ?>" class="tag-a">
                                    Tiếp tục mua hàng
                                </a>
                            </div>
                            <div class="dat-hang button_gradient">
                               <?php if(isset($_SESSION["user"])) {?>
                                <a href="checkouts" class="tag-a">
                                    Đặt hàng ngay
                                </a>
                                    <?php } else{?>
                                        <a href="<?= _WEB_ROOT . '/account/login' ?>" class="tag-a">
                                    Đặt hàng ngay
                                </a>
                                    <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
        
                    <div class="cart-empty-main" style="display: block;">
                        <div class="grid wide">
                            <div class="box-img-cart-empty">
                                <img src="<?php echo _WEB_ROOT;?>/app/public/assets/clients/images/cart-empty.png" alt="">
                            </div>
                            <div class="cart-empty-main-title">
                                <span>GIỎ HÀNG TRỐNG</span>
                            </div>
                            <a href="<?= _WEB_ROOT . '/category' ?>" class="tag-a">
                                <div class="continue_view" style="width:200px;margin-top:40px; margin-left:15px;">
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                    <span>QUAY LẠI CỬA HÀNG</span>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                <?php } ?>

                
              
            </div>
        </form>
    </div>
</div>

<script defer type="module" src="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/js/Cart.js"></script>