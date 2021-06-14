//**Funzione preferiti */
const id_session=document.querySelector("#session").value;

function aggiungiPreferiti(event){
    const aux=event.currentTarget;
    
    const p=document.querySelector("#preferiti");
    p.classList.remove("hidden");
    p.classList.add("griglia");
    const titoloP=document.querySelector("#testoPref");
    titoloP.classList.remove("hidden");

   
    aux.src="../../images/preferito.ico";

    
    const div=document.createElement("div");
    const pref=document.createElement("img");
    const nome=document.createElement("h1");
    const foto=document.createElement("img");

   
    pref.classList.add("preferito");
    pref.dataset.idCroce=aux.dataset.idPref;
    div.id=aux.dataset.idPref;
   
    
    fetch("../../veicoli/nome/"+nomeConc).then(onResponse).then(onJsonPrefe);
    function onJsonPrefe(json){
        console.log(id_session);
        console.log(" id session");
        for(i=0;i<json.length;i++){
            if(json[i].CODICE==aux.dataset.idPref){
                nome.textContent=json[i].NOME;
                pref.src="../../images/Imageres_dll_161.ico";
                foto.src=json[i].url_img;
                fetch("../../aggiungi_preferiti/data_id/"+aux.dataset.idPref+"/nome/"+nomeConc);
            }
        }
      
        p.appendChild(div);
        div.appendChild(nome);
        div.appendChild(pref);
        div.appendChild(foto);
   
        aux.removeEventListener("click",aggiungiPreferiti);
        pref.addEventListener("click",rimuoviPreferito);
    }
    
    
}
function jsonPrefe(json){
    if(json.length!==0){
        console.log(json)
        const p=document.querySelector("#preferiti");
        p.classList.remove("hidden");
        p.classList.add("griglia");
        const titoloP=document.querySelector("#testoPref");
        titoloP.classList.remove("hidden");

        for(i=0;i<json.length;i++){
            const div=document.createElement("div");
            const pref=document.createElement("img");
            const nome=document.createElement("h1");
            const foto=document.createElement("img");

            pref.classList.add("preferito");
            pref.dataset.idCroce=json[i].id_pref;
            div.id=json[i].id_pref;
            pref.src="../../images/Imageres_dll_161.ico";
            nome.textContent=json[i].nome;
            foto.src=json[i].url_img;

            p.appendChild(div);
            div.appendChild(nome);
            div.appendChild(pref);
            div.appendChild(foto);
            json[i].id_pref
            const star=document.querySelector("[data-id-pref='"+json[i].id_pref+"']");
            
            star.removeEventListener("click",aggiungiPreferiti);
            star.src="../../images/preferito.ico";
            pref.addEventListener("click",rimuoviPreferito);
        }
    }
}



//**Funzione rimuovi preferiti */
function rimuoviPreferito(event){
    const aux=event.currentTarget;
    
    const sec=document.querySelector("#preferiti");
    const star=document.querySelectorAll("[data-id-pref]");
    
    var c=sec.childElementCount; 
  
    const box=aux.parentNode;
 
    if(c==1){
        box.remove("div");
        sec.classList.add("hidden");
        const titoloP=document.querySelector("#testoPref");
        titoloP.classList.add("hidden");
    }else{
        box.remove("div");
    }
    for(let i=0;i<star.length;i++){
        if (star[i].dataset.idPref===aux.dataset.idCroce){
            star[i].src="../../images/non-preferito.jpg";
            star[i].addEventListener("click",aggiungiPreferiti);
            fetch("../../rimuovi_preferiti/data_id/"+star[i].dataset.idPref+"/nome/"+nomeConc);
        }
    }
}

//**Funzione di ricerca*/
function ricerca(event){
    var input; 
    var maiusc;
    var section;
    var div;
    var titoli;
    var i;
    var testo;

    input=event.currentTarget;

    maiusc=input.value.toUpperCase();
   
    section=document.getElementById("id-griglia");
    div=section.getElementsByTagName("div");
    
    for(let i=0;i<div.length;i++){
        
        titoli=section.getElementsByTagName("h1")[i];
       
        if(titoli){
        
            testo=titoli.textContent || titoli.innerText;
            
            if(testo.toUpperCase().indexOf(maiusc)>-1){
                div[i].style.display="";
            }else{
                div[i].style.display="none";
            }   
        }
    }
}
const input=document.querySelector("#box-ricerca");
input.addEventListener("keyup",ricerca);


//**Funzione mostra dettagli*/
function maggioriDettagli(event) {
    const a = event.currentTarget;

    a.querySelector("a").textContent = "Meno informazioni";

    a.removeEventListener("click", maggioriDettagli);
    a.addEventListener("click", minoriDettagli);

    const p=a.querySelector("p");
    p.classList.remove("hidden");
    p.classList.add("dett");
}
//**Funzione nascondi dettagli*/
function minoriDettagli(event) {
    const a = event.currentTarget;

    a.querySelector("a").textContent = "Più informazioni";

    a.removeEventListener("click", minoriDettagli);
    a.addEventListener("click", maggioriDettagli);

    const p=a.querySelector("p");
    p.classList.remove("dett");
    p.classList.add("hidden");
}

//**Ciclo for che riempie dinamicamente la pagina con i vari elementi,prendendo i dati dal database */
function onJSON(json){
    console.log(json);
    document.querySelector("#logo").src="../../"+json[0].img_conc;
    for(i=0;i<json.length;i++){
        const sec=document.querySelector(".griglia");
        const div=document.createElement("div");
        const pref=document.createElement("img");
        const nome=document.createElement("h1");
        const img=document.createElement("img");
        const pulsante=document.createElement("span");
        const text=document.createElement("p");
        const a=document.createElement("a");
    

        pulsante.dataset.id=i;
        pulsante.classList.add("tasto");
        pref.dataset.idPref=json[i].CODICE;
        pref.classList.add("preferito");
    
        text.classList.add("hidden");
        
        
        pref.src="../../images/non-preferito.jpg";
        nome.textContent=json[i].NOME+" "+json[i].MODELLO;
        img.src=json[i].url_img;
        a.textContent="Più informazioni";
        text.textContent=json[i].descrizione;
    
      
        pulsante.addEventListener("click", maggioriDettagli);
        const loggato=document.querySelector("#isLog").value;
        if(loggato==true){
            pref.removeEventListener("click",allert);
            pref.addEventListener("click",aggiungiPreferiti);
        }else{
            pref.addEventListener("click",allert);
        }
        
        sec.appendChild(div);
        div.appendChild(nome);
        div.appendChild(pref);
        div.appendChild(img);
        div.appendChild(pulsante);
        pulsante.appendChild(text);
        pulsante.appendChild(a);
    }
    if(id_session!==''){
        fetch("../../carica_preferiti/nomeConc/"+nomeConc).then(onResponse).then(jsonPrefe);
    }
}

function allert(){
   alert("Per aggiungere un veicolo ai preferiti devi effettuare il login");
}
function onResponse(response){
    if (!response.ok) {
        return null
    };
    return response.json();
}

const h1=document.querySelector("header h1");
const nomeConc=h1.textContent; 
fetch("../../veicoli/nome/"+nomeConc).then(onResponse).then(onJSON);





/**
 * !URLO DEL SIUM 
 * */
function vamoRaga(event){
    event=event.currentTarget;
    console.log(event.value)
    if(event.value.toUpperCase()==="URLO DEL SIUM"){
        window.location.replace("https://youtu.be/ICSIf738odk");
    }
}
const sium=document.querySelector("#box-ricerca");
sium.addEventListener("keyup",vamoRaga)