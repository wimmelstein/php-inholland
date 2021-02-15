window.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById("add");
    button.onclick = (e) => {
        e.preventDefault();
        window.location.replace('/users/add');
    }
})

function deleteUser($id) {
    console.log($id);
}
