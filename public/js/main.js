let iconsSide = document.querySelectorAll(".MenuSidebar li i");
let liSide = document.querySelectorAll(".MenuSidebar li a");
let sidebar = document.querySelector(".sidebar");
let content = document.querySelector(".h");

document.querySelector(".bars").addEventListener("click", () => {

    if(!sidebar.classList.contains("addw")){
        sidebar.classList.add("addw");
    iconsSide.forEach((el, i) => {
        el.classList.toggle("addSizeS");

    })

    liSide.forEach(el => {
        el.classList.toggle("shows");
    })
}else {
    sidebar.classList.toggle("addw");
    iconsSide.forEach((el, i) => {
        el.classList.remove("addSizeS");

    })

    liSide.forEach(el => {
        el.classList.remove("shows");
    })
}


})

document.querySelector(".cnacelIcon").addEventListener("click",()=>{
    sidebar.classList.toggle("addw");
})

document.getElementById('place').addEventListener('keydown', function(event) {
    event.preventDefault();
});