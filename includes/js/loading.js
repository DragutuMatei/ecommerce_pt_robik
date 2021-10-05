const loading = document.querySelector("#loading");

document.querySelector("html").style.height = "100vh";
document.querySelector("html").style.overflowY = "hidden";


setTimeout(() => {

    loading.style.opacity = 0;
    document.querySelector("html").style.height = "auto";
    document.querySelector("html").style.overflowY = "scroll";

    setTimeout(() => {
        loading.style.display = "none";
    }, 300)

}, 2000)