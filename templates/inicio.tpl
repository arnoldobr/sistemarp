{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
</header><!-- /header -->
<main>
	<div class="container">
		<div class="row no-gutters mt-2">
			<div class="col">
				<a href="tasa.php"
					class="btn btn-sm btn-outline-primary btn-block text-nowrap">
					TASA DEL DÍA<br>
					<i class="fa fa-money-bill"></i>
				</a>
			</div>
			<div class="col">
				<a href="compras.php"
					class="btn btn-sm btn-outline-primary btn-block">
					COMPRAS<br>
					<i class="fa fa-boxes"></i>
				</a>
			</div>
			<div class="col">
				<a href="ventas.php"
					class="btn btn-sm btn-outline-primary btn-block">
					VENTAS<br>
					<i class="fa fa-shopping-cart"></i> </a>
			</div>

			</div>
		<div class="row">
		<div class="col">
{section name=i loop=$d}
		<div class="mt-3 alert alert-info alert-dismissible fade show" role="alert">
			  <strong>{$d[i].f_creado}</strong>: {$d[i].texto}
			  <a href="cancelar_nota.php?id={$d[i].id}" 	class="close">
			    <span aria-hidden="true">&times;</span>
			  </a>
		</div>
{/section}
			</div>
		</div>
	</div>
</main>
{include file="pie.tpl"}
