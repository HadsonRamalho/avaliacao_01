<?php
session_start();

function exportCsv($registro) {
    $filename = "registro_" . time() . ".csv";
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv;");

    $file = fopen('php://output', 'w');

    fputcsv($file, array('Volume do Galão', 'Sobra no Galão', 'Capacidades das Garrafas'));

    $data = array(
        $registro['volume_galao'],
        $registro['sobra_galao'],
        implode(', ', $registro['garrafas'])
    );

    fputcsv($file, $data);

    fclose($file);
    exit;
}

if (isset($_GET['export'])) {
    $index = intval($_GET['export']);
    if (isset($_SESSION['registros'][$index])) {
        exportCsv($_SESSION['registros'][$index]);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuvin | Registros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="box">
    <h1 id="txt">Registros</h1>
    <?php if (isset($_SESSION['registros']) && count($_SESSION['registros']) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Volume do Galão</th>
                    <th>Sobra no Galão</th>
                    <th>Capacidades das Garrafas</th>
                    <th>Exportar Como</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['registros'] as $index => $registro): ?>
                    <tr>
                        <td><?php echo $registro['volume_galao']; ?> L</td>
                        <td><?php echo $registro['sobra_galao']; ?> L</td>
                        <td><?php echo implode('L, ', $registro['garrafas']), 'L'; ?></td>
                        <td><a href="registros.php?export=<?php echo $index; ?>">Exportar CSV</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum registro encontrado.</p>
    <?php endif; ?>
</div>

</body>
</html>
