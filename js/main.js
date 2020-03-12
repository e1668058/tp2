let collectionBtnNouvelle = document.querySelectorAll(".bn");
// let collectionNouvelle = 
// console.log(collectionBtnNouvelle.length);
if (collectionBtnNouvelle)
{
    for (let btn of collectionBtnNouvelle){
            // console.log(btn.id);
            btn.addEventListener('click',Ajax);
    }
}


function Ajax(evt) {
    
    //  instructions ici

    let maRequete = new XMLHttpRequest();
    // console.log(maRequete) http://localhost/allen_veille2/wp-json/wp/v2/categories/1
    maRequete.open('GET', 'http://localhost/allen_veille2/wp-json/wp/v2/posts/'+ evt.target.id);
    maRequete.onload = function () {
        console.log(maRequete)
        if (maRequete.status >= 200 && maRequete.status < 400) {
            let data = JSON.parse(maRequete.responseText);
            // console.log(data.excerpt.rendered);
            // console.log(evt.target.dataset.checked)
            // console.log(evt.target.id);
            // instructions ici
            //Le bouton
            let contenu = document.getElementById(evt.target.id);
            //Le div 
            let idContenu = document.getElementById(evt.target.id + "1");
            //Les div qui contiennent le texte
            let allContenu = document.querySelectorAll(".cont");
            if (idContenu.innerHTML == "") {
                allContenu.forEach((e)=> {
                    e.innerHTML = "";
                }) 
                creationHTML(data, idContenu);
            }
            else {
                idContenu.innerHTML = "";
            }
            
              // paramètres à ajouter
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

function creationHTML(postsData, idContenu){
    let monHtmlString = postsData.content.rendered;
    
    // for (elm of postsData) {
    //     monHtmlString += '<h2>' + elm.title.rendered + '</h2>';
    //     monHtmlString += elm.content.rendered;
    // }
    // console.log(monHtmlString);

    // let theValue = contenu.getAttribute("value");
    // if (theValue == 1) {
        idContenu.innerHTML += monHtmlString;
        // contenu.setAttribute(value, 0);
    // }
    // else {
    //     contenu.setAttribute("value", 0);
    //     let contenu = document.querySelectorAll(".cont");
    //     contenu.innerHTML = " "; 
    // }
}

