<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuvin | Verificadora Independente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<form id="form" action="np.php" method="post" enctype="multipart/form-data">
    <div id="box">
        <h2 id="formInterno">Volume do galão (Em Litros)</h2>
        <input id="volume_galao" type="text" name="volume_galao" required>
        <h2 id="formInterno">Garrafas (Arquivo .csv)</h2>
        <input type="file" name="csv_arquivo" accept=".csv" required>
        <button type="submit" name="upload">Enviar</button>
    </div>
</form>

</body>
</html>
