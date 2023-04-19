document.getElementsByName("title")[0].addEventListener('change', UpdateName);


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
