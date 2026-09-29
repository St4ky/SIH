<?php
// =======================================================
// Gap2Grow: Session & Authentication Helpers
// =======================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config.php';

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . BASE_URL . '/index.php');
        exit;
    }
}

function requireAdmin() {
    requireLogin();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Location: ' . BASE_URL . '/pages/dashboard.php');
        exit;
    }
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function currentUser() {
    if (!isset($_SESSION['user_id'])) {
        return null;
    }
    return [
        'id'          => $_SESSION['user_id'],
        'name'        => $_SESSION['name'] ?? 'Officer',
        'employee_id' => $_SESSION['employee_id'] ?? 'ISS-0000-0000',
        'cadre'       => $_SESSION['cadre'] ?? 'ISS',
        'designation' => $_SESSION['designation'] ?? 'Statistical Officer',
        'posting'     => $_SESSION['posting'] ?? 'MoSPI Headquarters',
        'email'       => $_SESSION['email'] ?? '',
        'role'        => $_SESSION['role'] ?? 'learner',
    ];
}

function getCurrentUser() {
    return currentUser();
}

function hasRole($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

