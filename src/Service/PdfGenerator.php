<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PdfGenerator
{
private $twig;

public function __construct(Environment $twig)
{
$this->twig = $twig;
}

public function generatePdfResponse(string $template, array $data, string $filename): Response
{
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

$html = $this->twig->render($template, $data);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$response = new Response($dompdf->output());
$response->headers->set('Content-Type', 'application/pdf');
$response->headers->set('Content-Disposition', 'attachment;filename="' . $filename . '"');

return $response;
}
}
