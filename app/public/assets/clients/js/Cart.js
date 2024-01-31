import * as label from "./Notification.js";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const value_quantity = $(".value-quantity");
const web_root = `${window.location.origin}/DUAN1_WE17301/`;

const modalAlert = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-success",
    cancelButton: "btn btn-danger",
    actions: "custome-actions",
  },
  buttonsStyling: false,
});

const configAlert = {
  title: "Cảnh báo",
  text: "Bạn có chắc chắn là muốn xóa sản phẩm này?",
  icon: "warning",
  showCancelButton: true,
  confirmButtonText: "Đồng ý",
  cancelButtonText: "Hủy bỏ",
  reverseButtons: true,
};

function handleLoginAddCart() {
  const btn_add_cart = $(".btn-add-cart");
  const form_add_product = $("#form_add_product");
  form_add_product.addEventListener("submit", (e) => {
    e.preventDefault();
  });
}
function increaseProduct() {
  const postUrl = `${web_root}cart/items`;
  let increase = document.getElementsByClassName("increase");

  for (const increase_btn of increase) {
    increase_btn.onclick = (e) => {
      const click = e.target;
      const product_id = click.getAttribute("data-view-id");
      const parent = document.querySelector(`.product-item-${product_id}`);

      const cart_price = parent.querySelector(".cart-price h3");

      const product__final_prices = parent.querySelector(
        ".product__final-prices"
      );

      let value_quantity = parent.querySelector(".value-quantity");

      let product_quantity = value_quantity.value;
      if (!isNaN(product_quantity)) {
        value_quantity.value++;
        product__final_prices.textContent =
          Number(cart_price.textContent) * value_quantity.value * 1000;
        const convertMoney = Number(
          product__final_prices.textContent
        ).toLocaleString("de-DE");
        product__final_prices.textContent = convertMoney;
      } else {
        return false;
      }
      const data = {
        action: "increase",
        quantity: value_quantity.value,
        product_id,
      };
      const formData = new URLSearchParams(data);
      axios.post(postUrl, formData);
      total_Cart();
    };
  }
}
function minusProduct() {
  let minus = document.getElementsByClassName("minus");
  const postUrl = `${web_root}cart/items`;

  for (const minus_btn of minus) {
    minus_btn.onclick = (e) => {
      const click = e.target;
      const product_id = click.getAttribute("data-view-id");
      const parent = document.querySelector(`.product-item-${product_id}`);
      const cart_price = parent.querySelector(".cart-price h3");
      const product__final_prices = parent.querySelector(
        ".product__final-prices"
      );

      let value_quantity = parent.querySelector(".value-quantity");
      let product_quantity = value_quantity.value;
      if (!isNaN(product_quantity) && Number(value_quantity.value) > 1) {
        value_quantity.value--;

        product__final_prices.textContent =
          Number(cart_price.textContent) * value_quantity.value * 1000;

        const convertMoney = Number(
          product__final_prices.textContent
        ).toLocaleString("de-DE");
        product__final_prices.textContent = convertMoney;
      } else {
        return false;
      }
      const data = {
        action: "minus",
        quantity: value_quantity.value,
        product_id,
      };
      const formData = new URLSearchParams(data);

      axios.post(postUrl, formData);
      total_Cart();
    };
  }
}

function total_Cart() {
  const prices_value_final = $(".prices__value--final");
  const cart_item = $$(".cart-item");

  let sum = 0;
  cart_item.forEach((element) => {
    let total_one_item = element.querySelector(
      ".product__final-prices"
    ).textContent;
    total_one_item.replaceAll(".", "");
    total_one_item = Number(total_one_item.replaceAll(".", ""));

    sum += total_one_item;
  });

  prices_value_final.textContent = sum.toLocaleString("de-DE");
}

function deleteProduct() {
  const btn_delete_product = $$(".cart-item-delete");
  const postUrl = `${web_root}cart/items`;
  btn_delete_product.forEach((element) => {
    element.addEventListener("click", function () {
      const product_id = this.getAttribute("data-id");
      const cart_item_product = $(`.product-item-${product_id}`);
      const data = {
        action: "delete",
        product_id,
      };
      const formData = new URLSearchParams(data);
      modalAlert.fire(configAlert).then((result) => {
        if (result.isConfirmed) {
          axios.post(postUrl, formData);
          cart_item_product.remove();
          label.LabelNotifiSuccess("Đã xóa thành công");
          total_Cart();
          check_Empty_Cart();
          CountProduct();
        }
      });
    });
  });
}
function CountProduct() {
  const quantity_product = $(".quanity-icon-cart");
  const cart_item = [...$$(".cart-item")];
  quantity_product.textContent = cart_item.length;
}

function check_Empty_Cart() {
  const cart_item = $$(".cart-item");
  const cart_main = $(".cart-main");
  const quantity_icon_cart = $(".quanity-icon-cart");
  const htmls = `  <div class="cart-empty-main" style="display: block;">
    <div class="grid wide">
        <div class="box-img-cart-empty">
            <img src="${web_root}/app/public/assets/clients/images/cart-empty.png" alt="">
        </div>
        <div class="cart-empty-main-title">
            <span>GIỎ HÀNG TRỐNG</span>
        </div>
        <a href="${web_root}/category" class="tag-a">
            <div class="continue_view" style="width:200px;margin-top:40px; margin-left:15px;">
                <i class="fas fa-long-arrow-alt-left"></i>
                <span>QUAY LẠI CỬA HÀNG</span>
            </div>
        </a>
    </div>
  </div>`;
  if (cart_item.length === 0) {
    cart_main.innerHTML = htmls;
    quantity_icon_cart.textContent = 0;
  }
}
function start() {
  handleLoginAddCart();
  increaseProduct();
  minusProduct();
  deleteProduct();
  total_Cart();
  check_Empty_Cart();
}
start();
