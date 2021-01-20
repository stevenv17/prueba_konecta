<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prueba Konecta</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="col-lg-12 text-center">
        <hr/>
        <h3>Productos</h3>
        <table class="table">
            <tr>
                <td><strong>PRODUCTO</strong></td>
                <td><strong>REFERENCIA</strong></td>
                <td><strong>CATEGORIA</strong></td>
                <td><strong>PRECIO</strong></td>
                <td><strong>PESO</strong></td>
                <td><strong>STOCK</strong></td>
                <td><strong>ACCIONES</strong></td>
            </tr>
            <?php
            foreach ($productos as $p) {
                ?>
                <tr>
                    <td><?php echo $p->nombre; ?></td>
                    <td><?php echo $p->referencia; ?></td>
                    <td><?php echo $p->categoria; ?></td>
                    <td><?php echo $p->precio; ?></td>
                    <td><?php echo $p->peso; ?></td>
                    <td><?php echo $p->stock; ?></td>
                    <td>
                        <button type="button" class="btn btn-success" onclick=<?php echo 'setProductId('.$p->id.')'; ?> data-toggle="modal" data-target="#myModal">Editar</button>
                        <button type="button" class="btn btn-danger" onclick=<?php echo 'eliminarProduct('.$p->id.')'; ?>>Eliminar</button>
                    </td>

                </tr>
                <?php
            }
            ?>
        </table>

        <input type="hidden" id="product_id" value="">

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Producto</h4>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" id="nombre">
                        <br>
                        <label class="form-label">Referencia</label>
                        <input class="form-control" id="referencia">
                        <br>
                        <label class="form-label">Precio</label>
                        <input class="form-control" id="precio">
                        <br>
                        <label class="form-label">Peso</label>
                        <input class="form-control" id="peso">
                        <br>
                        <label class="form-label">Categoria</label>
                        <input class="form-control" id="categoria">
                        <br>
                        <label class="form-label">Stock</label>
                        <input class="form-control" id="stock">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>

        <script>
            function setProductId(id){
                document.getElementById("product_id").value = id;
            }

            function eliminarProduct(id){
                
            }
        </script>


        <hr/>
    </div>
    <footer class="col-lg-12 text-center">
        Steven - <?php echo date("Y"); ?>
    </footer>
</div>
</body>
</html>
