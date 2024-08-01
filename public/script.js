document.addEventListener('DOMContentLoaded', () => {
  // Event listener for showing the registration form
  document.getElementById('show-register').addEventListener('click', () => {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
  });

  // Event listener for showing the login form
  document.getElementById('show-login').addEventListener('click', () => {
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
  });

  // Event listener for handling login form submission
  document.getElementById('login-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    const success = await loginUser(email, password);
    if (success) {
      window.location.href = 'https://ConorMeade.github.io/CS120-Book-Club/add_to_library.html'; // REPLACE LATER with a new URL
    } else {
      alert('Invalid email or password.');
    }
  });

  // Event listener for handling registration form submission
  document.getElementById('register-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const name = document.getElementById('register-name').value;
    const username = document.getElementById('register-username').value;
    const password = document.getElementById('register-password').value;
    const email = document.getElementById('register-email').value;

    const success = await registerUser(name, username, password, email);
    if (success) {
      alert('Registration successful!');
      window.location.href = 'https://ConorMeade.github.io/CS120-Book-Club/add_to_library.html'; // REPLACE LATER with a new URL
    } else {
      alert('Registration failed.');
    }
  });

  // Function to handle user login
  async function loginUser(email, password) {
    // http://localhost/BookClub/login.php
    try {
      const response = await fetch('https://infinite-beyond-05850-58f77000e905.herokuapp.com/login.php', {  // THIS NEEDS to be changed from localhost
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username: email, password })
      });
      const result = await response.json();
      console.log(result)
      if (result.status === 'success') {
        return true;
      } else {
        console.error('Login error:', result.message);
        return false;
      }
    } catch (error) {
      console.error('Error logging in:', error);
      return false;
    }
  }

  // Function to handle user registration
  async function registerUser(name, username, password, email) {

    // http://localhost/BookClub/register.php
    try {
      const response = await fetch('https://infinite-beyond-05850-58f77000e905.herokuapp.com/register.php', {  // THIS NEEDS to be changed from localhost
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, username, password, email })
      });
  
      const text = await response.text();
  
      try {
        const result = JSON.parse(text);
        if (result.status === 'success') {
          return true;
        } else {
          console.error('Registration error:', result.message);
          return false;
        }
      } catch (e) {
        console.error('Unexpected response:', text);
        return false;
      }
  
    } catch (error) {
      console.error('Error registering user:', error);
      return false;
    }
  }  
});
