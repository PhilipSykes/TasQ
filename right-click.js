const rightClickMenu = document.querySelector(".right-click-menu");

var Lists = Array.from(document.querySelectorAll(".list-name"));
var Tasks = Array.from(document.querySelectorAll(".task-container"));
var Workspaces = Array.from(document.querySelectorAll(".workspace"));

let taskClicked = false;
let workspaceClicked = false;
let listClicked = false;


//detects scroll interaction
document.addEventListener("scroll", e => {
    rightClickMenu.style.opacity = "0";
    //gets scrolls amount to add onto contextmenu offset
    let scrollY = window.scrollY;
});

//listens for right click anywhere in the doc
document.addEventListener("contextmenu", e => {
    e.preventDefault(); //prevents system context menu from opening
    let x = e.clientX;
    let y = e.clientY;
    
    if(clicked){
        rightClickMenu.style.left = `${x}px`;
        rightClickMenu.style.top = `${y-20+scrollY}px`;
        
        rightClickMenu.style.opacity = "1";
        clicked = false;
    }
    else{
        rightClickMenu.style.opacity = "0";
    }
});

//listens for left click anywhere in the doc 
document.addEventListener("click", e => {
    rightClickMenu.style.opacity = "0";
});

//listens for right click on a workspace
Workspaces.forEach((workspace) => {
    workspace.addEventListener("contextmenu", e => {
        clicked = true;

        id = workspace.getAttribute("id");
        workspaceClicked = true;
    })
});

//listens for right click on a task
Tasks.forEach((task) => {
    task.addEventListener("contextmenu", e => {
        clicked = true;

        id = task.getAttribute("id");
        taskClicked = true;
    })
});

//listens for right click on a list
Lists.forEach((list) => {
    list.addEventListener("contextmenu", e => {
        clicked = true;

        id = list.getAttribute("id");
        listClicked = true;
    })
});


function deletePressed() {
    console.log("delete pressed");

    console.log(id);

    //function links front end and backend with ajax

    if(taskClicked){
        $.ajax({
            type: "POST",
            url: 'task-delete.php',
            async: false,
            data: {id: id},
            dataType: "json",
        });
    }
    if(listClicked){
        $.ajax({
            type: "POST",
            url: 'list-delete.php',
            async: false,
            data: {id: id},
            dataType: "json",
        });
    }
    if(workspaceClicked){
        $.ajax({
            type: "POST",
            url: 'workspace-delete.php',
            async: false,
            data: {id: id},
            dataType: "json",
        });
    }

}