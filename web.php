<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    $categorias = json_decode(json_encode([
        ['codigo' => 'A02', 'categoria' => 'Medicamentos para el tratamiento de Trastornos causados por Ácidos'],
        ['codigo' => 'A03', 'categoria' => 'Medicamentos contra Trastornos Funcionales Gastrointestinales'],
        ['codigo' => 'A04', 'categoria' => 'Medicamentos Antieméticos y Antinauseosos'],
        ['codigo' => 'A06', 'categoria' => 'Medicamentos para el Estreñimiento'],
        ['codigo' => 'A07', 'categoria' => 'Medicamentos Antidiarreicos, Antiinflamatorios y Antiinfecciosos Intestinales'],
        ['codigo' => 'A10', 'categoria' => 'Medicamentos usados en Diabetes'],
        ['codigo' => 'A11', 'categoria' => 'Vitaminas'],
        ['codigo' => 'A12', 'categoria' => 'Suplementos Minerales']
    ]));

    $html = '<table border="1" cellpadding="5" style="border-collapse: collapse;">';
    $html .= '<tr><th>Código</th><th>Categoría</th></tr>';

    foreach ($categorias as $cat) {
        $html .= "<tr><td>{$cat->codigo}</td><td>{$cat->categoria}</td></tr>";
    }

    $html .= '</table>';

    return $html;
});

Route::get('/medicamentos', function () {
    $medicamentos = json_decode(json_encode([
        ['codigo' => 'A02BA021', 'nombre' => 'Ranitidina', 'dosis' => '50 mg', 'forma' => 'Líquidos parenterales', 'via' => 'IM/IV'],
        ['codigo' => 'A02BA032', 'nombre' => 'Famotidina', 'dosis' => '40 mg', 'forma' => 'Sólidos orales', 'via' => 'VO'],
        ['codigo' => 'A02BC013', 'nombre' => 'Omeprazol', 'dosis' => '20 mg', 'forma' => 'Sólidos orales', 'via' => 'VO'],
        ['codigo' => 'A02BC014', 'nombre' => 'Omeprazol', 'dosis' => '40 mg', 'forma' => 'Sólidos parenterales', 'via' => 'IV'],
        ['codigo' => 'A03BA011', 'nombre' => 'Atropina (Sulfato)', 'dosis' => '0.5-1 mg/mL', 'forma' => 'Líquidos parenterales', 'via' => 'SC/IM/IV'],
        ['codigo' => 'A03BA032', 'nombre' => 'Hiossiamina (bromuro de n-butil liocisina)', 'dosis' => '10 mg', 'forma' => 'Sólidos orales', 'via' => 'VO'],
        ['codigo' => 'A03BA033', 'nombre' => 'Hiossiamina (bromuro de n-butil liocisina)', 'dosis' => '20 mg/mL', 'forma' => 'Líquidos parenterales', 'via' => 'IM/IV'],
        ['codigo' => 'A03FA014', 'nombre' => 'Metoclopramida (clorhidrato)', 'dosis' => '5 mg/mL', 'forma' => 'Líquidos parenterales', 'via' => 'IM/IV'],
        ['codigo' => 'A03FA015', 'nombre' => 'Metoclopramida (clorhidrato)', 'dosis' => '10 mg', 'forma' => 'Sólidos orales', 'via' => 'VO'],
        ['codigo' => 'A04AA011', 'nombre' => 'Ondansetron', 'dosis' => '8 mg', 'forma' => 'Sólidos orales', 'via' => 'VO'],
        ['codigo' => 'A04AA012', 'nombre' => 'Ondansetron', 'dosis' => '2 mg/mL', 'forma' => 'Líquidos parenterales', 'via' => 'IV'],
        ['codigo' => 'A04AA023', 'nombre' => 'Granisetron', 'dosis' => '1 mg', 'forma' => 'Sólidos orales', 'via' => 'VO'],
        ['codigo' => 'A04AA024', 'nombre' => 'Granisetron', 'dosis' => '1 mg/mL', 'forma' => 'Líquidos parenterales', 'via' => 'IV'],
        ['codigo' => 'R06AA115', 'nombre' => 'Dimenhidrinato', 'dosis' => '50 mg', 'forma' => 'Sólidos orales', 'via' => 'VO'],
        ['codigo' => 'R06AA116', 'nombre' => 'Dimenhidrinato', 'dosis' => '50 mg/mL', 'forma' => 'Líquidos parenterales', 'via' => 'IM/IV']
    ]));

    $html = '<table border="1" cellpadding="5" style="border-collapse: collapse;">';
    $html .= '<tr><th>Código</th><th>Nº</th><th>Nombre</th><th>Dosis</th><th>Forma farmacéutica</th><th>Vía de administración</th></tr>';

    $numero = 1;
    foreach ($medicamentos as $med) {
        $html .= "<tr>
                    <td>{$med->codigo}</td>
                    <td>{$numero}</td>
                    <td>{$med->nombre}</td>
                    <td>{$med->dosis}</td>
                    <td>{$med->forma}</td>
                    <td>{$med->via}</td>
                  </tr>";
        $numero++;
    }

    $html .= '</table>';

    return $html;
});