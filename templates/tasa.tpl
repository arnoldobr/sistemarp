{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
</header><!-- /header -->
		<div class="bg-secondary text-white text-center mb-2">Tasa de Cambio</div>
<main>
	<div class="container">
		<form action="tasa_submit" method="post" accept-charset="utf-8">
			<div class="form-group mx-sm-3 mb-2">
				<label for="tasa">Valor del $:</label>
				<input class="form-control" type="number" name="tasa" value="0" min="0" step="0.01">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Actualizar</button>
		</form>
	</div>
</main>
{include file="pie.tpl"}
