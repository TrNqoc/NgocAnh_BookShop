let btn = document.querySelector(".Dropdown");
let sidebar = document.querySelector(".sidebar");

btn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
});

let arrows = document.querySelectorAll(".icon-link");
for(var i = 0; i < arrows.length; i++){
    arrows[i].addEventListener("click", (e)=>{
        let arrowParent = e.target.parentElement.parentElement;

        arrowParent.classList.toggle("show");
    })
}