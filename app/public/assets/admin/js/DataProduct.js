const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const deleteById = $(".deleteById");
const cartContent = $("#cart-content");
const btnEdit = $(".edit");
const btnCancelEdit = $(".btn-cancel");
const btnSaveEdit = $(".btn-save");
const elementButton = $(".element-button");
const modalUp = $("#ModalUP");
const modal = bootstrap.Modal.getOrCreateInstance(modalUp);
const loader = $(".loader");
const fileInput = $('input[name="fileUpload"]');
const pagination = $(".pagination");

const itemPerPage = $('select[name="itemPerPage"]');

const web_root = `${window.location.origin}/DUAN1_WE17301/app/public/assets/admin/images/`;
let currentPage = 1;
let perPage = 3;
let start = 0;
let end = perPage;

let preview = $(".preview");

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

async function getData(url) {
  const response = await axios.get(url);
  return response.data;
}
async function reRenderData(url) {
  const data = await getData(url);
  displayProduct(data);
}

function getCurrentPage(indexPage) {
  start = (indexPage - 1) * perPage;
  end = indexPage * perPage;
}

async function DataProduct() {
  try {
    const data = await getData("DataProduct/ApiProduct");
    let countProduct = data.length;

    let totalPages = Math.ceil(countProduct / perPage);

    searchByName(data);
    displayProduct(data);
    renderListPage(totalPages);
  } catch (error) {
    console.log(error);
  }
}

function LabelNotifiSuccess(title) {
  Toastify({
    text: title,
    className: "success",
    position: "right",
    duration: 1500,
    offset: {
      y: 40, // vertical axis - can be a number or a string indicating unity. eg: '2em'
    },
    style: {
      background: "linear-gradient(to right, #00b09b, #96c93d)",
    },
  }).showToast();
}

function LabelNotifiError(title) {
  Toastify({
    text: title,
    className: "fail",
    position: "right",
    duration: 1500,
    offset: {
      y: 40, // vertical axis - can be a number or a string indicating unity. eg: '2em'
    },
    style: {
      background: "#e9546b",
    },
  }).showToast();
}

function time() {
  var today = new Date();
  var weekday = new Array(7);
  weekday[0] = "Chủ Nhật";
  weekday[1] = "Thứ Hai";
  weekday[2] = "Thứ Ba";
  weekday[3] = "Thứ Tư";
  weekday[4] = "Thứ Năm";
  weekday[5] = "Thứ Sáu";
  weekday[6] = "Thứ Bảy";
  var day = weekday[today.getDay()];
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  nowTime = h + " giờ " + m + " phút " + s + " giây";
  if (dd < 10) {
    dd = "0" + dd;
  }
  if (mm < 10) {
    mm = "0" + mm;
  }
  today = day + ", " + dd + "/" + mm + "/" + yyyy;
  tmp = '<span class="date"> ' + today + " - " + nowTime + "</span>";
  document.getElementById("clock").innerHTML = tmp;
  clocktime = setTimeout("time()", "1000", "Javascript");

  function checkTime(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }
}

function checkAllBox(item_box) {
  let all = $('input[name="all"]');

  all.onclick = () => {
    if (all.checked) {
      for (var i = 0; i < item_box.length; i++) {
        item_box[i].checked = true;
      }
    } else {
      for (var i = 0; i < item_box.length; i++) {
        item_box[i].checked = false;
      }
    }
  };
}

function getCheckBoxArrayValue(nameInput) {
  let valores = [];
  let checked = document.querySelectorAll(
    'input[name="' + nameInput + '"]:checked'
  );
  checked.forEach((input) => {
    let valor = input?.defaultValue || input?.value;
    valor = Number(valor);
    valores.push(valor);
  });
  return valores;
}

function deleteMultipleItem() {
  const bodyFormData = new FormData();
  const arrId = getCheckBoxArrayValue("item_box");

  deleteById.onclick = () => {
    arrId.forEach((item) => {
      bodyFormData.append("arrId[]", item);

      modalAlert.fire(configAlert).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("DataProduct/deleteMultipleProduct", bodyFormData)
            .then((result) => {
              displayProduct(result.data);
            });
          LabelNotifiSuccess("Đã xóa thành công");
        }
      });
    });
  };
}

function DeleteOneItem(id) {
  modalAlert.fire(configAlert).then((result) => {
    if (result.isConfirmed) {
      axios.post("DataProduct/deleteProduct", new URLSearchParams({ id }));
      //Xóa item khỏi dom
      $(".product-item-" + id).remove();
      LabelNotifiSuccess("Đã xóa thành công");
    }
  });
}

