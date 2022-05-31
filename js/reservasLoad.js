if(localStorage.getItem("user") == null){
    document.location.href="login.php"
} else {
     alert("hola");
    document.location.href = document.location.href+"?id_cliente="+JSON.parse(localStorage.getItem("user").id_cliente);
}

