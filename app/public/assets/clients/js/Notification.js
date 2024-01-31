
export function LabelNotifiSuccess(title) {
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
  
 export  function LabelNotifiError(title) {
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
export * from './Notification.js';
