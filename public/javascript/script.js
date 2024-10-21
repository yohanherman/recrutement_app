document.addEventListener('DOMContentLoaded', function(){

    const  burger_remove =document.querySelector('.burger_remove');
    const  sidebar_menu =document.querySelector('.sidebar_menu');
    const  burger =document.querySelector('.burger');
    const  overlay =document.querySelector('.overlay');
    const body = document.querySelector('body');

    function openMenu(){
        sidebar_menu.classList.add('visible_menu');
        overlay.classList.add('visible_overlay');
        body.classList.add('no-scroll');

    }

    function closeMenu() {
        sidebar_menu.classList.remove('visible_menu');
        overlay.classList.remove('visible_overlay');
        body.classList.remove('no-scroll');
    }

    burger.addEventListener('click', function(e){
        openMenu();
    })

    burger_remove.addEventListener('click', function(e){
        closeMenu();
    })

    overlay.addEventListener('click',function(e){
        closeMenu();
    })


    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            closeMenu(); 
        }
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


