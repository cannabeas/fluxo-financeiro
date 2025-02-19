<?php
session_start();
// Verificar se o usuário está logado
if (!isset($_SESSION['employee_id']) && basename($_SERVER['PHP_SELF']) !== 'index.php') {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Fluxo de Caixa</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="min-h-screen bg-finance-background flex items-center justify-center p-4">
        <div class="w-full max-w-md space-y-8 animate-fadeIn">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-finance-primary mb-2">
                    Sistema de Fluxo de Caixa
                </h1>
                <p class="text-gray-600">Acesse sua conta para continuar</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Login</h2>
                    <p class="card-description">Entre com seu código de funcionário e senha</p>
                </div>
                <div class="card-content">
                    <form action="auth.php" method="POST" class="space-y-4">
                        <div class="space-y-2">
                            <label for="employeeCode" class="form-label">
                                Código de Funcionário
                            </label>
                            <input
                                id="employeeCode"
                                name="employeeCode"
                                type="text"
                                placeholder="Digite seu código"
                                required
                                class="form-input"
                            >
                        </div>
                        <div class="space-y-2">
                            <label for="password" class="form-label">
                                Senha
                            </label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Digite sua senha"
                                required
                                class="form-input"
                            >
                        </div>
                        <button
                            type="submit"
                            class="button button-primary w-full"
                        >
                            Entrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>