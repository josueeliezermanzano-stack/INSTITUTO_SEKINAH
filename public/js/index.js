document.addEventListener("DOMContentLoaded", function () {    const body = document.body;
    body.style.margin = "0";
    body.style.fontFamily = "Arial, sans-serif";
    body.style.backgroundColor = "#f4f4f4";

    const header = document.getElementById("header");
    header.style.textAlign = "center";
    header.style.padding = "10px 20px";
    header.style.background = "linear-gradient(135deg, #1a2744, #1a2744)";
    header.style.color = "#fff";

    const logo = document.getElementById("menu-logo");
    logo.style.display = "flex";
    logo.style.alignItems = "center";

    const logoImg = document.getElementById("logo-img");
    logoImg.style.height = "100px";
    logoImg.style.width = "auto";
    logoImg.style.marginRight = "25px";

    const menu = document.getElementById("menu");
    menu.style.display = "flex";
    menu.style.justifyContent = "space-between";
    menu.style.alignItems = "center";
    menu.style.maxWidth = "1200px";
    menu.style.margin = "0 auto";

    const menuLinks = document.getElementById("menu-links");
    menuLinks.style.display = "flex";
    menuLinks.style.listStyle = "none";
    menuLinks.style.gap = "30px";

    const enlaces = document.querySelectorAll("#menu-links a");
    enlaces.forEach(a => {
        a.style.color = "#fff";
        a.style.textDecoration = "none";
        a.style.fontSize = "18px";
        a.style.fontWeight = "bold";
        a.style.cursor = "pointer";
        a.style.transition = "0.3s";

        a.onmouseover = () => a.style.opacity = "0.7";
        a.onmouseout = () => a.style.opacity = "1";
    });

    const btnAcceder = document.getElementById("btn-acceder");
    btnAcceder.style.padding = "10px 20px";
    btnAcceder.style.backgroundColor = "#fff";
    btnAcceder.style.color = "#1e1e1e";
    btnAcceder.style.fontWeight = "bold";
    btnAcceder.style.borderRadius = "6px";
    btnAcceder.style.textDecoration = "none";
    btnAcceder.style.cursor = "pointer";
    btnAcceder.style.transition = "0.3s";

    btnAcceder.onmouseover = () => btnAcceder.style.backgroundColor = "#ddd";
    btnAcceder.onmouseout = () => btnAcceder.style.backgroundColor = "#fff";

    const foot = document.getElementById("foot");
    foot.style.display = "flex";              
    foot.style.alignItems = "center";         
    foot.style.justifyContent = "center";    
    foot.style.gap = "15px";                  
    foot.style.padding = "10px 20px";
    foot.style.background = "linear-gradient(135deg, #1a2744, #1a2744)";
    foot.style.color = "#fff";
    foot.style.textAlign = "center";

    const logoI = document.getElementById("logoi-img");
    logoI.style.height = "100px";             
    logoI.style.width = "auto";
    logoI.style.display = "block";

    const btn = document.getElementById("btn");
    btn.style.padding = "12px 25px";
    btn.style.border = "none";
    btn.style.borderRadius = "6px";
    btn.style.backgroundColor = "#fff";
    btn.style.color = "#1e1e1e";
    btn.style.cursor = "pointer";
    btn.style.fontSize = "16px";
    btn.style.marginTop = "20px";
    btn.style.transition = "0.3s";

    btn.onmouseover = () => {
        btn.style.backgroundColor = "#ddd";
    };
    btn.onmouseout = () => {
        btn.style.backgroundColor = "#fff";
    };

    
});
