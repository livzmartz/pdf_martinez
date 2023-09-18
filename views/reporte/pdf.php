<style>
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            border: 2px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
    
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <br>
    <h2>Clientes y Productos</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta) : ?>
                <tr>
                    <td><?= $venta->fecha ?></td>
                    <td><?= $venta->cliente ?></td>
                    <td><?= $venta->producto ?></td>
                    <td><?= $venta->cantidad ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>