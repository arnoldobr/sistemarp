{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
</header><!-- /header -->
		<div class="bg-secondary text-white text-center mb-2">Tasa de Cambio</div>
<main>
	<div class="container text-center">
		<form class="tasa" action="actualizar_tasa.php" method="post" accept-charset="utf-8">
			<div class="form-group mx-sm-3 mb-2">
				<label for="tasa">Valor del $: {$d[0]['tasa']|number_format:2:",":" "}</label>
				<input class="form-control" type="number" name="tasa" value="" min="0" step="0.01">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Actualizar</button>
		</form>

		<div class="bg-light text-secondary text-center mb-2">Tasa de Cambio</div>

<table class="table table-sm table-striped" style="max-width: 500px;margin:0 auto">
  <thead>
    <tr>
      <th scope="col">Fecha</th><th scope="col">Cotización</th>
    </tr>
  </thead>
  <tbody>
    {section name=i loop=$d}<tr>
      <td scope="row">{$d[i].f_tasa}</td><td class="text-right" >{$d[i].tasa|number_format:2:",":" "}</td>
    </tr>{/section}
  </tbody>
</table>

	</div>
</main>
{include file="pie.tpl"}

