export function showError(input, message) {
  let parent = input.parentElement;
  let small = parent.querySelector("small");

  small.classList.add("error");
  small.innerText = message;
}
export function showSuccess(input) {
  let parent = input.parentElement;

  let small = parent.querySelector("small");

  small.classList.remove("error");
  small.innerText = "";
}

export function checkEmptyError(listInput) {
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
export function modal_hide(id){
    const modalUp=document.querySelector(`#${id}`)
    const modal = bootstrap.Modal.getOrCreateInstance(modalUp);
  modal.hide();
}
export * from './Validate.js';
