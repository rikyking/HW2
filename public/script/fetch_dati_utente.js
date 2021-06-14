function onResponse(response){
    return response.json();
}
function jsonSpesa(json){
    var spesaTotale=0;
    const saldo=document.createElement("h1");
    const div=document.querySelector(".tabella")
    console.log(json)
    if(json[0].Spesa_totale==null){
        saldo.textContent="Spesa totale "+ 0 +" €";
        div.appendChild(saldo)
    }else{
        spesaTotale=parseFloat(json[0].Spesa_totale).toFixed(2);
        saldo.textContent="Spesa totale "+spesaTotale+" €";
        div.appendChild(saldo)
    }
}
function onJSON(json){
    console.log(json);
    const art=document.querySelector("#sezione");
    art.innerHTML='';
    art.classList.remove("hidden");
    art.classList.add("sezione");

    const div=document.createElement("div");
    div.classList.add("tabella");

    const tabella=document.createElement("table");
    var tblBody = document.createElement("tbody");
    const tr0=document.createElement("tr");

    var nome0=document.createElement("th")
    const nome0Text=document.createTextNode("Nome")
    nome0.appendChild(nome0Text)
    var modello0=document.createElement("th")
    const modello0Text=document.createTextNode("Modello")
    modello0.appendChild(modello0Text)
    var Prezzo0=document.createElement("th")
    const Prezzo0Text=document.createTextNode("Prezzo")
    Prezzo0.appendChild(Prezzo0Text)
    var conc0=document.createElement("th")
    const conc0Text=document.createTextNode("Presso")
    conc0.appendChild(conc0Text)
    var data0=document.createElement("th");
    const data0Text=document.createTextNode("Data acquisto");
    data0.appendChild(data0Text)

    tr0.appendChild(nome0)
    tr0.appendChild(modello0)
    tr0.appendChild(Prezzo0)
    tr0.appendChild(conc0)
    tr0.appendChild(data0)
    tblBody.appendChild(tr0)
    tr0.id="rigo1";
    for(let i=0; i<json.length; i++){
        var row=document.createElement("tr");
        var nome=document.createElement("td");
        const nomeText=document.createTextNode(json[i].Nome)
        nome.appendChild(nomeText)
        var modello=document.createElement("td")
        const modelloText=document.createTextNode(json[i].Modello)
        modello.appendChild(modelloText)
        var Prezzo=document.createElement("td")
        const prezzoText=document.createTextNode(json[i].Prezzo)
        Prezzo.appendChild(prezzoText)
        var conc=document.createElement("td")
        const concText=document.createTextNode(json[i].Concessionario)
        conc.appendChild(concText)
        var data=document.createElement("td")
        const dataText=document.createTextNode(json[i].data)
        data.appendChild(dataText)
        
        row.appendChild(nome)
        row.appendChild(modello)
        row.appendChild(Prezzo)
        row.appendChild(conc)
        row.appendChild(data)
        tblBody.appendChild(row)
    }
    
    tabella.appendChild(tblBody)
    div.appendChild(tabella)
    fetch("spesa_totale").then(onResponse).then(jsonSpesa);
    art.appendChild(div)
}

function onjsonListaAuto(json){
    console.log(json);
    const art=document.querySelector("#sezione");
    art.innerHTML='';
    art.classList.remove("hidden");
    art.classList.add("sezione");
    
    const div=document.createElement("div");
    div.classList.add("tabella");

    const tabella=document.createElement("table");
    var tblBody = document.createElement("tbody");
    const tr0=document.createElement("tr");
    var codice0=document.createElement("th")
    const codice0Text=document.createTextNode("Codice")
    codice0.appendChild(codice0Text)
    var nome0=document.createElement("th")
    const nome0Text=document.createTextNode("Nome")
    nome0.appendChild(nome0Text)
    var modello0=document.createElement("th")
    const modello0Text=document.createTextNode("Modello")
    modello0.appendChild(modello0Text)
    var Prezzo0=document.createElement("th")
    const Prezzo0Text=document.createTextNode("Prezzo")
    Prezzo0.appendChild(Prezzo0Text)
    var disp0=document.createElement("th")
    const disp0Text=document.createTextNode("Disponibilità")
    disp0.appendChild(disp0Text)

    tr0.appendChild(codice0)
    tr0.appendChild(nome0)
    tr0.appendChild(modello0)
    tr0.appendChild(Prezzo0)
    tr0.appendChild(disp0)
    tblBody.appendChild(tr0)
    tr0.id="rigo1";
    /**
     * ?CREAZIONE FORM
     */
    const form=document.createElement("form")

    form.action="compra_auto"
    form.name="form_acquisti"
    var csrf = document.createElement('input');
    csrf.setAttribute("name","_token");
    csrf.setAttribute("type","hidden");
    csrf.setAttribute("value","{{ Session::token() }}")
    csrf.id='csrf'
    form.appendChild(csrf);
    const cf_input=document.createElement("input")
    cf_input.type="text"+""
    cf_input.placeholder="Codice fiscale"
    cf_input.name="cf_input"
    cf_input.id="CF";
    cf_input.setAttribute("maxlength",7);
   
    const codice_input=document.createElement("select")
    codice_input.name="codici"
    for(let i=0; i<json.length; i++){
        var row=document.createElement("tr");
        const option=document.createElement("option")
        option.textContent=json[i].CODICE;
        codice_input.appendChild(option);

        var codice=document.createElement("td");
        const codiceText=document.createTextNode(json[i].CODICE)
        codice.appendChild(codiceText)
        var nome=document.createElement("td");
        const nomeText=document.createTextNode(json[i].NOME)
        nome.appendChild(nomeText)
        var modello=document.createElement("td")
        const modelloText=document.createTextNode(json[i].MODELLO)
        modello.appendChild(modelloText)
        var Prezzo=document.createElement("td")
        const prezzoText=document.createTextNode(json[i].prezzo)
        Prezzo.appendChild(prezzoText)
        var disp=document.createElement("td")
        const dispText=document.createTextNode(json[i].QUANTITA_DISPONIBILI)

        disp.appendChild(dispText)
        
        row.appendChild(codice)
        row.appendChild(nome)
        row.appendChild(modello)
        row.appendChild(Prezzo)
        row.appendChild(disp)
        tblBody.appendChild(row)
    }
    const divForm=document.createElement("div")
    divForm.classList.add("loginForm")
    const sub=document.createElement("input");
    sub.type="submit"
    sub.value="Acquista"
    sub.name="submit"
    sub.id="invio"
    const titolo=document.createElement("h1");
    titolo.textContent="Inserisci il tuo codice fiscale e il codice del veicolo da acquisatre"
    form.appendChild(cf_input);
    form.appendChild(codice_input)
    form.appendChild(sub)

    tabella.appendChild(tblBody)
    divForm.appendChild(titolo)
    divForm.appendChild(form);
    
    div.appendChild(tabella)
    div.appendChild(divForm)
    art.appendChild(div)
    document.querySelector("#CF").addEventListener("blur",checkCF);
}

