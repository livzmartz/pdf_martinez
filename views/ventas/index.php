<h1 class="text-center">Detalle de ventas</h1>

<div class="row justify-content-center mb-5">
<form class="col-lg-8 border bg-light p-3" id="formularioVenta">
        <div class="row mb-3">
            <div class="col">
                <label for="venta_fecha_inicio">Ingresa la fecha inicial a consultar</label>
                <input type="date" name="venta_fecha_inicio" id="venta_fecha_inicio" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="venta_fecha_fin">Ingresa la fecha final a consultar</label>
                <input type="date" name="venta_fecha_fin" id="venta_fecha_fin" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
          
    </form>
</div>

<script src="<?= asset('./build/js/ventas/index.js')  ?>"></script>