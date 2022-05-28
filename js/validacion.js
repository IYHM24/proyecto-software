
const validacion = () => {
    const Validacion = localStorage.getItem('user');
    const element = document.querySelector('#Sesion');
    const content = document.querySelector('#menu-content');
    /* Menu usuario */
    const menu = ['Registrarme'];
    const menuUser = ['Mi perfi ', 'Mis reservas', 'Reservar'];
    if (Validacion == null) {
        element.setAttribute("href","login.php");
        element.innerHTML = "Iniciar sesion";
        for(let i = 0; i <= menu.length - 1; i++){
            contentM = document.createElement("a");
            const font1 = document.createElement("font");
            const font2 = document.createElement("font");
            contentM.classList.add("dropdown-item")
            font1.setAttribute("style","vertical-align: inherit;"); 
            font2.setAttribute("style","vertical-align: inherit;")
            font2.innerHTML=menu[i];
            font1.appendChild(font2);
            contentM.appendChild(font1);
            content.appendChild(contentM);
        }
    } else{
        element.setAttribute("href"," ");
        element.innerHTML = "IYHM24";
        for(let i = 0; i <= menuUser.length - 1; i++){
            contentM = document.createElement("a");
            const font1 = document.createElement("font");
            const font2 = document.createElement("font");
            contentM.classList.add("dropdown-item")
            font1.setAttribute("style","vertical-align: inherit;"); 
            font2.setAttribute("style","vertical-align: inherit;")
            font2.innerHTML=menuUser[i];
            font1.appendChild(font2);
            contentM.appendChild(font1);
            content.appendChild(contentM);
        }
    }

}

validacion();
