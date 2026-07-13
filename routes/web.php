<?php
//Diego Anderson Ortiz Carcamo 3-1 DS
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $html = '<h1>Guía de trabajo - Laravel</h1>';
    $html .= '<ul>';
    $html .= '<li><a href="/categorias">Categorías</a></li>';
    $html .= '<li><a href="/medicamentos">Medicamentos</a></li>';
    $html .= '<li><a href="/clientes/vip">Clientes VIP</a></li>';
    $html .= '<li><a href="/proveedores/internacionales">Proveedores Internacionales</a></li>';
    $html .= '<li><a href="/lotes/inventario">Inventario de Lotes</a></li>';
    $html .= '<li><a href="/facturas/clientes/historial">Historial de Facturas de Clientes</a></li>';
    $html .= '<li><a href="/facturas/clientes/detalle/1">Detalle de Factura (ejemplo #1)</a></li>';
    $html .= '<li><a href="/facturas/clientes/detalle/99">Detalle de Factura (no encontrada)</a></li>';
    $html .= '<li><a href="/facturas/proveedores/resumen">Resumen de Facturas de Proveedores</a></li>';
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

// Ejercicio 3:
Route::get('/lotes/inventario', function() {
    // Creamos la lista de lotes de medicamentos
    $lotes = [
        (object) ['codigo_lote' => 'LOT-001', 'nombre_medicamento' => 'Vacuna COVID-19', 'cantidad_cajas' => 45, 'temperatura_requerida_celsius' => 2],
        (object) ['codigo_lote' => 'LOT-002', 'nombre_medicamento' => 'Paracetamol 500mg', 'cantidad_cajas' => 120, 'temperatura_requerida_celsius' => 25],
        (object) ['codigo_lote' => 'LOT-003', 'nombre_medicamento' => 'Insulina Rápida', 'cantidad_cajas' => 30, 'temperatura_requerida_celsius' => 4],
        (object) ['codigo_lote' => 'LOT-004', 'nombre_medicamento' => 'Omeprazol 20mg', 'cantidad_cajas' => 80, 'temperatura_requerida_celsius' => 20],
        (object) ['codigo_lote' => 'LOT-005', 'nombre_medicamento' => 'Vacuna Antineumocócica', 'cantidad_cajas' => 15, 'temperatura_requerida_celsius' => 3],
        (object) ['codigo_lote' => 'LOT-006', 'nombre_medicamento' => 'Ibuprofeno 600mg', 'cantidad_cajas' => 95, 'temperatura_requerida_celsius' => 25]
    ];

    // Creamos la tabla con los registros de los lotes de forma dinámica
    $html = '
        <table border=1 cellspacing=0>
            <thead>
                <tr>
                    <th>CÓDIGO DE LOTE</th>
                    <th>MEDICAMENTO</th>
                    <th>CANTIDAD (cajas)</th>
                    <th>TEMPERATURA REQUERIDA (°C)</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($lotes as $lote) {
        // Evaluamos si la temperatura es menor o igual a 5°C para agregar la etiqueta de cadena de frío
        $nombre = $lote->nombre_medicamento;
        if ($lote->temperatura_requerida_celsius <= 5) {
            $nombre .= ' <span style="color: blue; font-weight: bold;">[Requiere Cadena de Frío]</span>';
        }

        $html .= "
            <tr>
                <td>{$lote->codigo_lote}</td>
                <td>{$nombre}</td>
                <td>{$lote->cantidad_cajas}</td>
                <td>{$lote->temperatura_requerida_celsius}</td>
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

//Ejercicio 4:
Route::get('/facturas/clientes/historial', function () {
    // primero se simula una base de datos con un arreglo de objetos
    $facturas = [
        (object) ['num_factura'   => 1,'cliente'       => 'María González','fecha_emision' => '2026-07-01','total_pagar'   => 150.75,'estado'        => 'Pagada'],
        (object) ['num_factura'   => 2,'cliente'       => 'Carlos Rivera','fecha_emision' => '2026-07-03','total_pagar'   => 320.00,'estado'        => 'Pendiente'],
        (object) ['num_factura'   => 3,'cliente'       => 'Ana de León','fecha_emision' => '2026-07-05','total_pagar'   => 89.50,'estado'        => 'Pagada'],
        (object) ['num_factura'   => 4,'cliente'       => 'Luis Méndez','fecha_emision' => '2026-07-07','total_pagar'   => 210.30,'estado'        => 'Pendiente']
    ];

    $html = '<h2>Historial General de Facturas de Clientes</h2>';
    $html .= '<table border="1" cellspacing="0" style="border-collapse: collapse;">';
    $html .= '<thead><tr>
                <th>N° Factura</th>
                <th>Cliente</th>
                <th>Fecha de Emisión</th>
                <th>Total a Pagar</th>
                <th>Estado</th>
              </tr></thead>';
    $html .= '<tbody>';

    foreach ($facturas as $fact) {
        // resaltar estado "Pendiente" con mayúsculas y símbolo de alerta
        $estado = $fact->estado;
        if ($estado === 'Pendiente') {
            $estado = '<strong style="color: red; text-transform: uppercase;">PENDIENTE DE COBRO</strong>';
        }
        $html .= "<tr>
                    <td>{$fact->num_factura}</td>
                    <td>{$fact->cliente}</td>
                    <td>{$fact->fecha_emision}</td>
                    <td>\${$fact->total_pagar}</td>
                    <td>{$estado}</td>
                  </tr>";
    }

    $html .= '</tbody></table>';
    echo $html;
});

//Ejercicio 5
Route::get('/facturas/clientes/detalle/{numero}', function ($numero) {
    $facturas = [
        (object) ['num_factura'   => 1,'cliente'       => 'María González','fecha_emision' => '2026-07-01','total_pagar'   => 150.75,'estado'        => 'Pagada'],
        (object) ['num_factura'   => 2,'cliente'       => 'Carlos Rivera','fecha_emision' => '2026-07-03','total_pagar'   => 320.00,'estado'        => 'Pendiente'],
        (object) ['num_factura'   => 3,'cliente'       => 'Ana de León','fecha_emision' => '2026-07-05','total_pagar'   => 89.50,'estado'        => 'Pagada'],
        (object) ['num_factura'   => 4,'cliente'       => 'Luis Méndez','fecha_emision' => '2026-07-07','total_pagar'   => 210.30,'estado'        => 'Pendiente']
    ];

    // Buscar la factura por número
    $facturaEncontrada = null;
    foreach ($facturas as $fact) {
        if ($fact->num_factura == $numero) {
            $facturaEncontrada = $fact;
            break;
        }
    }

    if ($facturaEncontrada) {
        // Ficha de factura con divs, h2, strong, ul
        $html = '<div style="border: 2px solid #333; padding: 20px; max-width: 500px; margin: 20px auto; background: #f9f9f9;">';
        $html .= '<h2 style="color: #2c3e50;">Ficha de Factura N° ' . $facturaEncontrada->num_factura . '</h2>';
        $html .= '<ul style="list-style: none; padding: 0;">';
        $html .= '<li><strong>Cliente:</strong> ' . $facturaEncontrada->cliente . '</li>';
        $html .= '<li><strong>Fecha de Emisión:</strong> ' . $facturaEncontrada->fecha_emision . '</li>';
        $html .= '<li><strong>Total a Pagar:</strong> $' . number_format($facturaEncontrada->total_pagar, 2) . '</li>';
        $html .= '<li><strong>Estado:</strong> ' . $facturaEncontrada->estado . '</li>';
        $html .= '</ul>';
        $html .= '</div>';
    } else {
        $html = '<h1 style="color: red;">Factura No Encontrada</h1>';
    }

    echo $html;
});

//Ejercicio 6
Route::get('/facturas/proveedores/resumen', function () {
    $facturasProveedores = [
        (object) ['proveedor' => 'Laboratorios Pfizer', 'nrc' => 'NRC001', 'monto_sin_iva' => 1000.00],
        (object) ['proveedor' => 'Farmacéutica Roche',  'nrc' => 'NRC002', 'monto_sin_iva' => 2500.50],
        (object) ['proveedor' => 'MediHealth SA',       'nrc' => 'NRC003', 'monto_sin_iva' => 780.25],
        (object) ['proveedor' => 'BioGen Labs',         'nrc' => 'NRC004', 'monto_sin_iva' => 3400.00],
    ];

    // Inicializamos acumuladores para el total general
    $totalSinIvaGlobal = 0;
    $totalIvaGlobal    = 0;
    $totalConIvaGlobal = 0;

    $html = '<h2>Libro de Facturas de Proveedores</h2>';
    $html .= '<table border="1" cellspacing="0" style="border-collapse: collapse; width: 80%;">';
    $html .= '<thead><tr>
                <th>Proveedor</th>
                <th>NRC</th>
                <th>Monto sin IVA</th>
                <th>IVA (13%)</th>
                <th>Monto Total</th>
              </tr></thead>';
    $html .= '<tbody>';

    foreach ($facturasProveedores as $fp) {
        // Cálculos por fila
        $iva = $fp->monto_sin_iva * 0.13;
        $total = $fp->monto_sin_iva + $iva;

        // Acumulamos
        $totalSinIvaGlobal += $fp->monto_sin_iva;
        $totalIvaGlobal    += $iva;
        $totalConIvaGlobal += $total;

        $html .= "<tr>
                    <td>{$fp->proveedor}</td>
                    <td>{$fp->nrc}</td>
                    <td>\$" . number_format($fp->monto_sin_iva, 2) . "</td>
                    <td>\$" . number_format($iva, 2) . "</td>
                    <td>\$" . number_format($total, 2) . "</td>
                  </tr>";
    }

    // Fila de totales en tfoot
    $html .= '</tbody>';
    $html .= '<tfoot style="font-weight: bold; background: #e0e0e0;">';
    $html .= '<tr>
                <td colspan="2" style="text-align: right;">TOTALES</td>
                <td>$' . number_format($totalSinIvaGlobal, 2) . '</td>
                <td>$' . number_format($totalIvaGlobal, 2) . '</td>
                <td>$' . number_format($totalConIvaGlobal, 2) . '</td>
              </tr>';
    $html .= '</tfoot>';
    $html .= '</table>';

    echo $html;
});
