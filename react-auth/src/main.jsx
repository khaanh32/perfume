import React from 'react'
import ReactDOM from 'react-dom/client'
import Login from './Login.jsx'
import Register from './Register.jsx'
import AuthModal from './AuthModal.jsx' 

// Tìm div root trong file PHP login.php
const loginRoot = document.getElementById('react-login-root');
// Tìm div root trong file PHP register.php
const registerRoot = document.getElementById('react-register-root');
// Tìm div root chung (sẽ đặt ở Footer PHP)
const modalRoot = document.getElementById('react-auth-modal-root');

if (modalRoot) {
  ReactDOM.createRoot(modalRoot).render(
    <React.StrictMode>
      <AuthModal />
    </React.StrictMode>,
  )
}
if (loginRoot) {
  ReactDOM.createRoot(loginRoot).render(
    <React.StrictMode>
      <Login />
    </React.StrictMode>,
  )
}

if (registerRoot) {
  ReactDOM.createRoot(registerRoot).render(
    <React.StrictMode>
      <Register />
    </React.StrictMode>,
  )
}