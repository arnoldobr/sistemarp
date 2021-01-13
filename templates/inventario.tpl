{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
	</header><!-- /header -->
	<div class="bg-secondary text-white text-center mb-2">Inventario</div>
	<main>
		<div class="container">
			<div class="row">
				<div class="col">{* En caso de ser escritorio *}
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
				<div id="datamovil1" class="col-lg-3 col-md-6 mb-4 mb-lg-0">
				</div>
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
				"url":"libs/datatables/php/datatable.es.json"
			},
			"initComplete":function (settings,json) {
				$("#datamovil1").insertBefore('#datatable1');
				$("#datamovil1").show();
			},
			"rowCallback": function (row,data) {
				fila=`<div class="card">
						<div class="card-header">
							<small>${data[0]}</small> <strong>${data[1]} (${data[2]})</strong>
						</div>
						<div class="card-body">
								Existencia <strong>${data[3]} / ${data[5]}</strong>

							<p class="text-right mb-0">	P.V.($): ${data[4]}</p>
						</div>
					</div>`;
				
				$('#datamovil1').append(fila); 
			},
			"preDrawCallback":function (settings) {
			$("#datamovil1").empty();
			$("#datatable1").empty();
			}
		});
	});
</script>
{/literal}
