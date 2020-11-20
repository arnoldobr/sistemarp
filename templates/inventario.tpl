{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
	</header><!-- /header -->
	<div class="bg-secondary text-white text-center mb-2">Inventario</div>
	<main>
		<div class="container">
			<form class="form" name="f_buscar_producto" id="f_buscar_producto"
				action="" method="get" accept-charset="utf-8">
				<div class="row">
					<div class="col">
						<select class="form-control" name="filtro" style="text-align: center;text-align-last: center; ">
							<option value="Todos" class="">Categoría: Todos</option>
							<option value="Aparatos">Aparatos de cocina</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-sm-10 float-left">
						<div class="input-group">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-success" >
								<span>{"search"|fa}</span>
								<span class="d-none d-md-none d-lg-inline"> Buscar </span></button>
							</div>
							<input type="text" class="form-control" name="texto" placeholder="Texto a buscar...">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col collapse" id="f-agregar"></div>
				</div>
			</form>
			<div class="row">
				<div class="col">
					<table class="table table-striped table-borderless">
						<thead>
							<tr>
								<th>Cód.</th>
								<th>Nombre</th>
								<th>Und.</th>
								<th>Exist.</th>
								<th>P.V. (Bs.)</th>
								<th><span class="text-primary">{"exclamation-triangle"|fa}</span></th>
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
			</div>
		<a id="btn-modal1" class="flotante" title="Agregar Producto">
		<span class="fa-stack fa-2x">
			<i class="fa fa-circle fa-stack-2x text-pimary"></i>
			<i class="fa fa-plus fa-stack-1x fa-inverse"></i>
		</span>
		</a>
		</div>
	</main>

{include file="modal_lg_cab.tpl"  modal="modal1" titulo="Agregar Producto"}
{include file="modal_lg_pie.tpl"}

{include file="pie.tpl"}
<!-- script src=""></script -->
{literal}
<script>
	$('#btn-modal1').on('click', function(){
		$('#body-modal1').load('modal_agregar_producto.php', function(){
			$('#modal1').modal('show');
		});
	});
</script>
{/literal}
