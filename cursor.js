let cursor = document.getElementById('cursor');

document.addEventListener('mousemove', moveCursor);

document.addEventListener('mouseleave', ()=>{
    cursor.style.visibility = "hidden";
});
document.addEventListener('mouseover', ()=>{
    cursor.style.visibility = "visible";
});

function moveCursor(e) {
    let x = e.clientX;
    let y = e.clientY;

    cursor.style.left = `${x}px`;
    cursor.style.top = `${y}px`;

}

let links = Array.from(document.querySelectorAll("a"));

links.forEach((link) => {
    link.addEventListener("mouseover", ()=>{
        cursor.classList.add("shrink");
    });
    link.addEventListener("mouseleave", ()=>{
        cursor.classList.remove("shrink");
    });
});