<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;

class AuthController extends Controller
{
    public function loginForm()
    {
        if ($this->isLoggedIn()) {
            $this->redirect('/admin');
        }
        $adminModel = new Admin();
        if (!$adminModel->hasRegisteredAccount()) {
            $this->redirect('/admin/register');
        }
        $this->viewAdmin('auth/login', ['title' => 'Login Admin', 'flash' => $this->getFlash()]);
    }

    public function registerForm()
    {
        if ($this->isLoggedIn()) {
            $this->redirect('/admin');
        }
        if ((new Admin())->hasRegisteredAccount()) {
            $this->setFlash('error', 'Pendaftaran admin sudah ditutup. Silakan masuk dengan akun yang terdaftar.');
            $this->redirect('/admin/login');
        }
        $this->viewAdmin('auth/register', ['title' => 'Daftar Admin', 'flash' => $this->getFlash()]);
    }

    public function register()
    {
        if ((new Admin())->hasRegisteredAccount()) {
            $this->setFlash('error', 'Akun admin sudah terdaftar. Silakan masuk.');
            $this->redirect('/admin/login');
        }
        $name = trim($_POST['name'] ?? '');
        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';
        $confirmation = $_POST['password_confirmation'] ?? '';

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
            $this->setFlash('error', 'Isi nama dan email yang valid. Password minimal 8 karakter.');
            $this->redirect('/admin/register');
        }
        if ($password !== $confirmation) {
            $this->setFlash('error', 'Konfirmasi password tidak cocok.');
            $this->redirect('/admin/register');
        }

        $adminId = (new Admin())->registerFirst($email, $password, $name);
        if (!$adminId) {
            $this->setFlash('error', 'Akun admin sudah terdaftar. Silakan masuk.');
            $this->redirect('/admin/login');
        }
        $this->setFlash('success', 'Akun berhasil dibuat. Silakan masuk untuk mengelola laporan.');
        $this->redirect('/admin/login');
    }

    public function login()
    {
        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';
        $adminModel = new Admin();
        $admin = $email !== '' ? $adminModel->findByEmail($email) : null;

        if (!$admin || !$adminModel->verifyPassword($password, $admin['password'])) {
            $this->setFlash('error', 'Email atau password salah.');
            $this->redirect('/admin/login');
        }
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_username'] = $admin['username'];
        $this->redirect('/admin');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/admin/login');
    }
}
