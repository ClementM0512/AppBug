var els = document.getElementsByClassName("trigger");
var idBug = document.getElementsByClassName("idBug");

var xhr = new XMLHttpRequest();
Array.from(els).forEach(el =>{
    el.addEventListener("click", MakeRequest);
});

function MakeRequest(e){
    e.preventDefault();
    let url = "AppBug/updt";

    console.log(this.parentElement.parentElement);
    //recup parent / .parent()
    
    let params = "id=" + idBug.value;
    xhr.onreadystatechange = AlertContent;

    xhr.open('POST', url);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(params);
}

function AlertContent(){
    
}