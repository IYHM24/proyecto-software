if (JSON.parse(localStorage.getItem("user")) == null || JSON.parse(localStorage.getItem("user")).admin == false) {
    document.location.href = "index.php";
}