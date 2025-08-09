// login.ts
const form = document.getElementById("loginForm") as HTMLFormElement;
const emailInput = document.getElementById("email") as HTMLInputElement;
const passwordInput = document.getElementById("password") as HTMLInputElement;
const messageDiv = document.getElementById("loginMessage") as HTMLDivElement;
const loginButton = document.getElementById("loginButton") as HTMLButtonElement;

const API_URL = "http://localhost:3000/utilisateurs";

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();

  loginButton.innerHTML = `<i class="fas fa-spinner fa-spin"></i><span>Connexion...</span>`;
  loginButton.disabled = true;

  try {
    const response = await fetch(
      `${API_URL}?email=${email}&password=${password}`
    );
    const users = await response.json();

    if (users.length > 0) {
      const user = users[0];
      localStorage.setItem("user", JSON.stringify(user));
      await fetch("../php/login_session.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ user }),
      });
      messageDiv.className =
        "mb-6 p-4 rounded-lg bg-green-500/20 border border-green-500/30 text-green-300";
      messageDiv.textContent = "Connexion réussie ! Redirection...";
      messageDiv.classList.remove("hidden");

      setTimeout(() => {
        window.location.href = "/dashboard";
      }, 1500);
    } else {
      throw new Error("Identifiants incorrects");
    }
  } catch (error) {
    const err = error as Error;
    messageDiv.className =
      "mb-6 p-4 rounded-lg bg-red-500/20 border border-red-500/30 text-red-300";
    messageDiv.textContent = err.message;
    messageDiv.classList.remove("hidden");

    loginButton.innerHTML =
      '<i class="fas fa-sign-in-alt"></i><span>Se connecter</span>';
    loginButton.disabled = false;
  }
});
