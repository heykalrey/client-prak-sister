// script.js

// Simulasi login
document.getElementById("loginButton").addEventListener("click", () => {
  const email = document.getElementById("loginEmail").value.trim();
  const password = document.getElementById("loginPassword").value.trim();

  if (email === "" || password === "") {
    alert("Please fill in all fields.");
    return;
  }

  // Simulasikan login dan simpan data pengguna di localStorage (untuk demonstrasi)
  localStorage.setItem("user", JSON.stringify({ email }));
  alert("Login successful!");

  // Redirect ke halaman utama
  window.location.href = "index.html";
});

// Simulasi registrasi
document.getElementById("registerButton").addEventListener("click", () => {
  const name = document.getElementById("registerName").value.trim();
  const email = document.getElementById("registerEmail").value.trim();
  const password = document.getElementById("registerPassword").value.trim();
  const confirmPassword = document.getElementById("registerConfirmPassword").value.trim();

  if (name === "" || email === "" || password === "" || confirmPassword === "") {
    alert("Please fill in all fields.");
    return;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return;
  }

  // Simulasikan registrasi dan simpan data di localStorage (untuk demonstrasi)
  localStorage.setItem("user", JSON.stringify({ name, email }));
  alert("Registration successful! Please login.");

  // Redirect ke halaman login
  window.location.href = "login.html";
});
