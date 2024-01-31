const $=document.querySelector.bind(document);
const loginForm=$("#loginForm");
const email=loginForm.email;
const password=loginForm.password;

        const input = document.getElementById("password-field"); 
   
        $(".click-eye").onclick=function (e) {
            e.target.classList.toggle("bx-show");
            // var input = $($(this).attr("toggle"));
            if (input.getAttribute("type") == "password") {
                input.setAttribute("type", "text");
            } else {
                input.setAttribute("type", "password");
            }
  };

  
