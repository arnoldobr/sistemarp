{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
	</header><!-- /header -->
	<div class="bg-secondary text-white text-center mb-2">Inventario</div>
	<main>
		<div class="container">
			<form class="form" name="f_buscar_producto" id="f_buscar_producto"
				action="inventario.php" method="post" accept-charset="utf-8">
				<div class="row">
					<div class="col collapse" id="f-agregar"></div>
				</div>
			</form>
			<div class="row">
				<div class="col d-none d-sm-none d-md-block">{* En caso de ser escritorio *}
					<table class="table table-striped table-borderless" id="datatable1">
						<thead>
							<tr>
								<th>Cód.</th>
								<th>Nombre</th>
								<th>Und.</th>
								<th>Exist.</th>
								<th>P.V. ($)</th>
								<th><span class="text-primary">{"exclamation-triangle"|fa}</span></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Cód.</th>
								<th>Nombre</th>
								<th>Und.</th>
								<th>Exist.</th>
								<th>P.V. ($)</th>
								<th><span class="text-primary">{"exclamation-triangle"|fa}</span></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="col d-block d-sm-block d-md-none">{* En caso de ser celular *}
					{section name=ii loop=$d}
					<div class="card mt-3">
						<div class="card-header">
							<small>{$d[ii].id}</small> <strong>{$d[ii].nombre} ({$d[ii].unidad})</strong>
						</div>
						<div class="card-body">
								Existencia <strong>{$d[ii].existencia} / {$d[ii].minimo}</strong>

							<p class="text-right mb-0">	P.V.($): {$d[ii].p_venta}</p>
						</div>
					</div>
					{/section}
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
	$(function() {
		$('#datatable1').DataTable({
			"processing":true,
			"serverSide":true,
			"ajax":"libs/datatables/php/ajax_inventario.php",
			"language": {
				"show" : "Mostrar",
				"search" : "Buscar",
				"b" : "",
				"c" : "",
				"d" : "",
				"e" : "",
				"f" : ""
			}
		});
	});
</script>
{/literal}
