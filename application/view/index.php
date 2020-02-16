<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/datatables.min.css">
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-light bg-light justify-content-center">
    <a class="navbar-brand" href="#">
        <i class="fab fa-bootstrap fa-2x" style="color: darkviolet"></i>
        <span class="font-weight-bold align-middle w-100">Prueba</span>
    </a>
</nav>
<section class="container">
    <div class="row">
        <div class="col-12" id="message">

        </div>
        <div class="col-12">
            <table class="table" id="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Operación</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-end">
        <button class="btn btn-primary" type="button" id="btn-create"><i class="fas fa-plus"></i> Agregar</button>
    </div>
</section>

<!-- Modal Create and Update -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="form">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary" form="form"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Create and Update -->
<!-- Modal Create and Update -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Borrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Desea borrar a <span class="font-weight-bold" id="name-label"></span>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-danger" id="btn-delete"><i class="fas fa-save"></i> Borrar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Create and Update -->


<script src="assets/plugins/jquery-3.4.1.min.js"></script>
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/DataTables/datatables.min.js"></script>

<!-- Script -->
<script src="assets/js/script.js"></script>
</body>
</html>