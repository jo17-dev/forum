var like = document.querySelectorAll('.like'),
    nbrelike = document.querySelectorAll('.nbre_likes'),
    like_longeur = 0,
    id_post = document.querySelectorAll('.post_info .id_post');
    
console.log(id_post[0]);
console.log("Longeur "+id_post[0].innerHTML.length)
console.log("valuer "+id_post[0].innerHTML)

// fonction sui permet de recuperer (Avec le type entier) le nbre de likes actuels du like sur le quel on 
function get_nbre_likes(i){
    var t = nbrelike[i].innerHTML;
    var y = parseInt(t);
    return y;
}

// permet de calculer le nombre de posts présents
like.forEach(item => {
    like_longeur++;
});

console.log(like_longeur)

var liker = function (i){
    console.log("liké");

    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function (){
        console.log(this.status);
        if(this.readyState == 4 && this.status == 200){
            // reception des données
            console.log(this.responseText);
        }
    }
    var new_like_nbre = get_nbre_likes(i);
    new_like_nbre++;
    xhr.open("GET", "../posts/systeme_de_like.php?new_like_nbre="+new_like_nbre+"&id_post="+id_post[i].innerHTML, true);
    xhr.send();
    nbrelike[i].innerHTML = new_like_nbre;
}

// Ajout de l'venement du click pour liker

for (let i = 0; i < like_longeur; i++) {
    like[i].addEventListener("click", function(){
        liker(i);
    });
}