document.getElementsByName("title")[0].addEventListener('change', UpdateName);

var checkboxes = document.getElementsByClassName("checkbox");


for (var i = 0; i < checkboxes.length; i++) {
    (function(index) {
         checkboxes[index].addEventListener("change", function() {
            var id = checkboxes[index].getAttribute('id');

            if (checkboxes[index].checked) {
                ToggleChecked(id, 1);
                
            }
            else{
                ToggleChecked(id, 0);
            }
         })
    })(i);
 }


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

function ToggleChecked(id, value) {
    console.log(id+value);

    $.ajax({
        type: "POST",
        url: 'toggle-check.php',
        async: false,
        data: {id: id, value: value},
        dataType: "json",
    });
}