document.addEventListener("DOMContentLoaded", () => {

  /* ================================
     VALIDACIÓN FORMULARIO REGISTRO
  ================================= */

  const registerForm = document.getElementById("registerForm");

  if (registerForm) {
    registerForm.addEventListener("submit", (e) => {

      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmPassword").value;
      const error = document.getElementById("registerError");

      error.textContent = "";

      if (name === "" || email === "" || password === "" || confirmPassword === "") {
        e.preventDefault();
        error.textContent = "Todos los campos son obligatorios.";
        return;
      }

      if (password.length < 6) {
        e.preventDefault();
        error.textContent = "La contraseña debe tener al menos 6 caracteres.";
        return;
      }

      if (password !== confirmPassword) {
        e.preventDefault();
        error.textContent = "Las contraseñas no coinciden.";
        return;
      }

      // Si todo está bien → PHP recibe el formulario
    });
  }

});
// ---- LIMPIAR ERROR DE LOGIN DESPUÉS DE MOSTRARLO ----
document.addEventListener("DOMContentLoaded", () => {
    const errorBox = document.getElementById("loginError");

    if (errorBox) {
        // Elimina ?error=1 de la URL sin recargar la página
        const url = new URL(window.location);
        url.searchParams.delete("error");
        window.history.replaceState({}, document.title, url.pathname);
    }
});

/* ==========================
FETCH API – DATOS USUARIO (BOTÓN)
========================== */

document.addEventListener("DOMContentLoaded", () => {

    const loadBtn = document.getElementById("loadDataBtn");
    const resultBox = document.getElementById("ajaxResult");

    if (!loadBtn || !resultBox) return;

    loadBtn.addEventListener("click", () => {

        resultBox.innerHTML = "<p>Cargando información...</p>";

        fetch("./php/api/user_info.php")
            .then(response => response.json())
            .then(data => {

                if (!data.success) {
                    resultBox.innerHTML = "<p>Error al obtener datos</p>";
                    return;
                }

                resultBox.innerHTML = `
                    <div class="dashboard-card">
                        <h3>Información del usuario</h3>
                        <p><strong>Nombre:</strong> ${data.data.nombre}</p>
                        <p><strong>Email:</strong> ${data.data.email}</p>
                    </div>
                `;
            })
            .catch(error => {
                console.error("Error FETCH:", error);
                resultBox.innerHTML = "<p>Error de conexión</p>";
            });

    });

});