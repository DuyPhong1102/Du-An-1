import * as label from "./Notification.js";
import * as handleSearch from "./HandleSearchProduct.js";
import * as validate from "./Validate.js";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const fileInput = $('input[name="file-user"]');
const preview = $(".preview");
const fullname = $('input[name="fullname"]');
const formUpdate = $("#updateUser");
const id_user = $('input[name="id_user"]');
const avatar__img = $(".avatar__img");
const web_root = `${window.location.origin}/DUAN1_WE17301/app/public/assets/clients/images/`;

formUpdate.addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData();
  let gender_value = getValueGender("gender");

  formData.append("fullname", `${fullname.value}`);
  formData.append("file", fileInput.files[0]);
  formData.append("gender", `${gender_value}`);
  formData.append("id_user", `${id_user.value}`);
  formData.append("update_info_user", "update_info_user");

  axios.post("update_info", formData).then((result) => {
    displayUpdate(result.data);
  });
  label.LabelNotifiSuccess("Cập nhập thông tin thành công");
});

function displayUpdate(data) {
  avatar__img.src = `${web_root}${data}`;
}
function getValueGender(input) {
  let checked = document.querySelector('input[name="' + input + '"]:checked');
  let valores = [];
  if (checked) {
    valores.push(checked.value);
  }
  return valores;
}

function changePhoneNumber() {
  const editPhoneNumber = $("#editPhoneNumber");
  const phone_number = $(".phone_number");
  const input_phone_number = editPhoneNumber.phone_number;

  editPhoneNumber.addEventListener("submit", (e) => {
    e.preventDefault();
    let isEmptyError = validate.checkEmptyError([input_phone_number]);
    const formData = new FormData();
    formData.append("phone_number", `${input_phone_number.value}`);

    if (!isEmptyError) {
      label.LabelNotifiSuccess("Sửa thành công ");
      validate.modal_hide("edit-phone-number");
      phone_number.textContent = input_phone_number.value;
      axios.post("update_info", formData);
    }
  });
}
function changeEmail() {
  const editEmail = $("#editEmail");
  const email = $(".email");
  const input_email = editEmail.input_email;

  editEmail.addEventListener("submit", (e) => {
    e.preventDefault();
    let isEmptyError = validate.checkEmptyError([input_email]);
    const formData = new FormData();
    formData.append("email", `${input_email.value}`);

    if (!isEmptyError) {
      label.LabelNotifiSuccess("Sửa thành công ");
      validate.modal_hide("edit_email");
      email.textContent = input_email.value;
      axios.post("update_info", formData);
    }
  });
}

start();
function start() {
  changePhoneNumber();
  changeEmail();
}
fileInput.addEventListener("change", (e) => {
  const file = e.target.files[0];
  const reader = new FileReader();

  reader.addEventListener(
    "load",
    () => {
      let img = reader.result;

      preview.setAttribute("style", `background-image: url('${img}')`);
    },
    false
  );
  if (file) {
    reader.readAsDataURL(file);
  }
});
