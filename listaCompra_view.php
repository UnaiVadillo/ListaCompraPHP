<html>
<head>
<title>Lista de la compra</title>
</head>
<?php include ("ArrayBD.php")?>
<body>
<h1>Lista de la compra</h1>
<div id="productos">

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>¿Comprar?</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($arrayProductos as $id => $producto){?>
            <tr>
                <td><?=$producto["id"]?></td>
                <td><?=$producto["nombre"]?></td>
                <td><?=$producto["precio"]?></td>
                <td><a href="http://localhost:63342/ListaCompra/listaCompra.php?action=comprar&id=<?=$id?>">Añadir a la cesta</a> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<h2>Cesta</h2>
<ul>
    <?php if ($arraySesion != null){?>
        <?php foreach ($arraySesion as $id):?>
            <li><?=$arrayProductos[$id]["nombre"]?> <!--<a href="http://localhost:63342/ListaCompra/code.php?action=borrarProducto&id=<?=$id?>">Borrar de la lista</a>-->
            </li>
        <?php endforeach; ?>
    <?php } ?>
</ul>
<p>Precio total: <?= calcularPrecio($arrayProductos,$arraySesion) ?></p>
<a href="http://localhost:63342/ListaCompra/listaCompra.php?action=borrar">Borrar</a>
</body>
</html>