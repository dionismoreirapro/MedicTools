<?php 

include('../../conexao.php');

date_default_timezone_set('America/Sao_Paulo');


use Dompdf\Dompdf;
use Dompdf\Options;
//CARREGAR DOMPDF
require_once '../../dompdf/vendor/autoload.php';
$options = new Options();
$options->set('isRemoteEnabled',true);      
$dompdf = new Dompdf( $options );


$id_consulta = $_GET['id'];



//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url_sistema."/painel-medico/rel/atestado.php?id=".$id_consulta));



//INICIALIZAR A CLASSE DO DOMPDF
$pdf = new DOMPDF();


//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//Definir o tamanho do papel e orientação da página
$pdf->set_paper('A4', 'portrait');



//RENDERIZAR O PDF
$pdf->render();



//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioAtestado.pdf',
array("Attachment" => false)
);


