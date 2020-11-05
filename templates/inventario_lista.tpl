{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
</header><!-- /header -->
		<div class="bg-secondary text-white text-center mb-2">Inventario</div>
<main>
	<div class="container">				
		<div class="row">
			<div class="col">
				<div class="t1"><a href="inventario.php">Agregar Producto</a></div>
			</div>
			<div class="col t1 text-right">{"list"|fa}</div>
		</div>
<table class="table table-responsive">
			<thead>
				<tr>
					<th>Cód.</th>
					<th>Nombre</th>
					<th>Und.</th>
					<th>Exist.</th>
					<th>P.V. (Bs.)</th>
					<th>{"exclamation-triangle"|fa}</th>
				</tr>
			</thead>
			<tbody>
{section name=i loop=$d}
				<tr>
					<td>{$d[i].id}</td>
					<td>{$d[i].nombre}</td>
					<td>{$d[i].unidad}</td>
					<td>{$d[i].cant}</td>
					<td>{$d[i].p_venta}</td>
					<td>{$d[i].min}</td>
				</tr>
{/section}
			</tbody>
		</table>		

	</div>
</main>
{include file="pie.tpl"}
