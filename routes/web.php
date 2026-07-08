<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $html = '<h1>Guía de trabajo - Laravel</h1>';
    $html .= '<ul>';
    $html .= '<li><a href="/categorias">Categorías</a></li>';
    $html .= '<li><a href="/medicamentos">Medicamentos</a></li>';
    $html .= '<li><a href="/clientes/vip">Clientes VIP</a></li>';
    $html .= '<li><a href="/proveedores/internacionales">Proveedores Internacionales</a></li>';
    $html .= '<li><a href="/lotes/inventario">Inventario de Lotes</a></li>';
    $html .= '</ul>';
    return $html;
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
    $html .= '<thead><tr><th>Código</th><th>Categoría</th></tr></thead>';
    $html .= '<tbody>';
    foreach ($categorias as $cat) {
        $html .= "<tr><td>{$cat->codigo}</td><td>{$cat->categoria}</td></tr>";
    }
    $html .= '</tbody></table>';
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
    $html .= '<thead><tr><th>Código</th><th>Nº</th><th>Nombre</th><th>Dosis</th><th>Forma farmacéutica</th><th>Vía de administración</th></tr></thead>';
    $html .= '<tbody>';
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
    $html .= '</tbody></table>';
    return $html;
});

// Ejercicio 1: 
Route::get('/clientes/vip', function() {
    // Creamos la lista de clientes
    $clientes = [
        (object) ['id' => 1, 'nombre' => 'Karen Criollo', 'telefono' => '+503 70000000', 'puntos_acumulados' => 15],
        (object) ['id' => 2, 'nombre' => 'Joel Cruz', 'telefono' => '+503 76000000', 'puntos_acumulados' => 5],
        (object) ['id' => 3, 'nombre' => 'Cristofer Guevara', 'telefono' => '+503 76600000', 'puntos_acumulados' => 25],
        (object) ['id' => 4, 'nombre' => 'Edwin Carlos', 'telefono' => '+503 67676767', 'puntos_acumulados' => 67],
        (object) ['id' => 5, 'nombre' => 'Bryan Victor', 'telefono' => '+503 76767676', 'puntos_acumulados' => 76]
    ];

    // Creamos la tabla con los registros de los clientes de forma dinamica
    $html = '
        <table border=1 cellspacing=0>
            <thead>
                <tr>
                    <th>ID CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>TELEFONO</th>
                    <th>PUNTOS ACUMULADOS</th>
                </tr>
            </thead>
            <tbody>
    ';
    foreach($clientes as $cliente) {
        $html .= "
            <tr>
                <td>$cliente->id</td>
                <td>$cliente->nombre</td>
                <td>$cliente->telefono</td>
                <td>$cliente->puntos_acumulados</td>
            </tr>
        ";
    }
    $html .= '
            </tbody>
        </table>
    ';

    // Pintamos en la ventana del navegador la tabla
    echo $html;
});

// Ejercicio 2: 
Route::get('/proveedores/internacionales', function() {
    // primero creamos la lista de proveedores internacionales
    $proveedores = [
        (object) ['empresa' => 'MediGlobal S.A.', 'pais_origen' => 'Alemania', 'medicamento_principal' => 'Insulina Glargina', 'tiempo_entrega_dias' => 5],
        (object) ['empresa' => 'PharmaCure Ltd.', 'pais_origen' => 'India', 'medicamento_principal' => 'Paracetamol', 'tiempo_entrega_dias' => 18],
        (object) ['empresa' => 'BioNova Inc.', 'pais_origen' => 'EE.UU.', 'medicamento_principal' => 'Vacuna Antigripal', 'tiempo_entrega_dias' => 12],
        (object) ['empresa' => 'SaludMex SA', 'pais_origen' => 'México', 'medicamento_principal' => 'Omeprazol', 'tiempo_entrega_dias' => 22],
        (object) ['empresa' => 'EuroPharm GmbH', 'pais_origen' => 'Francia', 'medicamento_principal' => 'Dexametasona', 'tiempo_entrega_dias' => 8]
    ];

    // y despues creamos la tabla con los registros de los proveedores de forma dinámica
    $html = '
        <table border=1 cellspacing=0>
            <thead>
                <tr>
                    <th>EMPRESA</th>
                    <th>PAÍS DE ORIGEN</th>
                    <th>MEDICAMENTO PRINCIPAL</th>
                    <th>TIEMPO DE ENTREGA (días)</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($proveedores as $prov) {
        // aqui evaluamos si el tiempo de entrega es mayor a 15 días para mostrar advertencia
        $tiempo = $prov->tiempo_entrega_dias;
        $advertencia = ($tiempo > 15) ? ' (Demora Crítica)' : '';

        $html .= "
            <tr>
                <td>{$prov->empresa}</td>
                <td>{$prov->pais_origen}</td>
                <td>{$prov->medicamento_principal}</td>
                <td>{$tiempo}{$advertencia}</td>
            </tr>
        ";
    }

    $html .= '
            </tbody>
        </table>
    ';

    // Por ultimo pintamos en la ventana del navegador la tabla
    echo $html;
});
