<?php
session_start();

class Galao {
    private $capacidade;
    private $liquido_atual;

    public function __construct($capacidade, $liquido_atual) {
        $this->capacidade = $capacidade;
        $this->liquido_atual = $liquido_atual;
    }

    public function get_liquido() {
        return max($this->liquido_atual, 0);
    }

    public function remove_liquido($liquido) {
        $this->liquido_atual -= $liquido;
    }
}

class Garrafa {
    private $capacidade;
    private $liquido_atual;

    public function __construct($capacidade) {
        $this->capacidade = $capacidade;
        $this->liquido_atual = 0;
    }

    public function get_capacidade() {
        return $this->capacidade;
    }

    public function adiciona_liquido($liquido) {
        $this->liquido_atual += $liquido;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_arquivo"])) {
    $csvArquivo = $_FILES["csv_arquivo"]["tmp_name"];
    $volume_galao = isset($_POST["volume_galao"]) ? floatval($_POST["volume_galao"]) : 0;

    $Galao1 = new Galao($volume_galao, $volume_galao);
    $Garrafas = array();

    if (($handle = fopen($csvArquivo, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $Garrafas[] = new Garrafa(floatval($data[0]));
        }
        fclose($handle);
    }

    usort($Garrafas, function($a, $b) {
        return $b->get_capacidade() - $a->get_capacidade();
    });

    $GarrafasEscolhidas = array();
    foreach ($Garrafas as $Gx) {
        if ($Gx->get_capacidade() <= $Galao1->get_liquido()) {
            $Galao1->remove_liquido($Gx->get_capacidade());
            $Gx->adiciona_liquido($Gx->get_capacidade());
            $GarrafasEscolhidas[] = $Gx;
        }
    }

    $registro = array(
        'volume_galao' => $volume_galao,
        'sobra_galao' => $Galao1->get_liquido(),
        'garrafas' => array_map(function($g) { return $g->get_capacidade(); }, $GarrafasEscolhidas)
    );

    if (!isset($_SESSION['registros'])) {
        $_SESSION['registros'] = array();
    }

    $_SESSION['registros'][] = $registro;

    header("Location: registros.php");
    exit;
}
?>
