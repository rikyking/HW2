function cerca(event){
    event.preventDefault();
    const serch=document.querySelector("#inputID").value
    const content=document.querySelector("#tipo").value
    const page=document.querySelector("#page").value
    if(!content || !serch){
        alert("Inserisci del testo");
    }else{
        if(page==''){
            page==="1"
        }
        fetch("serch/unsplash/page/"+page+"/content/"+content+"/serch/"+serch).then(onResponse).then(onJSON);
    }
}

function onResponse(response){
    return response.json();
}

function onJSON(json){
    const art=document.querySelector("#contenuti");
    art.innerHTML='';
    console.log(json);
    
    for(let i=0;i<json.length;i++){
        const div=document.createElement("div");
        const img=document.createElement("img");
        img.src=json[i].url;
        img.addEventListener("click",onClick);
        div.appendChild(img);
        art.appendChild(div);
    }
}
const form=document.querySelector("form");
form.addEventListener("submit",cerca);

function reload(){
    const sec=document.querySelector("#contenuti");
    sec.innerHTML='';
    document.querySelector("#inputID").value=''
    document.querySelector("#page").value=''
}

const rel=document.querySelector("#reload");
rel.addEventListener("click",reload);

//modale
function createImage(src) {
    const image = document.createElement('img');
    image.src = src;
    return image;
}

function onClick(event){
    const img=createImage(event.currentTarget.src);
    document.body.classList.add("no-scroll");
    modal.style.top = window.pageYOffset + 'px';
    modal.appendChild(img);
    modal.classList.remove('hidden');
}

function modalClick(){
    document.body.classList.remove("no-scroll")
    modal.classList.add("hidden")
    modal.innerHTML="";
}
const modal=document.querySelector("#modal-view");
modal.addEventListener("click",modalClick);

