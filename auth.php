<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeCode = $_POST['employeeCode'] ?? '';
    $password = $_POST['password'] ?? '';
    // Simulação de autenticação - em produção, verificar contra banco de dados
    if ($employeeCode === '123' && $password === '123') {
        $_SESSION['employee_id'] = 1;
        $_SESSION['employee_name'] = 'João Silva';
        header('Location: dashboard.php');
        exit();
    } else {
        header('Location: index.php?error=1');
        exit();
    }
}
header('Location: index.php');
exit();