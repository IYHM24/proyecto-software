
const validacion = () => {
    const Validacion = localStorage.getItem('user');
    const element = document.querySelector('#Sesion');
    if (Validacion == null) {
        element.removeAttribute("onclick");
        element.removeAttribute("href");
        element.innerHTML = "";
    }

}

validacion();