function fetchResponse(response) {
    return response.json();
}

function jsonCheckCF(json){
    console.log(json)
    if (json.exists==true) {
        document.querySelector("#invio").disabled = false;
        document.querySelector('#CF').classList.remove('error');
        const titoloErrore=document.querySelector('.loginForm h1');
        titoloErrore.textContent ="Inserisci il tuo codice fiscale e il codice del veicolo da acquisatre";  
    } else {
        document.querySelector("#invio").disabled = true;
        const titoloErrore=document.querySelector('.loginForm h1');
        titoloErrore.textContent ="Il CF non corrisponde a quello dell'utente loggato";  
        document.querySelector('#CF').classList.add("error")
    }
}

function jsonCFSconto(json){
    console.log(json)
    if (json.exists==true) {
        document.querySelector("#invio").disabled = false;
        const titoloErrore=document.querySelector('.loginForm h1');
        titoloErrore.textContent ="Richiedi sconto";  
        document.querySelector('#CF').classList.remove('error');
        document.querySelector("#invio").addEventListener("click",effettuaSconto)
    } else {
        document.querySelector("#invio").disabled = true;
        const titoloErrore=document.querySelector('.loginForm h1');
        titoloErrore.textContent ="Il CF non corrisponde a quello dell'utente loggato o non hai diritto allo sconto";  
        document.querySelector('#CF').classList.add("error")
    }
}

function checkCF(event){
    const input=event.currentTarget;
    console.log(input.value)
    if(!/^[a-zA-Z0-9]{7,7}$/.test(input.value)) {
        alert("CF non valido")
        document.querySelector("#invio").disabled = true;
    } else {
        document.querySelector("#invio").disabled = false;
        fetch("checkCf/cf/"+encodeURIComponent(input.value)).
        then(fetchResponse).then(jsonCheckCF);
    }  
} 
function checkCFSconto(event){
    const input=event.currentTarget;
    console.log(input.value)
    if(!/^[a-zA-Z0-9]{7,7}$/.test(input.value)) {
        alert("CF non valido")
        document.querySelector("#invio").disabled = true;
    } else {
        document.querySelector("#invio").disabled = false;
        fetch("checkSconto/cf/"+encodeURIComponent(input.value)).
        then(fetchResponse).then(jsonCFSconto);
    }  
} 


function acquistiUtente(event){
    fetch("storico_acquisti").then(onResponse).then(onJSON);
}

function compraVeicolo(event){
    fetch("stampa_auto").then(onResponse).then(onjsonListaAuto)
}
function effettuaSconto(){
    const input=document.querySelector("#CF").value;
    console.log(input)
    fetch("sconto/cf/"+input);    
}

function richiediSconto(){
    const art=document.querySelector("#sezione");
    art.innerHTML='';
    art.classList.remove("hidden");
    art.classList.add("sezione");
    
    const divForm=document.createElement("div")
    divForm.classList.add("loginForm")
    const form=document.createElement("form")
    form.name="form_acquisti"
    const cf_input=document.createElement("input")
    form.action="sconto"
    cf_input.type="text"
    cf_input.placeholder="Codice fiscale"
    cf_input.name="cf_input"
    cf_input.id="CF";
    cf_input.addEventListener("blur",checkCFSconto)
    cf_input.setAttribute("maxlength",7);
    const sub=document.createElement("input");
    sub.type="submit"
    sub.value="Richiedi"
    sub.name="submit"
    sub.id="invio"
    const h1=document.createElement("h1");
    h1.textContent="Richiedi sconto";
    const p=document.createElement("p");
    p.textContent="Richiedi uno sconto del 15 % se hai meno di 30 anni o del 30 % se hai più di 60 anni";

    var csrf = document.createElement('input');
    csrf.setAttribute("name","_token");
    csrf.setAttribute("type","hidden");
    csrf.setAttribute("value","{{ Session::token() }}")
    csrf.id='csrf'
    form.appendChild(csrf);

    form.appendChild(cf_input);
    form.appendChild(sub)
    divForm.appendChild(h1);
    divForm.appendChild(p);
    divForm.appendChild(form)

    art.appendChild(divForm);
}
const button1=document.querySelector("#pulsante1");
button1.addEventListener("click",acquistiUtente)

const button2=document.querySelector("#pulsante2");
button2.addEventListener("click",compraVeicolo)

const button3=document.querySelector("#pulsante3");
button3.addEventListener("click",richiediSconto)
