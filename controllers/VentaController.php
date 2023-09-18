<?php

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;
use Model\Venta;
use Exception;

class VentaController
{
    public static function index(Router $router)
    {
        $router->render('ventas/index', []);
    }

    public static function buscarAPI()
    {
        $venta_fecha_inicio = $_GET['venta_fecha_inicio'];
        $venta_fecha_fin = $_GET['venta_fecha_fin'];
        $fechaInicioFormateada = date('Y-m-d H:i', strtotime($venta_fecha_inicio));
        $fechaFinFormateada = date('Y-m-d H:i', strtotime($venta_fecha_fin));

        $sql = "SELECT
                v.venta_fecha AS fecha,
                c.cliente_nombre AS cliente,
                p.producto_nombre AS producto,
                dv.detalle_cantidad AS cantidad
            FROM
                ventas v
                INNER JOIN detalle_ventas dv ON v.venta_id = dv.detalle_venta
                INNER JOIN clientes c ON v.venta_cliente = c.cliente_id
                INNER JOIN productos p ON dv.detalle_producto = p.producto_id
    
            WHERE
                v.venta_fecha BETWEEN '{$fechaInicioFormateada}' AND '{$fechaFinFormateada}'";

        try {
            $ventas = Venta::fetchArray($sql);
            echo json_encode($ventas);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    
 }    