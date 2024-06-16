document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.querySelector("form[action='login.php']");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            const correo = document.getElementById("correo").value;
            const password = document.getElementById("password").value;

            if (correo === "" || password === "") {
                alert("Todos los campos son obligatorios");
                event.preventDefault();
            } else if (!validateEmail(correo)) {
                alert("Por favor, introduce un correo válido");
                event.preventDefault();
            }
        });
    }

    const repuestosForm = document.querySelector("#repuestosForm");
    if (repuestosForm) {
        repuestosForm.addEventListener("submit", function(event) {
            const nombre = document.getElementById("nombre").value;
            const descripcion = document.getElementById("descripcion").value;
            const precio = document.getElementById("precio").value;

            if (nombre === "" || descripcion === "" || precio === "") {
                alert("Todos los campos son obligatorios");
                event.preventDefault();
            } else if (isNaN(precio) || precio <= 0) {
                alert("Por favor, introduce un precio válido");
                event.preventDefault();
            }
        });
    }

    const usuariosForm = document.querySelector("#usuariosForm");
    if (usuariosForm) {
        usuariosForm.addEventListener("submit", function(event) {
            const correo = document.getElementById("correo").value;
            const password = document.getElementById("password").value;

            if (correo === "" || password === "") {
                alert("Todos los campos son obligatorios");
                event.preventDefault();
            } else if (!validateEmail(correo)) {
                alert("Por favor, introduce un correo válido");
                event.preventDefault();
            }
        });
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
});
