<?php
    $Clientes = ControllerClientes::ctrMostrarClientes(null,null);
    $totalClientes = count($Clientes);

    $categorias = ControllerCategorias::ctrMostrarCategorias(null,null);
    $totalCategorias = count($categorias);

    $productos = ControllerProductos::ctrMostrarProductos(null,null);
    $totalProductos = count($productos);

    $totalVentas = ControllerVentas::ctrSumaTotalVentas();
?>


<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>$<?php echo number_format($totalVentas["total"],2); ?></h3>
            <p>Ingresos</p>
        </div>

        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        
        <a href="ventas" class="small-box-footer">
            Mas Informacion <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3><?php echo number_format($totalProductos); ?></h3>
            <p>Productos</p>
        </div>
        <div class="icon">
            <i class="fa fa-star"></i>
        </div>
        <a href="productos" class="small-box-footer">
            Mas Informacion <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?php echo number_format($totalClientes); ?></h3>
            <p>Clientes Registrados</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="clientes" class="small-box-footer">
            Mostar Clientes <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3><?php echo number_format($totalCategorias); ?></h3>
            <p>Categorias</p>
        </div>
        <div class="icon">
            <i class="fa fa-folder"></i>
        </div>
        <a href="categorias" class="small-box-footer">
            Mas Informacion <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>