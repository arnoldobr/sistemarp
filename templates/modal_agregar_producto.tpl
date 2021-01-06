{* Smarty *}
<form action="modal_agregar_producto_proc.php" method="post" accept-charset="utf-8">
	<div class="form-group mb-0">
		<div class="form-row">
			<div class="col-md-4 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-key"></i></div>
					</div>
					<input id="id" name="id" placeholder="Código del producto" type="text" class="form-control" aria-describedby="idHelpBlock" required="required" capture>
				</div>
				<span id="idHelpBlock" class="form-text text-muted small">Escriba el código del producto</span>
			</div>
			<div class="col-md-8 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-box-open"></i></div>
					</div>
					<input id="nombre" name="nombre" placeholder="Nombre del producto" type="text" class="form-control" aria-describedby="nombreHelpBlock" required="required">
				</div>
				<span id="nombreHelpBlock" class="form-text text-muted small">Describa bien el producto</span>
			</div>
		</div>
	</div>
	<div class="form-group  mb-0">
		<div class="form-row">
			<div class="col-md-4 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-ruler"></i></div>
					</div>
					<input id="unidad" name="unidad" placeholder="Unidad" class="form-control" required="required"  list="unidades">
					<datalist id="unidades">
						{section name=i loop=$unidades}<option value="{$unidades[i].unidad}">{$unidades[i].unidad}</option>{/section}
					</datalist>
				</div>
			</div>
			<div class="col-md-8 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-tags"></i></div>
					</div>
					<input id="categoria_id" name="categoria_id" placeholder="Categoría" type="text" class="form-control" required="required" list="categorias">
					<datalist id="categorias">
						{section name=j loop=$categorias}<option value="{$categorias[j].nombre}">{$categorias[j].nombre}</option>{/section}
					</datalist>
				</div>
				<span id="categoria_idHelpBlock" class="form-text text-muted small">Seleccione o escriba...</span>
			</div>
		</div>
	</div>
	<div class="form-group mb-0">
		<div class="form-row">
			<div class="col-md-6 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-money-bill" aria-hidden="true"></i></div>
					</div>
					<input id="p_compra" name="p_compra" placeholder="Precio de compra" type="text" class="form-control" required="required">
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-money-bill"></i></div>
					</div>
					<input id="p_venta" name="p_venta" placeholder="Precio de venta" type="text" class="form-control" required="required">
				</div>
			</div>
		</div>
	</div>
	<div class="form-group mb-0">
		<div class="form-row">
			<div class="col-md-6 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-eye"></i></div>
					</div>
					<input id="cantidad" name="cantidad" placeholder="Cantidad" type="text" class="form-control" required="required">
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-battery-quarter"></i></div>
					</div>
					<input id="minimo" name="minimo" placeholder="Existencia mínima" type="text" class="form-control" required="required">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<textarea class="form-control" rows="3" name="detalle" id="detalle" placeholder="Detalles adicionales"></textarea>
	<small class="text-muted form-text">Detalles adicionales del producto</small>
</div>
<button name="submit" type="submit" class="btn btn-primary">Agregar</button>
</form>