function displayProduct(data) {
  const tbody = cartContent.querySelector("tbody");
  let htmls = "";
  if (data.length > 0) {
    data.forEach((item, index) => {
      let priceToVnd = Number(item.price).toLocaleString("de-DE");
      if (index >= start && index < end) {
        htmls += `  
    <tr class="product-item-${item.id}">
    <td width="10"><input type="checkbox" name="item_box" value="${item.id}"></td>
    <td>${item.id}</td>
    <td>${item.name}</td>
    <td><img src="${web_root}${item.image}" alt="" width="150px;"height="150px"></td>
    <td>${item.view}</td>
    <td>${priceToVnd} đ</td>
    <td><span class="">${item.brand_name}</span></td>
    <td>${item.cat_name}</td>
    <td><button class="btn btn-primary btn-sm trash" onclick="DeleteOneItem(${item.id})"  type="button" title="Xóa">
    Xóa
      </button>
      <button data-id="${item.id}"class="btn btn-primary btn-sm edit edit-product-${item.id}" type="button" title="Sửa" id="show-emp" data-bs-toggle="modal" data-bs-target="#ModalUP">
      Sửa

    </td>
    `;
      }
    });
  } else {
    htmls += `<tr>
  <td colspan="9"><p style="margin:0;font-size:18px;padding:40px 0;">Không tồn tại sản phẩm </p></td>
  </tr>`;
  }
  tbody.innerHTML = htmls;

  const item_box = $$('input[name="item_box"]');
  checkAllBox(item_box);
}

//Kiểm tra xem có check box nào được tích hay không nếu không thì thông báo phải chọn sản phẩm xóa
function checkEmptyCheckBox() {
  const AlertCustome = {
    title: "",
    text: "Chưa có sản phẩm nào được chọn",
    icon: "error",
    reverseButtons: true,
  };

  deleteById.onclick = () => {
    const arrId = getCheckBoxArrayValue("item_box");
    if (arrId.length == 0) {
      modalAlert.fire(AlertCustome);
    }
  };
}
function showError(input, message) {
  let parent = input.parentElement;

  let small = parent.querySelector("small");

  parent.classList.add("error");
  small.innerText = message;
}
function showSuccess(input) {
  let parent = input.parentElement;

  let small = parent.querySelector("small");

  parent.classList.remove("error");
  small.innerText = "";
}

function checkEmptyError(listInput) {
  let isEmptyError = false;

  listInput.forEach((input) => {
    if (!input.value) {
      isEmptyError = true;
      showError(input, "Không được để trống");
    } else {
      showSuccess(input);
    }
  });
  return isEmptyError;
}

function editProduct(data, dataId) {
  const dataProductById = data.find((item) => item.id == dataId);

  const formEdit = document.getElementById("formEdit");

  let name = formEdit.name;
  let price = formEdit.price;
  let view = formEdit.view;
  let cat_id = formEdit.cate;
  let desc = formEdit.desc;
  let brand = formEdit.brand;

  //Đổ dữ liệu cũ ra màn hình
  name.value = dataProductById.name;
  price.value = dataProductById.price;
  preview.src = `${web_root}${dataProductById.image}`;
  view.value = dataProductById.view;
  cat_id.value = dataProductById.cat_id;
  brand.value = dataProductById.brand_id;
  desc.value = dataProductById.description;

  formEdit.onsubmit = (e) => {
    e.preventDefault();
    const checkFile =
      !!fileInput.files[0] == false
        ? dataProductById.image
        : fileInput.files[0];
    let isEmptyError = checkEmptyError([name, cat_id, price, desc]);

    const formData = new FormData();
    formData.append("id", `${dataProductById.id}`);
    formData.append("name", `${name.value}`);
    formData.append("price", `${price.value}`);
    formData.append("file", fileInput.files[0]);
    formData.append("cat_id", `${cat_id.value}`);
    formData.append("desc", `${desc.value}`);

    if (!isEmptyError) {
      axios.post("DataProduct/edit", formData).then((result) => {
        displayProduct(result.data);
      });
      modal.hide();
      LabelNotifiSuccess("Sửa thành công");
    } else {
      LabelNotifiError("Sửa thất bại");
    }
  };
}
function UpdateFile() {
  let fileName = $(".file-upload-filename");

  let temp = 0;
  fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];

    temp++;
    preview.classList.add("d-none");
    if (temp !== 1) {
      preview.classList.add("d-none");
      fileName.classList.add("d-none");
    }
    const reader = new FileReader();

    reader.addEventListener(
      "load",
      () => {
        preview.src = reader.result;
        let getSrc = preview.getAttribute("src");
        if (temp !== 1) {
          preview.classList.remove("d-none");
        } else if (!!getSrc) {
          preview.classList.remove("d-none");
        }
      },
      false
    );
    Showloading();
    if (file) {
      setTimeout(() => {
        Hideloading();
        fileName.innerHTML = file.name;
        fileName.classList.remove("d-none");
        reader.readAsDataURL(file);
      }, 500);
    } else {
      Hideloading();
      fileName.classList.remove("d-none");
      preview.classList.remove("d-none");
    }
  });
}

function Hideloading() {
  loader.classList.add("d-none");
}
function Showloading() {
  loader.classList.remove("d-none");
}

