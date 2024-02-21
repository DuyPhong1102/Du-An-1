const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
let name = $('input[name="name"]');
let price = $('input[name="price"]');
let desc = $('textarea[name="desc"]');
let fileInput = $('input[name="fileUpload"]');
let brand = $('select[name="brand"]');
let statusProduct = $('select[name="status"]');
let cat_id = $('select[name="categories"]');
let fileName = $(".file-upload-filename");
let preview = $(".preview");
let elementButton=$('.element-button');
const cancelAddCate=$(".cancelAddCate");
const cancelAddBrand=$('.cancelAddBrand')
const modalUp = $("#adddanhmuc");
const modal = bootstrap.Modal.getOrCreateInstance(modalUp);





async function getData(url) {
  const response = await axios.get(url);
  return response.data;
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
function InsertData() {
  formUpdate.addEventListener("submit", function (e) {
    e.preventDefault();
    let isEmptyError = checkEmptyError([name, cat_id, price, desc, fileInput,brand,statusProduct]);

    const formData = new FormData();

    formData.append("name", `${name.value}`);
    formData.append("price", `${price.value}`);
    formData.append("file", fileInput.files[0]);
    formData.append("cat_id", `${cat_id.value}`);
    formData.append("desc", `${desc.value}`);
    formData.append("brand_id", `${brand.value}`);
    formData.append("product_status", `${statusProduct.value}`);
    
    axios.post("AddProduct/store", formData);

    if (isEmptyError) {
      insertFail();
    } else {
      insertSuccess();
      e.target.reset();
      cat_id.selectedIndex =0;
      preview.classList.add("d-none");
      fileName.innerHTML = "";
    }
  });
}
function insertSuccess() {
  Toastify({
    text: "Thêm thành công",
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

function insertFail() {
  Toastify({
    text: "Thêm thất bại",
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



function UpdateFile() {

  let temp=0;
  fileInput.addEventListener("change", (e) => {

    const file = e.target.files[0];

     temp++;
   
     if(temp!==1 ){  
      preview.classList.add('d-none')
      fileName.classList.add('d-none')
    }
    const reader = new FileReader();
    
    reader.addEventListener(
      "load",
      () => {
 
        preview.src = reader.result;
        let getSrc=preview.getAttribute("src");
        if(temp!==1){ 
          preview.classList.remove('d-none')
        }else if(!!getSrc){
          preview.classList.remove('d-none')
        } 
      },
      false
    );
    Showloading();
    if (file) {
     setTimeout(() => {
      Hideloading();
      fileName.innerHTML = file.name;
      fileName.classList.remove('d-none')
      reader.readAsDataURL(file);
     }, 500);
    }
    else{
      Hideloading();
      fileName.classList.remove('d-none')
      preview.classList.remove('d-none')

    }

    
  });
}

function Hideloading(){
  const loader=$(".loader");
  loader.classList.add('d-none');

}
function Showloading(){
  const loader=$(".loader");
  loader.classList.remove('d-none');

}
function insertCategories(){

  const cat_name=$('input[name="cat_name"]');
  const addCategories=$('#addCategories');


 addCategories.onsubmit=(e) => {
  e.preventDefault();
  let isEmptyError = checkEmptyError([cat_name]);
  const formData = new FormData();
  formData.append("cat_name", `${cat_name.value}`);

  if(!isEmptyError){
    axios.post("handleCategories/add", formData)
    .then(function(result){
      console.log(result);
      insertSuccess()
      renderCategories(result.data)
      reRenderData("handleCategories/get")
      e.target.reset();
    })
    modal.hide();
  }
 }
  
}
 
function insertBrand(){
  const btn_Savebrand=$('.save_add_brand');
  const inputBrand=$('input[name="brand"]');

  const formBrand=$('#brand');
  formBrand.onsubmit=(e) => {
    const modal=bootstrap.Modal.getOrCreateInstance(formBrand)
    e.preventDefault();
    let isEmptyError = checkEmptyError([inputBrand]);
    const formData = new FormData();
    formData.append("brand_name", `${inputBrand.value}`);
  
    if(!isEmptyError){
      axios.post("handleBrand/add", formData)
      .then(function(result){
        insertSuccess()
        displayBrand(result.data)
        e.target.reset();
      })
      modal.hide();
    }
   }

}

async function reRenderData(url) {
  const data = await getData(url);
  displayCateMain(data)
}

async function DataStatus() {
  const data = await getData("DataProduct/getStatusProduct");

  displayStatusProduct(data)
}

function displayStatusProduct(data){

 
  let htmls=`<option selected value="">-- Chọn trạng thái --</option>`
  data.forEach(item=>{
 
     let product_status=item==1 ? "Kích hoạt" : "Vô hiệu hóa";
    htmls+=`<option value=${item}>${product_status}</option>`;
  })
  statusProduct.innerHTML=htmls
}


async function DataCategories() {
    const data = await getData("HandleCategories/get");

    renderCategories(data);
    displayCateMain(data);
}



 function renderCategories(data){

   const list_categories=$('.list_categories');
  
  
  const htmls= data.map((item)=>{

    return `<li>${item.cat_name}</li>`
   })
   
   list_categories.innerHTML=htmls.join('');

}

function displayCateMain(data){
  let htmls=`<option selected value="">-- Chọn danh mục --</option>`;
    data.forEach(item=>{
      htmls+=`<option value="${item.cat_id}">${item.cat_name}</option>`
   
  })

  cat_id.innerHTML=htmls;
}




async function DataBrand(){
  const data = await getData("HandleBrand/get");
  displayBrand(data)
}

function displayBrand(data){
  let htmls=`<option selected value="">-- Chọn thương hiệu --</option>`;
  data.forEach(item=>{
    htmls+=`<option value="${item.id}">${item.brand_name}</option>`
})

brand.innerHTML=htmls;
}

start();

function start() {
  InsertData();
  UpdateFile();
  DataCategories()
  DataBrand();
  DataStatus();
}

elementButton.addEventListener('click', function(e) {
  const click = e.target;
  if(click.matches(".btnAddCategories")){
    insertCategories()
  }
  else if (click.matches(".btnAddBrand")){
    insertBrand()

  }
 
})