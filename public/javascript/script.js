document.addEventListener('DOMContentLoaded', function(){

    const  burger_remove =document.querySelector('.burger_remove');
    const  sidebar_menu =document.querySelector('.sidebar_menu');
    const  burger =document.querySelector('.burger');
    const  overlay =document.querySelector('.overlay');
    const  searchbar =document.querySelector('.searchbar');
    const body = document.querySelector('body');
    // console.log(body)



    // navbar responsive
    function openMenu(){
        sidebar_menu.classList.add('visible_menu');
        overlay.classList.add('visible_overlay');
        body.classList.add('no-scroll');
        searchbar.style.opacity='0.5';
        searchbar.style.pointerEvents = 'none';
    }

    function closeMenu() {
        sidebar_menu.classList.remove('visible_menu');
        overlay.classList.remove('visible_overlay');
        body.classList.remove('no-scroll');
        searchbar.classList.remove('searchbar');
        searchbar.style.opacity='1';
        searchbar.style.pointerEvents = 'auto';
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



    
   

    // // modal window
    // const modalWindow = document.querySelector('.modalWindow');
    // const btnModal= document.querySelector('.btn-modal');
    
    // btnModal.addEventListener('click', function(){
    //     openModel();
    // })

    // modalWindow.addEventListener('mouseleave', function(){
    //     closeModal();
    // })


    // function openModel(){
    //     modalWindow.classList.add('modal-visible');
    //     body.classList.add('no-scroll');
    // }

    // function closeModal(){
    //     modalWindow.classList.remove('modal-visible');
    //     body.classList.remove('no-scroll');
    // }

    

})
