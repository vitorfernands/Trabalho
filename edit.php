
<?php include 'database.php'; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM reservas WHERE id = $id";
$result = $conn->query($sql);
$reserva = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Editar Reserva</h1>
        <form method="POST" class="bg-gray-800 p-6 rounded shadow-md">
            <div class="mb-4">
                <label class="block mb-1">Sala</label>
                <input type="text" name="sala" value="<?= $reserva['sala'] ?>" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Descrição</label>
                <textarea name="descricao" class="w-full p-2 rounded bg-gray-700 text-white" required><?= $reserva['descricao'] ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Reservado por</label>
                <input type="text" name="reservado_por" value="<?= $reserva['reservado_por'] ?>" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Data e Hora</label>
                <input type="datetime-local" name="data_hora" value="<?= date('Y-m-d\TH:i', strtotime($reserva['data_hora'])) ?>" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="flex gap-4">
                <button type="submit" name="atualizar" class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200">Atualizar</button>
                <a href="index.php" class="text-gray-300 underline">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['atualizar'])) {
    $sala = $_POST['sala'];
    $descricao = $_POST['descricao'];
    $reservado_por = $_POST['reservado_por'];
    $data_hora = $_POST['data_hora'];

    $sql = "UPDATE reservas SET sala='$sala', descricao='$descricao', reservado_por='$reservado_por', data_hora='$data_hora' WHERE id=$id";
    $conn->query($sql);

    header("Location: index.php");
    exit;
}
?>