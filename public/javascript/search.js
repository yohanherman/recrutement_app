const position = document.querySelector('.position')
const localization = document.querySelector('.localization')
// const cleanField = document.querySelectorAll('.fa-xmark')
btn1 = document.querySelector('.erasePosition')
btn2 = document.querySelector('.eraseLocalization')

btn1.addEventListener('click', function(){
    position.value = '';
})

btn2.addEventListener('click', function(){
    localization.value = '';
})

