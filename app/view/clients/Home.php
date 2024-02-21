<?php
function product_price($priceFloat)
{

    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price;
}
?>

<div class="home">

    <div class="slider">

        <div class="owl-carousel owl-one owl-theme slider-wrapper">
            <div class="item-1">
                <img style="width:100%" src="<?= 'http://localhost//DUAN1_WE17301' . '/app/public/assets/clients/images/slider_1.jpg' ?>" alt="">
                <h3 class="text-slider1">Oars Organic</h3>
            </div>

        </div>
    </div>
    <div class="collection">
        <div class="row">
            <div class="col l-3 c-12 collect-item nth-1">
                <div class="content">
                    <h3 class="banner-title">Rau quả tươi</h3>
                    <span>
                        Chúng tôi cam kết 100% các sản phẩm có nguồn gốc xuất xứ rõ ràng, sạch, an toàn và đảm bảo chất lượng ngon nhất giao đến tận tay người tiêu dùng, để san sẻ sự vất vả của các mẹ, các chị
                    </span>
                    <button class="btn-collection">Xem ngay</button>
                </div>
            </div>
            <div class="col l-3 c-12 collect-item nth-2">
                <div class="content">
                    <h3 class="banner-title">Sinh tố hoa quả</h3>
                    <span>
                        Chúng tôi cam kết 100% các sản phẩm có nguồn gốc xuất xứ rõ ràng, sạch, an toàn và đảm bảo chất lượng ngon nhất giao đến tận tay người tiêu dùng, để san sẻ sự vất vả của các mẹ, các chị
                    </span>
                    <button class="btn-collection">Xem ngay</button>
                </div>
            </div>
            <div class="col l-3 c-12 collect-item nth-3">
                <div class="content">
                    <h3 class="banner-title">Thực phẩm tươi</h3>
                    <span>
                        Chúng tôi cam kết 100% các sản phẩm có nguồn gốc xuất xứ rõ ràng, sạch, an toàn và đảm bảo chất lượng ngon nhất giao đến tận tay người tiêu dùng, để san sẻ sự vất vả của các mẹ, các chị
                    </span>
                    <button class="btn-collection">Xem ngay</button>
                </div>
            </div>
            <div class="col l-3 c-12 collect-item nth-4">
                <div class="content">
                    <h3 class="banner-title">Hoa quả tươi mát</h3>
                    <span>
                        Chúng tôi cam kết 100% các sản phẩm có nguồn gốc xuất xứ rõ ràng, sạch, an toàn và đảm bảo chất lượng ngon nhất giao đến tận tay người tiêu dùng, để san sẻ sự vất vả của các mẹ, các chị
                    </span>
                    <button class="btn-collection">Xem ngay</button>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us">
        <div class="grid wide">
            <div class="about-title ">
                <div class="about-heading">
                    <span class="text_gradient">VỀ CHÚNG TÔI</span>
                </div>
                <p>Hiện tại vùng nguyên liệu của chúng tôi có thể cung cấp các thực tập tươi sạch với số lượng lớn vì đang vào vụ mùa thu hoạch nên chúng tôi có thể cung ứng cho tất cả các đối tác xuất khẩu nông sản trên cả nước.</p>
            </div>


            <div class="owl-carousel owl-three owl-theme about-main row">
                <div class="col l-3 about-main-item">
                    <div class="about-item-img">
                        <img src="<?= 'http://localhost//DUAN1_WE17301' . '/app/public/assets/clients/images/icon_uti_1.png' ?>" alt="">
                    </div>
                    <div class="about-item-title">
                        <span>Trang trại hữu cơ</span>
                    </div>
                    <div class="about-item-sum">
                        <span>Cung cấp 100% thực phẩm sạch đảm bảo an toàn và ngon nhất</span>
                    </div>
                </div>
                <div class="col l-3 about-main-item">
                    <div class="about-item-img">
                        <img src="<?= 'http://localhost//DUAN1_WE17301' . '/app/public/assets/clients/images/icon_uti_2.png' ?>" alt="">
                    </div>
                    <div class="about-item-title">
                        <span>Thực phẩm sạch</span>
                    </div>
                    <div class="about-item-sum">
                        <span>Cung cấp 100% thực phẩm sạch đảm bảo an toàn và ngon nhất</span>
                    </div>
                </div>
                <div class="col l-3 about-main-item">
                    <div class="about-item-img">
                        <img src="<?= 'http://localhost//DUAN1_WE17301' . '/app/public/assets/clients/images/icon_uti_3.png' ?>" alt="">
                    </div>
                    <div class="about-item-title">
                        <span>An toàn sinh học</span>
                    </div>
                    <div class="about-item-sum">
                        <span>Cung cấp 100% thực phẩm sạch đảm bảo an toàn và ngon nhất</span>
                    </div>
                </div>
                <div class="col l-3 about-main-item">
                    <div class="about-item-img">
                        <img src="<?= 'http://localhost//DUAN1_WE17301' . '/app/public/assets/clients/images/icon_uti_4.png' ?>" alt="">
                    </div>
                    <div class="about-item-title">
                        <span>Đa dạng sinh học</span>
                    </div>
                    <div class="about-item-sum">
                        <span>Cung cấp 100% thực phẩm sạch đảm bảo an toàn và ngon nhất</span>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="category_home">
        <div class="grid wide">
            <div class="about-title ">
                <div class="about-heading">
                    <span class="text_gradient">DANH MỤC SẢN PHẨM</span>
                </div>
            </div>
            <div class="tab-link-box">
                <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
                <div class="tab-link ">
                    <ul class="ul-link-check element-categories">
                        <?php

                        $html = "<li class='tag-li tab-link-item tab-link-active'data-id-cate={$dataCate[0]['cat_id']}>{$dataCate[0]['cat_name']}</li>";
                        unset($dataCate[0]);
                        foreach ($dataCate as $key => $item) {
                            $html .= "<li class='tag-li tab-link-item 'data-id-cate='$item[cat_id]'>{$item['cat_name']}</li>";
                        }

                        echo $html;
                        ?>

                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="row content-tab">

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="top-thuong-hieu">
        <div class="grid wide">
            <div class="about-title ">
                <div class="about-heading">
                    <span class="text_gradient">TOP 10 SẢN PHẨM ĐƯỢC XEM NHIỀU NHẤT</span>
                </div>
            </div>
            <div class="owl-carousel owl-two owl-theme slider-wrapper">
                <div class="row">
                    <?php foreach ($dataTopView as $item) : ?>
                        <div class="col l-3 c-6 ">
                            <a href="<?= _WEB_ROOT . "/products/detail/" . $item["id"] ?>" class="content-tab-item">
                                <div class="product-thumnail">
                                    <img height="260 " src="<?= _WEB_ROOT . '/app/public/assets/admin/images/' . $item['image'] ?>" alt="">

                                </div>
                                <div class="product-info">
                                    <div class="product-name">
                                        <h3><?= $item['name'] ?></h3>
                                    </div>
                                    <div class="product-price">
                                        <h3><?= product_price($item['price']) . "đ" ?></h3>

                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>




            </div>
        </div>
    </div>
    <div class="hotline-home">
        <div style="background-image: url(<?= _WEB_ROOT . '/app/public/assets/clients/images/bg_hotline.jpg' ?>);" class="hotline-home-theme">
            <div class="hotline-content-box">
                <div class="hotline-content">
                    <h2>Hotline</h2>
                    <a class="tag-a" href="tel:0378208856">0378208856</a>
                    <p>Chúng tôi cam kết 100% các sản phẩm có nguồn gốc xuất xứ rõ ràng, sạch, an toàn và đảm bảo chất lượng ngon nhất.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="product-selling">
        <div class="grid wide">
            <div class="about-title ">
                <div class="about-heading">
                    <span class="text_gradient">SẢN PHẨM BÁN CHẠY</span>
                </div>
            </div>
            <div class="product-selling-content">
            <div class="row ">
                    
                    <div class="col l-3 c-6">
                        <div class="content-tab-item">
                            <div class="product-thumnail">
                                <a href="sanpham/qua-oc-cho">
                                    <img src="<?= _WEB_ROOT . '/app/public/assets/clients/images/Quả óc chó-1.jpg' ?>" alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <div class="product-name">
                                    <h3>Quả óc chó</h3>
                                </div>
                                <div class="product-price">
                                    <h3>430,000</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                 
              </div>
            </div>
        </div>
    </div> -->



</div>
<script type="module" defer src="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/js/Home.js"></script>