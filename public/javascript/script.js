document.addEventListener('DOMContentLoaded', function(){

    // // sidebar
    // window.onscroll = () => {
    //     const sidebar_content = document.querySelector('.content'); 
    //     const sidebar = document.querySelector('.sidebar');  
    //     // let scrollTop = window.scrollY;
    //     let sidebarTop = sidebar.getBoundingClientRect().top;  
    
    //     if (sidebarTop <= 0) {
    //         sidebar_content.style.position = 'fixed';
    //         sidebar_content.style.top = '0'; 
    //     } else {
    //         sidebar_content.style.position = ''; 
    //         sidebar_content.style.top = '';  
    //     }
    // };

    const  burger_remove =document.querySelector('.burger_remove')
    const  sidebar_menu =document.querySelector('.sidebar_menu')
    const  burger =document.querySelector('.burger')

    burger.addEventListener('click', function(e){
        sidebar_menu.classList.toggle('visible')
    })

    burger_remove.addEventListener('click', function(e){
        sidebar_menu.classList.toggle('visible')
    })

    // int phone number
    const phone_number= document.querySelector('#phone_number');
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");

    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

     // initialise plugin
     const iti = window.intlTelInput(phone_number, {
        initialCountry: "fr",
        loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/utils.js",
      });
    
    const reset = () => {
        phone_number.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };
    
    const showError = (msg) => {
        phone_number.classList.add("error");
        errorMsg.innerHTML = msg;
        errorMsg.classList.remove("hide");
    };
    
    // on click button: validate
    phone_number.addEventListener('blur', (event) => {
        // i remove everything that is not a number
        event.target.value = event.target.value.replace(/\D/g, '');

        reset();
        if (!phone_number.value.trim()) {
        showError("Required");
        } else if (iti.isValidNumberPrecise()) {
        validMsg.classList.remove("hide");
        } else {
        const errorCode = iti.getValidationError();
        const msg = errorMap[errorCode] || "Invalid number";
        showError(msg);
        }
    });
    
    // on keyup / change flag: reset
    phone_number.addEventListener('change', reset);


})


