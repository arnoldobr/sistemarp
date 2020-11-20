{* Smarty *}
<form>
	<div class="form-group mb-0">
		<div class="form-row">
			<div class="col-md-4 mb-3">
				{$f_codigo}
			</div>
			<div class="col-md-8 mb-3">
				{$f_nombre}
			</div>
		</div>
	</div>
	<div class="form-group  mb-0">
		<div class="form-row">
			<div class="col-md-4 mb-3">
				{$f_unidad}
			</div>
			<div class="col-md-8 mb-3">
				{$f_categoria}
			</div>
		</div>
	</div>
	<div class="form-group mb-0">
		<div class="form-row">
			<div class="col-md-6 mb-3">
				{$f_p_compra}
			</div>
			<div class="col-md-6 mb-3">
				{$f_p_venta}
			</div>
		</div>
	</div>
	<div class="form-group mb-0">
		<div class="form-row">
			<div class="col-md-6 mb-3">
				{$f_cantidad}
			</div>
			<div class="col-md-6 mb-3">
				{$f_minimo}
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="detalle">Detalles adicionales</label>
		<textarea class="form-control" rows="3" name="detalle" id="detalle"></textarea>
		<small class="text-muted form-text">Detalles adicionales del producto</small>
	</div>
	<!-- div class="form-group">
		<label for="imagen">Imagen</label>
		<div class="custom-file">
					<input type="file" class="custom-file-input"  name="imagen" id="imagen">
					<label class="custom-file-label" for="imagen">.jpg</label>
		</div>
		<small class="text-muted form-text">Seleccione imagen .jpg</small>
</div -->
<button type="submit" class="btn btn-primary" name="submit" id="submit">Guardar</button>
</form>
