function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        $.ajax({
            type: "DELETE",
            url: "http://localhost/users/" + id,
            success: function (e) {
                window.location.reload();
            }
        });
    }
}

function addUser() {
    $.ajax({
        type: "POST",
        url: "http://localhost/users",
        data: $("#new-user").serialize(),
        success: function (e) {
            window.location.reload();
        }
    })
}