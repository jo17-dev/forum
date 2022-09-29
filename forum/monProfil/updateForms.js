var changeName = document.querySelectorAll(".actions .changeName button"),
    changeNameForm = document.querySelectorAll(".actions .changeName form"),
    changePassAndProfil = document.querySelectorAll(".actions .user_identification .changePass button"),
    changePassAndProfilForm = document.querySelectorAll(".actions .user_identification .changePass form");
/*
changeName et changePassAndProfil contient les boutons qui vont perettre d'afficher ou masquer les elements
changeNameForm et changePassAndProfilForm contient les formulaires qui vont êtres affichés ou non

l'ors du clic sur chaque bouton, on verifie si le formulaire
qui lui est associé: si il est masqué, on l'affiche,
et vis-versa
*/
for(let i=0; i<2; i++){
    changeName[i].addEventListener("click", function(){
        if(changeNameForm[i].style.display == "block"){
            changeNameForm[i].style.display = "none";
        }else{
            changeNameForm[i].style.display = "block";
        }
    })

    changePassAndProfil[i].addEventListener("click", function(){
        if(changePassAndProfilForm[i].style.display == "block"){
            changePassAndProfilForm[i].style.display = "none";
        }else{
            changePassAndProfilForm[i].style.display = "block";
        }
    })

}