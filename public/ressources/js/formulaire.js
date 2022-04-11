window.addEventListener("DOMContentLoaded", (event) => {





    console.log("DOM entièrement chargé et analysé");
   




  

  const form = document.getElementById('missionAdd');
  const pages = document.querySelectorAll('.page');
  const Headers = document.querySelector('.header-form');
  const nbPages = pages.length;
  const submit = document.querySelector('.submit');
  const page1 = document.getElementById('page1');
  const page2 = document.getElementById('page2');
  const page3 = document.getElementById('page3');
  let pageActive = 0;

  // On affiche la 1ere page  par défaut
window.onload = () => {
   for(let page of pages){
    page.style.display = 'none';
  }
 document.querySelector('.page').style.display = 'block';


    // On gère sur les boutons "suivant"
    let boutons = document.querySelectorAll('.button-page');
    for(bouton of boutons){
      bouton.addEventListener('click', pageSuivante);
    }

function pageSuivante(){
  pageActive++;
  
   for(let page of pages){
    page.style.display = 'none';
   }
   pages[pageActive].style.display = 'block';
    
  }// fin pageSuivante


   
   
   // on gère les boutons " precedent" 
    let boutonsPrecedent = document.querySelectorAll('.button-page-precedent');
    for(bouton of boutonsPrecedent){
      bouton.addEventListener('click', pagePrecedente);
    }
    function pagePrecedente(){
     pageActive--;
     
      for(let page of pages){
      page.style.display = 'none';
      }
      pages[pageActive].style.display = 'block';
    

      }
      

  
    
    }
 

form.addEventListener('click', function(event){
    event.preventDefault();
    console.log("Formulaire soumis");
    
    const formattedFormData = new FormData(form);
    postData(formattedFormData);
});

async function postData(formattedFormData){
  let url = window.location.href;
    const response = await fetch(url,{
        method: 'POST',
        body: formattedFormData
    });

    const data = await response.text();
    
    console.log(data);
}
    
   
});// fin de la fonction d'écoute de l'événement DOMContentLoaded
