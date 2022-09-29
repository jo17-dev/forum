let finalRender = document.getElementById('root');

var dico = [];

class Rubrique
{
    constructor(nomImg, nom, type, tailZip, tail, auteur, Ldownload){
        this.Limg ="./img/"+nomImg;
        this.nom = nom;
        this.type = type;
        this.tailZip = tailZip;
        this.tail = tail;
        this.auteur = auteur;
        this.Ldownload = Ldownload;
    }

    creer(){
        let section = document.createElement("section");
        section.setAttribute("class", "item");

        let img = document.createElement("img");
        img.setAttribute("src", this.Limg);
        img.setAttribute("alt", this.nom);

        let ul = document.createElement("ul");
        let li = [document.createElement("li"), 
        document.createElement("li"),
        document.createElement("li"),
        document.createElement("li"),
        document.createElement("li"),];

        li[0].innerHTML = "Nom: <g>"+ this.nom +"</g>";
        li[1].innerHTML = "Type de jeu: <g>"+ this.type +"</g>";
        li[2].innerHTML = "Taille compresee: <g>"+ this.tailZip +"</g>";
        li[3].innerHTML = "Taille decompressee: <g>"+ this.tail +"</g>";
        li[4].innerHTML = "Auteur du jeu: <g>"+ this.auteur +"</g>";

        let bouton = document.createElement("button");
        bouton.innerHTML = " <a href="+ this.Ldownload +"> Telecharger "+ this.nom+ " </a>";

        let i=0;
        while(i<li.length){
            ul.appendChild(li[i]);
            i++;
        }
        
        section.appendChild(img);
        section.appendChild(ul);
        section.appendChild(bouton);
        finalRender.appendChild(section);
    }
}

godOfWar = new Rubrique("god_of_war.png", "God of war III", "Action - Aventure", "174 MB", "280 MB", "S.N.K", "img/god_of_war.png");
pes2020 = new Rubrique("pes2020.png", "PES 2020", "Sport", "170 MB", "370 MB", "Game scientist", "img/pes2020.png");

pes2020.creer();
godOfWar.creer();
godOfWar.creer();
godOfWar.creer();
godOfWar.creer();
godOfWar.creer();
godOfWar.creer();
godOfWar.creer();
godOfWar.creer();
/**
 * Pour construire une Rubrique, on a:
 * 1--- Nom.extention de son Image
 * 2--- Nom du jeu
 * 3--- Type de jeu
 * 4--- Taille Compressée
 * 5--- Taille Decompressée
 * 6--- Nom Auteur
 * 7--- Lien de telechargement
 */


//================ ICi on gere la zone de recherche


dico = document.querySelectorAll('#root .item ul li g');
var dico_elt = document.querySelectorAll('#root .item');
console.log(dico_elt[0])
console.log(dico[0].innerHTML)

var btn = document.getElementById('button'),
search = document.getElementById('search');


search.addEventListener("keyup", function(){
 var 
     longeur_search = search.value.length,
     longeur_dico = dico[0].innerHTML.length,
     longeur_dico_elt = dico_elt.length,
     i=0,
     j=0,
     is_find=0;
 console.log(search.value);
 console.log(longeur_search);console.log(longeur_dico)

if(longeur_search == 0){
 // On revient a la normale
 
    for(j=0; j<longeur_dico_elt; j++){
        dico_elt[j].style.display = "block";
    }
}else{
 

    for(j=0; j<longeur_dico_elt; j++){
        dico_elt[j].style.display = "none";
    }


for(j=0; j<longeur_dico; j++){
 for(i=0; i<longeur_search; i++){
     if(search.value.charAt(i).toUpperCase() == dico[j].innerHTML.charAt(i).toUpperCase()){
         is_find++;
     }
 }

 if(is_find == longeur_search){
    dico_elt[j].style.display = "block";
 }

 is_find = 0;
}
}


})