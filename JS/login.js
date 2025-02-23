'use strict';

/** Animations **/

const signInBtn = document.querySelector("#sign-in-btn");
const signUpBtn = document.querySelector("#sign-up-btn");
const signInBtn2 = document.querySelector("#sign-in-btn2");
const signUpBtn2 = document.querySelector("#sign-up-btn2");
const container = document.querySelector(".container");

signUpBtn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
})
signInBtn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
})
signUpBtn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
})
signInBtn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
})

/** Notifications **/

const buttonRegister = document.querySelector("#button-register");
const iconFacebook = document.querySelector("#icon-facebook");
const iconInstagram = document.querySelector("#icon-instagram");
const iconTwitter = document.querySelector("#icon-twitter");
const iconGoogle = document.querySelector("#icon-google");
const iconFacebook2 = document.querySelector("#icon-facebook2");
const iconInstagram2 = document.querySelector("#icon-instagram2");
const iconTwitter2 = document.querySelector("#icon-twitter2");
const iconGoogle2 = document.querySelector("#icon-google2");

buttonRegister.addEventListener("click", () => {
    Toastify({
        text: "Cadastro efetuado com sucesso!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#1B61CC",
        },
    }).showToast();
});

iconFacebook.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});

iconInstagram.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});

iconTwitter.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});

iconGoogle.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});

iconFacebook2.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});

iconInstagram2.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});

iconTwitter2.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});

iconGoogle2.addEventListener("click", () => {
    Toastify({
        text: "Essa funcionalidade está em manutenção!",
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: "#FF2134",
        },
    }).showToast();
});