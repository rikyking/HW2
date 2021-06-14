function onResponse(response){
    return response.json();
}
function onJSONVIN(json){
    console.log(json)
    
    const art=document.querySelector("#contenuti")
    const ul=document.createElement("ul")
    const li1=document.createElement("li")
    const li2=document.createElement("li")
    const li3=document.createElement("li")
    const li4=document.createElement("li")
    const li5=document.createElement("li")
    const li6=document.createElement("li")

    li1.textContent="Produttore: "+json.make;
    li2.textContent="Modello: "+json.model;
    li3.textContent="Stile: "+json.style;
    li4.textContent="Anno produzione: "+json.year
    li5.textContent="Paese di produzione: "+json.made_in
    li6.textContent="Posti a sedere: "+json.standard_seating
    
    ul.appendChild(li1);
    ul.appendChild(li2);
    ul.appendChild(li3);
    ul.appendChild(li4);
    ul.appendChild(li5);
    ul.appendChild(li6);
    art.appendChild(ul);
}
function decodeVIN(event){
    event.preventDefault();
    const inputVIN=document.querySelector("#VIN").value;
    if(!inputVIN){
        alert("Devi inserire un codice VIN");
    }
    const VIN=encodeURIComponent(inputVIN);
    fetch("VIN/decode/"+VIN).then(onResponse).then(onJSONVIN);
}
const serchVIN=document.querySelector("form");
serchVIN.addEventListener("submit",decodeVIN);

//test 4F2YU09161KM33122

function reload(){
    const sec=document.querySelector("#contenuti");
    sec.innerHTML='';
    document.querySelector("#VIN").value=''
}

const rel=document.querySelector("#reload");
rel.addEventListener("click",reload);