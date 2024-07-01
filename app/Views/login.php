<section class="section" style="margin: 10px;">

<section class="panel" id="panelEntrada">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title" id="documento">Entrada por compra</h2>
    </header>
    <div class="panel-body">
        <div class="row" style="margin: 10px 0px;">
                <button id="datosproveedor" href="#datosprov" class="btn btn-primary modal-with-form" onclick="abrirModalProveedor()">Datos del proveedor <i class="fa fa-list-alt"></i></button>
                <button id="entrada" class="btn btn-primary" onclick="abrirModalEntrada()">Entrada Por Compra <i class="fa fa-truck" aria-hidden="true"></i> </button>
                <button id="verdetalle" class="btn btn-primary" onclick="abrirdetalles()">Ver Detalle <i class="fa fa-print"></i></button>
                <button id="excel" type="button" class="btn btn-primary" onclick="crearExcell()">Excel <i class="fa fa-file-excel-o"></i> </button>
        </div>
        <div class="row" style="margin: 10px 15px; overflow-x: none;">
            <div id="tablaEntradaCompra_wrapper" class="dataTables_wrapper no-footer"><div class="row datatables-header form-inline"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"><div id="tablaEntradaCompra_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Buscar" aria-controls="tablaEntradaCompra"></label></div></div></div><div class="table-responsive"><table class="table table-bordered table-striped mb-none dataTable no-footer" id="tablaEntradaCompra" role="grid" aria-describedby="tablaEntradaCompra_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column ascending" style="width: 2%;"></th><th class="sorting" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-label="Orden de compra: activate to sort column ascending" style="width: 10%;">Orden de compra</th><th class="sorting" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-label="maquinaria: activate to sort column ascending" style="width: 10%;">maquinaria</th><th class="sorting" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-label="Obra: activate to sort column ascending" style="width: 15%;">Obra</th><th class="sorting" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-label="Proveedor: activate to sort column ascending" style="width: 15%;">Proveedor</th><th class="sorting" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-label="Estado de entrega: activate to sort column ascending" style="width: 15%;">Estado de entrega</th><th class="sorting" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-label="Factura: activate to sort column ascending" style="width: 6%;">Factura</th><th class="sorting" tabindex="0" aria-controls="tablaEntradaCompra" rowspan="1" colspan="1" aria-label="Observaciones: activate to sort column ascending" style="width: 27%;">Observaciones</th></tr>
                </thead>
                <tbody>
                <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr></tbody>
            </table></div><div class="row datatables-footer"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="tablaEntradaCompra_info" role="status" aria-live="polite">Página 0 de 0 de 0 registros</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_bs_normal" id="tablaEntradaCompra_paginate"><ul class="pagination"><li class="prev disabled"><a href="#"><span class="fa fa-chevron-left"></span></a></li><li class="next disabled"><a href="#"><span class="fa fa-chevron-right"></span></a></li></ul></div></div></div></div>
        </div>
    </div>
</section>

<h1>Hello, world!</h1>

<button class="btn btn-primary">juan</button>

</section>