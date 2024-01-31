import * as fn from "./HandleSearchProduct.js";
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const element_categories = $(".element-categories");
const content_tab = $(".content-tab");
const web_root = `${window.location.origin}/DUAN1_WE17301/app/public/assets/admin/images/`;
const root_detail = `${window.location.origin}/DUAN1_WE17301/products/detail/`;
function getProductFirstCate() {
  const first_cate = $(".element-categories .tab-link-item");
  const cat_id = first_cate.getAttribute("data-id-cate");
  const formData = new FormData();
  formData.append("cat_id", cat_id);
  axios.post("Home/cateById", formData).then((result) => {
    displayProductFirstCate(result.data);
  });
}
function displayProductFirstCate(data) {
  const htmls = data.map((item) => {
    let priceToVnd = Number(item.price).toLocaleString("de-DE");
    return `      
            <div class="col l-3 c-6 ">
            <a href="${root_detail}${item.id}" class="content-tab-item">
                <div class="product-thumnail">   
                        <img height="260"src="${web_root}${item.image}" alt="">
                </div>
                <div class="product-info">
                    <div class="product-name">
                        <h3>${item.name}</h3>
                    </div>
                    <div class="product-price">
                        <h3>${priceToVnd}đ</h3>
                    </div>
                </div>
            </a>
        </div>
           `;
  });
  content_tab.innerHTML = htmls.join("");
}
function getProductByClick(click) {
  const cat_id = click.getAttribute("data-id-cate");
  $(".tab-link-active").classList.remove("tab-link-active");
  click.classList.add("tab-link-active");
  switch (cat_id) {
    case cat_id:
      const formData = new FormData();
      formData.append("cat_id", cat_id);
      axios.post("Home/cateById", formData).then((result) => {
        displayProductByClick(result.data);
      });

      break;
    default:
      break;
  }
}
function displayProductByClick(data) {
  const htmls = data.map((item) => {
    let priceToVnd = Number(item.price).toLocaleString("de-DE");
    return `      
        <div class="col l-3 c-6 ">
            <a href="${root_detail}${item.id}" class="content-tab-item">
                <div class="product-thumnail">   
                        <img height="260"src="${web_root}${item.image}" alt="">
                </div>
                <div class="product-info">
                    <div class="product-name">
                        <h3>${item.name}</h3>
                    </div>
                    <div class="product-price">
                        <h3>${priceToVnd}đ</h3>
                    </div>
                </div>
            </a>
        </div>
       `;
  });
  content_tab.innerHTML = htmls.join("");
}

start();
function start() {
  getProductFirstCate();
}
element_categories.addEventListener("click", function handleClick(e) {
  const click = e.target;
  if (click.closest(".tab-link-item")) {
    getProductByClick(click);
  }
});
