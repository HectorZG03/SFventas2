<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
session_start();
if(empty($_SESSION['usuario'])) header("location: login.php");
$cartas = [
    ["titulo" => "Total ventas", "icono" => "fa fa-money-bill", "total" => "$".obtenerTotalVentas(), "color" => "#A71D45"],
    ["titulo" => "Ventas hoy", "icono" => "fa fa-calendar-day", "total" => "$".obtenerTotalVentasHoy(), "color" => "#2A8D22"],
    ["titulo" => "Ventas semana", "icono" => "fa fa-calendar-week", "total" => "$".obtenerTotalVentasSemana(), "color" => "#223D8D"],
    ["titulo" => "Ventas mes", "icono" => "fa fa-calendar-alt", "total" => "$".obtenerTotalVentasMes(), "color" => "#D55929"],
];

$totales = [
	["nombre" => "Total productos", "total" => obtenerNumeroProductos(), "imagen" => "img/productos.png"],
	["nombre" => "Ventas registradas", "total" => obtenerNumeroVentas(), "imagen" => "img/ventas.png"],
	["nombre" => "Usuarios registrados", "total" => obtenerNumeroUsuarios(), "imagen" => "img/usuarios.png"],
	["nombre" => "Clientes registrados", "total" => obtenerNumeroClientes(), "imagen" => "img/clientes.png"],
];

$ventasUsuarios = obtenerVentasPorUsuario();
$ventasClientes = obtenerVentasPorCliente();
$productosMasVendidos = obtenerProductosMasVendidos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		/* Establecer un azul difuminado casi blanco para el fondo de las tarjetas */
		.card {
			background-color: #f0f8ff; /* Un azul muy claro, casi blanco */
			border-color: var(--azul-primario);
		}

		/* Aplicar el nuevo color de fondo a los botones también */
		.btn {
			background-color: #f0f8ff; /* Un azul muy claro, casi blanco */
			color: var(--negro); /* Texto en negro para contraste */
			border: 1px solid var(--azul-primario); /* Borde azul para definir el botón */
		}

		/* Asegurarse de que el texto del botón sea visible */
		.btn:hover {
			background-color: var(--azul-primario); /* Azul más oscuro al pasar el ratón */
			color: var(--blanco); /* Texto en blanco para contraste */
		}



	</style>
</head>
<body>
	<div class="container">
		<div class="alert alert-info" role="alert">
			<h1>
				Hola, <?= $_SESSION['usuario']?>
			</h1>
		</div>
		<div class="card-deck row mb-2">
		<?php foreach($totales as $total){?>
			<div class="col-xs-12 col-sm-6 col-md-3" >
				<div class="card text-center">
					<div class="card-body">
						<img class="img-thumbnail" src="<?= $total['imagen']?>" alt="">
						<h4 class="card-title" >
							<?= $total['nombre']?>
						</h4>
						<h2><?= $total['total']?></h2>

					</div>
				</div>
			</div>
			<?php }?>
		</div>

		<?php include_once "cartas_totales.php"?>

		<div class="row mt-2">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h4>Ventas por usuarios</h4>
						<table class="table">
							<thead>
								<tr>
									<th>Nombre usuario</th>
									<th>Número ventas</th>
									<th>Total ventas</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($ventasUsuarios as $usuario) {?>
									<tr>
										<td><?= $usuario->usuario?></td>
										<td><?= $usuario->numeroVentas?></td>
										<td>$<?= $usuario->total?></td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>	 		
			</div>
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h4>Ventas por clientes</h4>
						<table class="table">
							<thead>
								<tr>
									<th>Nombre cliente</th>
									<th>Número compras</th>
									<th>Total ventas</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($ventasClientes as $cliente) {?>
									<tr>
										<td><?= $cliente->cliente?></td>
										<td><?= $cliente->numeroCompras?></td>
										<td>$<?= $cliente->total?></td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<!-- Botón con diseño mejorado usando la paleta de colores -->
				<button id="toggleButton" class="btn" style="background-color: var(--azul-primario); color: var(--blanco); border: none; padding: 10px 20px; margin-bottom: 20px;">
					Mostrar Productos Más Vendidos
				</button>
				
				<!-- Encabezado para la tabla -->
				<h4>10 Productos más vendidos</h4>
				
				<!-- Tabla de productos -->
				<table class="table" id="productosMasVendidos" style="display: none;">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Unidades vendidas</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<!-- Código PHP para generar filas de la tabla -->
						<?php foreach($productosMasVendidos as $producto) {?>
						<tr>
							<td><?= $producto->nombre?></td>
							<td><?= $producto->unidades?></td>
							<td>$<?= $producto->total?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</body>
</html>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		var toggleButton = document.getElementById('toggleButton');
		var productosTable = document.getElementById('productosMasVendidos');

		toggleButton.addEventListener('click', function () {
			if (productosTable.style.display === 'none') {
				productosTable.style.display = 'block';
				toggleButton.textContent = 'Ocultar Productos Más Vendidos';
			} else {
				productosTable.style.display = 'none';
				toggleButton.textContent = 'Mostrar Productos Más Vendidos';
			}
		});

		// Inicialmente ocultar la tabla
		productosTable.style.display = 'none';
	});
</script>
