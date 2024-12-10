document
  .getElementById("togglePassword")
  .addEventListener("click", function () {
    const passwordField = document.getElementById("password");
    const isPassword = passwordField.type === "password";

    passwordField.type = isPassword ? "text" : "password";

    // Change icon/text
    this.textContent = isPassword ? "🙈" : "👁️";
  });
