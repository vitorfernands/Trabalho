<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Nova Reserva</h1>
        <form action="" method="POST" class="bg-gray-800 p-6 rounded shadow-md">
            <div class="mb-4">
                <label class="block mb-1">Sala</label>
                <input type="text" name="sala" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Descrição</label>
                <textarea name="descricao" class="w-full p-2 rounded bg-gray-700 text-white" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Reservado por</label>
                <input type="text" name="reservado_por" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Data e Hora</label>
                <input type="datetime-local" name="data_hora" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="flex gap-4">
                <button type="submit" name="salvar" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200">Salvar</button>
                <a href="index.php" class="text-gray-300 underline">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['salvar'])) {
    $sala = $_POST['sala'];
    $descricao = $_POST['descricao'];
    $reservado_por = $_POST['reservado_por'];
    $data_hora = $_POST['data_hora'];

    $sql = "INSERT INTO reservas (sala, descricao, reservado_por, data_hora)
            VALUES ('$sala', '$descricao', '$reservado_por', '$data_hora')";
    $conn->query($sql);

    header("Location: index.php");
    exit;
}
?>
