{* Smarty *}
{include file="cabecera.tpl"}
<header id="header" class="">
	{include file="menu_nav.tpl"}
</header><!-- /header -->
		<div class="bg-secondary text-white text-center mb-2">Tasa de Cambio</div>
<main>
	<div class="container text-center">
		<form class="tasa" action="" method="post" accept-charset="utf-8">
			<div class="form-group mx-sm-3 mb-2">
				<label for="tasa">Valor del $:</label>
				<input class="form-control" type="number" name="tasa" value="517784.72" min="0" step="0.01">
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
    <tr>
      <td scope="row">30-10-2020</td><td>517784.72</td>
    </tr>
    <tr>
      <td scope="row">29-10-2020</td><td>505275.44</td>
    </tr>
    <tr>
      <td scope="row">28-10-2020</td><td>486996.47</td>
    </tr>
    <tr>
      <td scope="row">27-10-2020</td><td>470010.84</td>
    </tr>
  </tbody>
</table>



	</div>

</main>
{include file="pie.tpl"}
