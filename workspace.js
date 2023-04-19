document.getElementsByName("title")[0].addEventListener('change', UpdateName);
document.getElementsByName("listTitle")[0].addEventListener('change', AddList);


function UpdateName() {
    console.log(this.value);

    $.ajax({
        type: "POST",
        url: 'update-workspace-name.php',
        async: false,
        data: {name: this.value},
        dataType: "json",
    });
}

function AddList() {
    console.log(this.value);

    $.ajax({
        type: "POST",
        url: 'add-list.php',
        async: false,
        data: {name: this.value},
        dataType: "json",
    });
}