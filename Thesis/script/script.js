//form toggle

function toggleForm(formId) {
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');

    if (formId === 'loginForm') {
      loginForm.style.display = 'block';
      registerForm.style.display = 'none';
    } else if (formId === 'registerForm') {
      loginForm.style.display = 'none';
      registerForm.style.display = 'block';
    }
  }

  const togglePassword = document.getElementById('togglePassword');
  const password = document.getElementById('id_password');

  togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // Toggle eye icon class to change its appearance
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
  });
