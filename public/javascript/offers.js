    
// AJAX pour changer le contenu de la sidebar des offres
    const offers = document.querySelectorAll(".offers");
    const Title_offer = document.querySelector(".title_offer");
    const company_name = document.querySelector(".company_name");
    const locationElement = document.querySelectorAll(".location");
    const contract_type= document.querySelectorAll(".contract");
    const salary= document.querySelector(".salary");
    const description= document.querySelector(".description");
    
    offers.forEach(function(offer){
        offer.addEventListener("click", function(){

            // supprime la bordure de la classe selectionnée precedemment .
            offers.forEach(c =>{
                c.style.border ='';
            })

            // bordure de la card a la selection
            offer.style.border = '1px solid blue';
            offer.style.borderRadius = '10px';

            // changement du contenu de la sidebar par ajax
            const offer_id = this.getAttribute('data-offer-id');
            // console.log(offer_id);
            const url = '/offer-by-id/'+ offer_id;

            fetch(url, {
                method: 'GET',
                headers: {
                },
                credentials: 'same-origin'
            })
            .then(response=>{
                if(!response.ok){
                    throw Error('Error HTTP :'+ response.status);
                }
                return response.json()
            })
            .then(data =>{
                // console.log(data);
                if(data.offer){
                    Title_offer.innerHTML = data.offer.Title_offer
                    company_name.innerHTML = data.offer.Company_name
                    contract_type.innerHTML = data.offer.Contract_type
                    salary.innerHTML = data.offer.Salary_range;
                    description.innerHTML = data.offer.description;

                    // changement dynamqiue de l'id de l'offre en prenant l'id que je passe a travers l'ajax
                    const offer_ID= document.querySelector(".id_offer");
                    offer_ID.href = `http://127.0.0.1:8000/apply/${offer_id}`
                   

                    locationElement.forEach(function(element){
                        element.innerHTML = data.offer.Location
                    })
                    
                    contract_type.forEach(function(element){
                        element.innerHTML = data.offer.Contract_type
                    })
                }

            })
            .catch(error=>{
                console.log('Error in request for offerID:' + offer_id + ':' , error );
            })
        })
    })

    