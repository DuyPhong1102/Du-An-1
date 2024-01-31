import * as fn from "./HandleSearchProduct.js";
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const cart_wrapper = $(".cart-wrapper");
const web_root = `${window.location.origin}/DUAN1_WE17301/`;
const value_quantity = $(".value-quantity");
let product_quantity = value_quantity.value;
//handle Search Header

function handleSeeMoreDesc() {
  const btn_more = $(".btn-more");
  const desc_product = $(".chitiet-mota-text");
  const gradient = $(".gradient");

  const heightElement = desc_product.offsetHeight;

  if ($(".chitiet-mota-text p").offsetHeight < 350) {
    btn_more.classList.add("d-none");
    desc_product.setAttribute("style", "");

    gradient.remove();
    return;
  }

  btn_more.addEventListener("click", function () {
    if (this.textContent == "Thu gọn nội dung") {
      desc_product.setAttribute("style", "overflow:hidden;height:300px;");

      this.textContent = `Xem Thêm Nội Dung`;
      gradient.classList.remove("d-none");
      return;
    }

    desc_product.setAttribute("style", "");
    gradient.classList.add("d-none");

    this.textContent = `Thu gọn nội dung`;
  });
}
function handleLogicAddCart() {
  const form_add_product = $("#form_add_product");
  const id = form_add_product.id_product;
  const quantity = form_add_product.quantity;
  //Hiển thị số lượng trong giỏ hàng
  let quantity_icon_cart = $(".quanity-icon-cart");
  form_add_product.addEventListener("submit", (e) => {
    e.preventDefault();
    const postUrl = `${web_root}cart/items`;

    const data = {
      product_id: id.value,
      quantity: quantity.value,
      add_product: "true",
    };

    const formData = new URLSearchParams(data);
    axios.post(postUrl, formData);
    //thông báo thêm thành công
    quantity_icon_cart = Number(quantity_icon_cart.textContent);

    notifiAddCart();
  });
}
function notifiAddCart() {
  const cart_wrapper = $(".cart-wrapper");

  let div = document.createElement("div");
  div.setAttribute("class", "CartNotification__Wrapper iiyvNb");
  div.innerHTML = `
    <a class="btn-close"><i class="fa-solid fa-xmark"></i></a>
  <p class="status">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
          </svg>Thêm vào giỏ hàng thành công!</p>
          <a class="btn-view-cart" href=" ${web_root}cart">Xem giỏ hàng và thanh toán</a>
  </div>`;
  cart_wrapper.appendChild(div);
}
function closeCartNotification() {
  const CartNotification__Wrapper = $(".CartNotification__Wrapper");
  CartNotification__Wrapper.remove();
}
//close cart notification
function increaseProduct() {
  let increase = $(".increase");

  increase.addEventListener("click", () => {
    if (!isNaN(product_quantity)) value_quantity.value++;
    return false;
  });
}
function minusProduct() {
  let minus = $(".minus");

  minus.addEventListener("click", () => {
    if (!isNaN(product_quantity) && Number(value_quantity.value) > 1)
      value_quantity.value--;
    return false;
  });
}
function postComment() {
  const form_comment = $("#hrv-product-reviews-frm");

  const content_comment = $("textarea[name='content_comment']");
  const customer_id = $("input[name='customer_id']");
  const product_id = $("input[name='product_id']");

  const formData = new FormData();
  form_comment.addEventListener("submit", (e) => {
    e.preventDefault();
    formData.append(`content_comment`, `${content_comment.value}`);
    formData.append("customer_id", `${customer_id.value}`);
    formData.append("product_id", `${product_id.value}`);

    axios
      .post(`${web_root}Products/addCommentProduct`, formData)
      .then((result) => {
        renderComment(result.data);
      });
    e.target.reset();
  });
}
function renderComment(data) {
  let comment_list = $(".comment-list");

  let htmls = data.map((item) => {
    return `<div class="item">
    <div class="avatar">
        <img src="${web_root}/app/public/assets/clients/images/${item.image} ?>" alt="">
    </div>
    <div class="summary">
        <div class="info-user">
            <div class="comment-header">
                <span class="authorname name-4">${item.fullname}</span>

            </div>
            <div class="comment-content">${item.content}</div>
        </div>
    </div>
</div>`;
  });
  comment_list.innerHTML = htmls.join("");
}
document.addEventListener("DOMContentLoaded", () => {
  //  notifiAddCart();
  handleLogicAddCart();
  handleSeeMoreDesc();
  postComment();
  //Tăng giảm sản phẩm
  increaseProduct();
  minusProduct();
});

cart_wrapper.addEventListener("click", (e) => {
  const click = e.target;

  if (click.closest(".btn-close")) {
    closeCartNotification();
  }
});

new Glider($(".product-selling-main"), {
  slidesToScroll: 2,
  slidesToShow: 5,
  duration: 0.5,
  draggable: true,
  dots: ".dots",
  arrows: {
    prev: ".glider-prev",
    next: ".glider-next",
  },
});
