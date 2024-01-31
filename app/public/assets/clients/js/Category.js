import * as fn from "./HandleSearchProduct.js";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const root_image = `${window.location.origin}/DUAN1_WE17301/app/public/assets/admin/images/`;
const web_root = `${window.location.origin}/DUAN1_WE17301/`;
const pagination = $(".pagination");
const content_li = $$(".content_ul li");
const clear_checkBox = $(".clear_checkBox");
const button_gradient = $(".button_gradient");
const popup_search = $(".popup_search");
const input_search = document.getElementById("input-search");

let perPage = 12;
let currentPage = 1;
let start = 0;
let end = perPage;

content_li.forEach((item) => {
  item.onclick = function () {
    $(".active").classList.remove("active");
    this.classList.add("active");
  };
});
// filterData ()
async function getData(url) {
  const response = await axios.get(url);
  return response.data;
}

function filterData() {
  let min_price = $('input[name="min-price"]').value;
  let max_price = $('input[name="max-price"]').value;
  let brand = getFilter("brand");
  let categories = getFilter("categories");

  let data = {
    min_price,
    max_price,
    brand,
    categories,
  };

  let formData = new URLSearchParams(data);
  axios
    .post("Category/ProductFilter", formData)

    .then((result) => {
      displayProduct(result.data);
      renderListPage(result.data);
    });
}

async function DataProduct() {
  try {
    const dataProduct = await getData("Category/getDataProduct");

    displayProduct(dataProduct);
    renderListPage(dataProduct);
  } catch (error) {
    console.log(error);
  }
}

async function changePage(dataPage, click) {
  const removeColorOld = $(".page-link.active").classList.remove("active");
  const setColor = click.classList.add("active");

  currentPage = dataPage;
  const dataPost = {
    currentPage,
    perPage,
  };
  const formData = new URLSearchParams(dataPost);
  const data = await axios
    .post("Category/handlePagination", formData)
    .then((result) => {
      displayProduct(result.data);
    });
  document.body.scrollIntoView({ behavior: "smooth", block: "start" });
}
function renderListPage(data) {
  const countProduct = data.length;

  let totalPages = Math.ceil(countProduct / perPage);

  let htmls = `<li class="page-item d-none"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
        <li class=" page-item disabled"   ><a class="page-link active"data-page="1" >1</a></li>`;
  for (let i = 2; i <= totalPages; i++) {
    htmls += ` 
        <li class="page-item">
        <a class="page-link"data-page=${i}>${i}</a></li>
        
        `;
  }
  htmls += `
  <li class="page-item"><a class="page-link" ><i class="fa fa-angle-right" aria-hidden="true"></i>`;
  pagination.innerHTML = htmls;
}

function displayProduct(data) {
  console.log(data.length);
  let main_content = $(".main-content");
  let htmls = ``;
  if (data.length > 0) {
    data.forEach((item, index) => {
      let priceToVnd = Number(item.price).toLocaleString("de-DE");
      if (index >= start && index < end) {
        htmls += ` <div class=" ">
            <div class="item_product_main item_product_main_relative">
                <form method="post" class="variants product-action" data-id="product-actions-1036352258" enctype="multipart/form-data">
                    <div class="product-thumbnail pos-relative">
                        <a class="image_thumb pos-relative embed-responsive embed-responsive-1by1" href="${web_root}products/detail/${item.id}">
                            <img style="width: 180px;height: 180px;"class="lazyload loaded" src="${root_image}${item.image}" data-was-processed="true">
                        </a>
    
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">
                        <a href="${web_root}products/detail/${item.id}" title="Bột Bổ Sung Đạm Thực Vật Hữu Cơ Hũ 907Gram Now Sports">
                        ${item.name}
                        </a>
                        </h3>
                     
                        <div style="display:flex;justify-content:center;" class="haravan-product-reviews-badge review-loop" data-id="1036377035">
                            <div class="price-box">
    
                                <span class="price">${priceToVnd}₫</span>
                            </div>
    
                        </div>
    
                    </div>
                </form>
            </div>
        </div>`;
      }
    });
  } else {
    htmls += `<p style="text-align:center;">Rất tiếc, không tìm thấy sản phẩm phù hợp với lựa chọn của bạn</p>`;
  }
  main_content.innerHTML = htmls;
}
function debounce(func, timeout = 750) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}
function getFilter(class_name) {
  let filter = [];
  $$(`input[name="${class_name}"]:checked`).forEach(function (e) {
    filter.push(e.value);
  });
  return filter;
}

document.addEventListener("DOMContentLoaded", () => {
  DataProduct();
});
$$(".common_selector").forEach((item) => {
  item.addEventListener("click", () => {
    filterData();
  });
});

pagination.addEventListener("click", (e) => {
  const click = e.target;
  const dataPage = click.getAttribute("data-page");
  if (dataPage && click.matches(".page-link")) {
    changePage(dataPage, click);
  }
});

clear_checkBox.addEventListener("click", async () => {
  const checkboxes = document.querySelectorAll("input[type=checkbox]");
  checkboxes.forEach((cb) => {
    cb.checked = false;
  });
  const dataProduct = await getData("Category/getDataProduct");

  displayProduct(dataProduct);
  renderListPage(dataProduct);
});
