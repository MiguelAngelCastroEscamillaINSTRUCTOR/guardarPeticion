addEventListener("DOMContentLoaded", (e)=>{
    let myfrom = document.querySelector("form");

    myfrom.addEventListener("submit", async(e)=>{
        e.preventDefault();
        let data = Object.fromEntries(new FormData(e.target));
        let myHeaders = new Headers();
        myHeaders.append("Accept", e.submitter.dataset.accion);
        let config = {
            headers: myHeaders,
            method: "POST",
            body: JSON.stringify(data), 
        };
        let peticion = await fetch("api.php", config);
        let json = await peticion.text();
        document.querySelector("pre").innerHTML = json;
    })
})