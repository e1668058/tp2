let collectionBtnNouvelle = document.getElementsByClassName("bn");
// let collectionNouvelle = 
console.log(collectionBtnNouvelle);
if (collectionBtnNouvelle)
{
    for (let btn of collectionBtnNouvelle){
            console.log(btn.id)
            btn.addEventListener('click',Ajax)
    }
}


function Ajax(evt) {
    
    //  instructions ici

    let maRequete = new XMLHttpRequest();
    // console.log(maRequete)
    maRequete.open('GET', 'http://localhost/2020-veille/wp-json/wp/v2/posts)');
    maRequete.onload = function () {
        console.log(maRequete)
        if (maRequete.status >= 200 && maRequete.status < 400) {
            let data = JSON.parse(maRequete.responseText);
            console.log(evt.target.dataset.checked)
            // instructions ici
            creationHTML(data);  // paramètres à ajouter
        } else {
            console.log('La connexion est faite mais il y a une erreur')
        }
    }
    maRequete.onerror = function () {
        console.log("erreur de connexion");
    }
    maRequete.send();
    

    // instructions à ajouter
    
}
///////////////////////////////////////////////////////

function creationHTML(postsData){
    let monHtmlString = '';
    for (elm of postsData) {
        monHtmlString += '<h2>' + elm.title.rendered + '</h2>'
        monHtmlString += elm.content.rendered;
    }
    contenuNouvelle.innerHTML = monHtmlString; 
}