//Hiển thị số sản phẩm theo select
function displayLimitProduct() {
  itemPerPage.addEventListener("change", async (e) => {
    const data = await getData("DataProduct/ApiProduct");

    const value = e.target.value;
    perPage = Number(value);
    getCurrentPage(currentPage);
    totalPages = Math.ceil(data.length / perPage);
    displayProduct(data);
    renderListPage(totalPages);
  });
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

function searchByName(data) {
  const search = $("input[name='search']");
  const removeString = $(".remove-search");

  search.addEventListener(
    "keyup",
    debounce(async (e) => {
      let value = e.target.value.trim();

      const checkLengthString =
        value.length > 0
          ? removeString.classList.remove("d-none")
          : removeString.classList.add("d-none");

      const formData = new FormData();
      formData.append("string", value);
      StartLoading();
      const getDataSearch = await axios
        .post("DataProduct/searchByName", formData)
        .then((result) => {
          Hideloading();
          displayProduct(result.data);
        });
    })
  );
  removeString.addEventListener("click", () => {
    search.value = "";
    search.focus();
    displayProduct(data);
    removeString.classList.add("d-none");
  });
}

function renderListPage(totalPage) {
  let htmls = `   <li class=" previous page-sub d-none" id="sampleTable_previous"><a  class="previous" aria-controls="sampleTable"  tabindex="0" >
  Lùi
  </a></li>
  <li class="paginate_button page-item  "><a href="#" aria-controls="sampleTable" data-id="1" tabindex="0" class="page-link  page-link-1 active">1</a></li>
  `;

  for (let i = 2; i <= totalPage; i++) {
    htmls += ` 
    <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-id="${i}" tabindex="0" class="page-link page-link-${i}">${i}</a></li>
  `;
  }
  htmls += `  
    
  <li class=" next disabled page-sub" id="sampleTable_next"><a class="next  "  aria-controls="sampleTable" data-dt-idx="3" tabindex="0" >
    Tiếp
</a></li>`;
  pagination.innerHTML = htmls;
}

function Hideloading() {
  setTimeout(() => {
    const loading = $(".loading");
    loading.classList.add("d-none");
  }, 750);
}
function StartLoading() {
  const loading = $(".loading");
  loading.classList.remove("d-none");
}
function handleChangePage(data, click) {
  let totalPages = Math.ceil(data.length / perPage);

  document.body.scrollIntoView({ behavior: "smooth", block: "start" });
  currentPage = Number(click.getAttribute("data-id"));
  if (currentPage == totalPages) {
    $(".next").classList.add("d-none");
    $(".previous").classList.remove("d-none");
  } else if (currentPage == 1) {
    $(".previous").classList.add("d-none");
    $(".next").classList.remove("d-none");
  }

  const page_link = $(".page-link.active");
  page_link.classList.remove("active");
  click.classList.add("active");
  getCurrentPage(currentPage);
  displayProduct(data);
}
function increasePage(data, click) {
  let totalPages = Math.ceil(data.length / perPage);

  currentPage++;
  $(".page-link.active").classList.remove("active");
  $(`.page-link-${currentPage}`).classList.add("active");

  if (currentPage > 1) {
    $(".previous").classList.remove("d-none");
  }
  if (currentPage > totalPages) {
    currentPage == totalPages;
  }
  if (currentPage == totalPages) {
    $(".next").classList.add("d-none");
  }

  getCurrentPage(currentPage);
  displayProduct(data);

  document.body.scrollIntoView({ behavior: "smooth", block: "start" });
}

function minusPage(data, click) {
  let totalPages = Math.ceil(data.length / perPage);

  currentPage--;

  $(".page-link.active").classList.remove("active");
  $(`.page-link-${currentPage}`).classList.add("active");

  if (currentPage == 1) {
    $(".previous").classList.add("d-none");
  } else {
    $(".next").classList.remove("d-none");
  }
  getCurrentPage(currentPage);
  displayProduct(data);

  document.body.scrollIntoView({ behavior: "smooth", block: "start" });
}
document.addEventListener("DOMContentLoaded", function () {
  time();
  UpdateFile();
  DataProduct();
  displayLimitProduct();
  checkEmptyCheckBox();
});

cartContent.addEventListener("click", async (e) => {
  const click = e.target;

  const dataId = click.getAttribute("data-id");
  if (click.matches(".edit")) {
    const data = await getData("DataProduct/ApiProduct");
    editProduct(data, dataId);
  } else if (
    click.matches("input[name=item_box]") ||
    click.matches("input[name=all]")
  ) {
    deleteMultipleItem();
  }
});
btnCancelEdit.addEventListener("click", (e) => {
  e.preventDefault();
  modal.hide();
});
pagination.addEventListener("click", async (e) => {
  e.preventDefault();
  const click = e.target;

  if (click.matches(".page-link")) {
    const data = await getData("DataProduct/ApiProduct");
    handleChangePage(data, click);
  } else if (click.matches(".next")) {
    const data = await getData("DataProduct/ApiProduct");
    increasePage(data, click);
  } else if (click.matches(".previous")) {
    const data = await getData("DataProduct/ApiProduct");
    minusPage(data, click);
  }
});
