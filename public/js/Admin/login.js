var myInput = document.querySelectorAll("main .board .right_log .login .inp .sua .input_form");
var container = document.querySelectorAll("main .board .right_log .login .inp .sua");

myInput.forEach(function(input, index) {
  input.addEventListener("focus", function() {
    container[index].style.backgroundColor = "white";
  });

  input.addEventListener("blur", function() {
    container[index].style.backgroundColor = "rgb(255, 247, 242)";
  });
});


var regInput = document.querySelectorAll("main .board .right_log .register .inp .sua .input_form");
var regcontainer = document.querySelectorAll("main .board .right_log .register .inp .sua");

regInput.forEach(function(input, index) {
  input.addEventListener("focus", function() {
    regcontainer[index].style.backgroundColor = "white";
  });

  input.addEventListener("blur", function() {
    regcontainer[index].style.backgroundColor = "rgb(255, 247, 242)";
  });
});


// Lấy ra các phần tử với class "back" và "choose"
// const backButton = document.querySelector('main .board .right_log .login .back');
// const chooseDiv = document.querySelector('main .board .right_log .chosse');
// const login = document.querySelector('main .board .right_log .login');
// const golog = document.querySelector('main .board .right_log .chosse .log');
// golog.addEventListener('click', function() {
//     chooseDiv.style.display = 'none';
//     login.style.display = 'block';
// })
// // Thêm sự kiện click cho "back"
// backButton.addEventListener('click', function() {
//     login.style.display = 'none';
//     chooseDiv.style.display = 'block';
//     emailInput.value = "";
//     passwordInput.value = "";
//     checkInputs();
// });


const backreg = document.querySelector('main .board .right_log .register .back');
const register = document.querySelector('main .board .right_log .register');
const goreg = document.querySelector('main .board .right_log .chosse .reg');
goreg.addEventListener('click', function() {
    chooseDiv.style.display = 'none';
    register.style.display = 'block';
})
// Thêm sự kiện click cho "back"
backreg.addEventListener('click', function() {
    register.style.display = 'none';
    chooseDiv.style.display = 'block';
    regemailInput.value = "";
    regacc.value = "";
    regpasswordInput.value = "";
    regnameInput.value = "";
    regcheckInputs();
});



// const emailInput = document.getElementById('log_emailInput');
// const passwordInput = document.getElementById('log_passwordInput');
// const submitButton = document.getElementById('log_submitButton');

// emailInput.addEventListener('input', checkInputs);
// passwordInput.addEventListener('input', checkInputs);

// function checkInputs() {
//     const emailValue = emailInput.value;
//     const passwordValue = passwordInput.value;

//     if (emailValue.length > 0 && passwordValue.length > 0) {
//         // Đổi màu background-color của nút
//         submitButton.style.backgroundColor = 'rgb(255, 104, 0)';
//         submitButton.style.border = '1px solid rgb(255, 104, 0)';
//         submitButton.style.color = 'rgb(255, 255, 255)';
//         submitButton.removeAttribute('disabled');
//         submitButton.classList.remove("disabled-button");
//         submitButton.style.cursor = 'pointer';
//     } else {
//         // Reset màu background-color của nút
//         submitButton.style.backgroundColor = '';
//         submitButton.style.border = '';
//         submitButton.setAttribute('disabled', 'true');
//         submitButton.classList.add("disabled-button");
//         submitButton.style.cursor = '';
//     }
// }


const regemailInput = document.getElementById('reg_email');
const regacc = document.getElementById('reg_acc');
const regpasswordInput = document.getElementById('reg_pass');
const regnameInput = document.getElementById('reg_name');
const regsubmitButton = document.getElementById('reg_submitButton');

regemailInput.addEventListener('input', regcheckInputs);
regacc.addEventListener('input', regcheckInputs);
regpasswordInput.addEventListener('input', regcheckInputs);
regnameInput.addEventListener('input', regcheckInputs);

function regcheckInputs() {
    const regemailValue = regemailInput.value;
    const regaccValue = regacc.value;
    const regnameValue = regnameInput.value;
    const regpasswordValue = regpasswordInput.value;

    if (regemailValue.length > 0 && regaccValue.length > 0 && regnameValue.length > 0 && regpasswordValue.length > 0) {
        // Đổi màu background-color của nút
        regsubmitButton.style.backgroundColor = 'rgb(255, 104, 0)';
        regsubmitButton.style.border = '1px solid rgb(255, 104, 0)';
        regsubmitButton.style.color = 'rgb(255, 255, 255)';
        regsubmitButton.removeAttribute('disabled');
        regsubmitButton.classList.remove("disabled-button");
        regsubmitButton.style.cursor = 'pointer';
    } else {
        // Reset màu background-color của nút
        regsubmitButton.style.backgroundColor = '';
        regsubmitButton.style.border = '';
        regsubmitButton.setAttribute('disabled', 'true');
        regsubmitButton.classList.add("disabled-button");
        regsubmitButton.style.cursor = '';
    }
}




