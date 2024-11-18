
// modal window
    const modalWindow = document.querySelector('.modalWindow');
    const btnModal= document.querySelector('.btn-modal');
            
    btnModal.addEventListener('click', function(){
            openModel();
    })
        
     modalWindow.addEventListener('mouseleave', function(){
            closeModal();
    })
        
        
    function openModel(){
        modalWindow.classList.add('modal-visible');
         body.classList.add('no-scroll');
    }
        
    function closeModal(){
        modalWindow.classList.remove('modal-visible');
        body.classList.remove('no-scroll');
    }