
const validacion = () => {
    const Validacion = JSON.parse(localStorage.getItem('user'));
    const element = document.querySelector('#Sesion');
    const content = document.querySelector('#menu-content');
    /* Menu usuario */
    /* const menu = ['Registrarme'];
    const menuUser = ['Mi perfi ', 'Mis reservas', 'Reservar']; */
    if (Validacion == null) {
        NavItems();
        element.setAttribute("href", "login.php");
        element.innerHTML = "Iniciar sesion";
        for (let i = 0; i <= menu.length - 1; i++) {
            contentM = document.createElement("a");
            contentM.setAttribute("href", menu[i].ref);
            const font1 = document.createElement("font");
            const font2 = document.createElement("font");
            contentM.classList.add("dropdown-item")
            font1.setAttribute("style", "vertical-align: inherit;");
            font2.setAttribute("style", "vertical-align: inherit;")
            font2.innerHTML = menu[i].name;
            font1.appendChild(font2);
            contentM.appendChild(font1);
            content.appendChild(contentM);
        }
    } else {
        NavItems();
        element.setAttribute("href","");
        element.innerHTML = JSON.parse(localStorage.getItem('user')).usuario;
        for (let i = 0; i <= menuUser.length - 1; i++) {
            contentM = document.createElement("a");
            contentM.setAttribute("href", menuUser[i].ref);
            const font1 = document.createElement("font");
            const font2 = document.createElement("font");
            contentM.classList.add("dropdown-item")
            font1.setAttribute("style", "vertical-align: inherit;");
            font2.setAttribute("style", "vertical-align: inherit;")
            font2.innerHTML = menuUser[i].name;
            font1.appendChild(font2);
            contentM.appendChild(font1);
            content.appendChild(contentM);
        }
        const exit = document.createElement("button");
        exit.classList.add("dropdown-item","bg-danger","text-center");
        exit.innerHTML="Cerrar sesion";
        content.appendChild(exit);
        exit.addEventListener('click',()=>{
            localStorage.clear();
            window.location.href="index.php";
        })
    }
}

const NavItems = () => {
    const options = document.querySelector("#options")
    if ( localStorage.getItem('user') == null || JSON.parse(localStorage.getItem('user')).admin == false) {
        for (let i = 0; i < OptionsN.length; i++) {
            const item = document.createElement("a");
            item.setAttribute("href", OptionsN[i].ref);
            item.classList.add("nav-item", "nav-link");
            item.innerHTML = OptionsN[i].name;
            options.appendChild(item);
        }
    } else {
        for (let i = 0; i < OptionsA.length; i++) {
            const item = document.createElement("a");
            item.setAttribute("href", OptionsA[i].ref);
            item.classList.add("nav-item", "nav-link");
            item.innerHTML = OptionsA[i].name;
            options.appendChild(item);
        }
    }
}