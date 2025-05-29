<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Salas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-white">Reserva de Salas</h1>
        <a href="create.php" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200">+ Nova Reserva</a>
        <div class="bg-gray-800 shadow-md rounded mt-4 overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Sala</th>
                        <th class="px-4 py-2 text-left">Descrição</th>
                        <th class="px-4 py-2 text-left">Reservado por</th>
                        <th class="px-4 py-2 text-left">Data e Hora</th>
                        <th class="px-4 py-2 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM reservas ORDER BY data_hora DESC";
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='border-t border-gray-700'>";
                        echo "<td class='px-4 py-2'>{$row['sala']}</td>";
                        echo "<td class='px-4 py-2'>{$row['descricao']}</td>";
                        echo "<td class='px-4 py-2'>{$row['reservado_por']}</td>";
                        echo "<td class='px-4 py-2'>" . date('d/m/Y H:i', strtotime($row['data_hora'])) . "</td>";
                        echo "<td class='px-4 py-2'>
                                <a href='edit.php?id={$row['id']}' class='text-yellow-400 mr-2'>Editar</a>
                                <a href='delete.php?id={$row['id']}' class='text-red-500' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
