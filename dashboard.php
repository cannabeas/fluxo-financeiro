<?php
session_start();
if (!isset($_SESSION['employee_id'])) {
    header('Location: index.php');
    exit();
}
// Dados mockados para exemplo
$balance = 10000;
$transactions = [
    [
        'id' => 1,
        'type' => 'entrada',
        'amount' => 1500,
        'description' => 'Recebimento Cliente A',
        'employee' => 'João Silva',
        'date' => date('Y-m-d H:i:s')
    ],
    [
        'id' => 2,
        'type' => 'saida',
        'amount' => 500,
        'description' => 'Pagamento Fornecedor X',
        'employee' => 'Maria Santos',
        'date' => date('Y-m-d H:i:s')
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Fluxo de Caixa</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="min-h-screen bg-finance-surface p-4">
        <div class="max-w-7xl mx-auto space-y-6">
            <header class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                    <p class="text-gray-600">Bem-vindo ao sistema de fluxo de caixa</p>
                </div>
                <a href="logout.php" class="button button-primary">
                    Sair
                </a>
            </header>
            <div class="grid-cards">
                <div class="card animate-slideIn">
                    <div class="card-header">
                        <h3 class="card-title">Saldo Atual</h3>
                    </div>
                    <div class="card-content">
                        <div class="text-2xl font-bold text-finance-primary">
                            R$ <?php echo number_format($balance, 2, ',', '.'); ?>
                        </div>
                    </div>
                </div>
                <div class="card animate-slideIn delay-100">
                    <div class="card-header">
                        <h3 class="card-title">Entradas de Hoje</h3>
                    </div>
                    <div class="card-content">
                        <div class="text-2xl font-bold text-finance-success">
                            R$ 1.500,00
                        </div>
                    </div>
                </div>
                <div class="card animate-slideIn delay-200">
                    <div class="card-header">
                        <h3 class="card-title">Saídas de Hoje</h3>
                    </div>
                    <div class="card-content">
                        <div class="text-2xl font-bold text-finance-error">
                            R$ 500,00
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Últimas Transações</h3>
                </div>
                <div class="card-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Descrição</th>
                                <th>Funcionário</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td>
                                        <span class="badge <?php echo $transaction['type'] === 'entrada' ? 'badge-success' : 'badge-error'; ?>">
                                            <?php echo $transaction['type'] === 'entrada' ? 'Entrada' : 'Saída'; ?>
                                        </span>
                                    </td>
                                    <td class="font-medium">
                                        R$ <?php echo number_format($transaction['amount'], 2, ',', '.'); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($transaction['description']); ?></td>
                                    <td><?php echo htmlspecialchars($transaction['employee']); ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($transaction['date'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>