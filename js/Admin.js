window.addEventListener('load', () => {
    Init();
})

if (JSON.parse(localStorage.getItem("user")) == null || JSON.parse(localStorage.getItem("user")).admin == false) {
    document.location.href = "index.php";
}

const Init = () => {
    for (let j = 0; j < AdminOptions.length; j++) {
        const Admin_Page = document.querySelector("#Admin-page");
        const div1 = document.createElement("div");
        div1.setAttribute("data-wow-delay", "0.1s");
        div1.classList.add("col-md-6", "col-lg-4", "wow", "fadeIn");
        const div2 = document.createElement("div");
        div2.classList.add("bg-light", "rounded", "p-3");
        const div3 = document.createElement("div");
        div3.setAttribute("style", "border: 1px dashed rgba(0, 185, 142, .3)");
        div3.classList.add("d-flex", "align-items-center", "bg-white", "rounded", "p-3");
        const div4 = document.createElement("div");
        div4.setAttribute("style", "width: 45px; height: 45px;");
        div4.classList.add("icon","me-3");
        const icon = document.createElement("i");
        icon.className= AdminOptions[j].icon;
        const span = document.createElement("a");
        span.setAttribute("href",AdminOptions[j].ref);
        span.innerHTML=AdminOptions[j].name;

        div1.appendChild(div2);
        div2.appendChild(div3);
        div3.appendChild(div4);
        div4.appendChild(icon);
        div3.appendChild(span);

        Admin_Page.appendChild(div1);
    }
}