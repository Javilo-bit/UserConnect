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