let contactBtn = document.querySelectorAll('nav #responsive-content .liens ul li a'),
    contactList = document.getElementById('contact');

// bouton contact de la page de d'acceuil
contactBtn[1].addEventListener("click", function(){
    if(contactList.style.display == "block"){  
        contactList.style.display = "none";
    }else{    
        contactList.style.display = "block";
    }
    
})
contactList.addEventListener("mouseleave", function(){
    contactList.style.display = "none";
})

