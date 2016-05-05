<?php


$pdf = App::make('dompdf');
$pdf->loadHTML('<h1>Test</h1>');
return $pdf->stream();
