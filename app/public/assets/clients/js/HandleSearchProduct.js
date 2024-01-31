const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const root_image = `${window.location.origin}/DUAN1_WE17301/app/public/assets/admin/images/`;
const web_root = `${window.location.origin}/DUAN1_WE17301/`;
const input_search = document.getElementById("input-search");
const popup_search = $(".popup_search");

export function debounce(func, timeout = 750) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}
export async function getData(url) {
  const response = await axios.get(url);
  return response.data;
}
export async function searchByString(stringSearch) {
  const data = await getData(`${web_root}Category/getDataProduct`);

  const displayProduct = $(".all-product-search");
  let productArr = data.filter(
    (item) =>
      Number(
        item.name.toLocaleLowerCase().indexOf(stringSearch.toLocaleLowerCase())
      ) != -1 ||
      Number(
        item.cat_name
          .toLocaleLowerCase()
          .indexOf(stringSearch.toLocaleLowerCase())
      ) != -1
  );

  let htmls = ``;
  if (productArr.length > 0) {
    productArr.forEach((item) => {
      let priceToVnd = Number(item.price).toLocaleString("de-DE");
      htmls += ` <li>
         <a href="${web_root}products/detail/${item.id}">
          <div class="ega-smartsearch-item__image"><img src="${root_image}${item.image}" alt="" width="150px;"height="150px"></div>
          <div class="ega-smartsearch-item__detail">
              <h4 class="ega-smartsearch-item__title">${item.name}</h4>
              <div class="ega-smartsearch-item__description">${item.description}</div>
              <div class="ega-smartsearch-item__price"><ins>${priceToVnd} đ</ins></div>
          </div>
      </a></li>`;
    });
  } else {
    htmls += `<p style="color: rgb(223, 189, 21);margin:10px;font-size:16px;">Rất tiếc, không tìm thấy sản phẩm phù hợp với lựa chọn của bạn</p>`;
  }

  displayProduct.innerHTML = htmls;
}

export function handleSearch() {
  ShowWhenFocus();
  input_search.addEventListener(
    "keyup",
    debounce((e) => {
      const stringSearch = e.target.value;
      $(".search-result").innerHTML = stringSearch;
      if (stringSearch.length > 0) {
        popup_search.classList.remove("d-none");
        searchByString(stringSearch);
      } else {
        popup_search.classList.add("d-none");
      }
    })
  );
}

export function HiddenClickOutSide() {
  const onClickOutside = (element, callback) => {
    document.addEventListener("click", (e) => {
      if (!element.contains(e.target)) callback();
    });
  };
  onClickOutside(input_search, () => popup_search.classList.add("d-none"));
}

export function ShowWhenFocus() {
  input_search.addEventListener("focus", (e) => {
    if (e.target.value.length > 0) {
      popup_search.classList.remove("d-none");
    }
  });
}
handleSearch();
HiddenClickOutSide();
export * from "./HandleSearchProduct.js";
