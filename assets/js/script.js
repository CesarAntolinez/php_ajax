$(document).ready(function() {
    //Inicializar el datatable
    var table = $('#table').DataTable({
        'ajax': 'api.php?action=get',
        "columns": [
            { "data": "id" },
            { "data": "name" },
        ],
        "columnDefs": [ {
            "targets": 2,
            "data": null,
            "defaultContent": "<button class=\"btn btn-warning update\" type=\"button\"><i class=\"fas fa-edit\"></i> Editar</button>" +
                "<button class=\"btn btn-danger delete\" type=\"button\"><i class=\"fas fa-trash\"></i> Eliminar</button>"
        } ]
    });

    //Limpiar formulario
    $('#modal').on('show.bs.modal', function (e) {
        var form = $('#form');
        form[0].reset();
    });

    //Acción de actualización
    $('#table tbody').on( 'click', '.update', function () {
        //Inicio el modal
        $('#modal').modal();
        //Capturo los datos
        var data = table.row( $(this).parents('tr') ).data();
        //Arreglar datos en el formulario
        var form = $('#form');
        form.attr('action', 'api.php?action=update&id=' + data.id);
        $('#name').val(data.name);
        $('#modal-title').html('Editar');
    } );

    //Acción de crear
    $('#btn-create').on('click', function (event) {
        //Inicio el modal
        $('#modal').modal();
        //Arreglar datos en el formulario
        var form = $('#form');
        form.attr('action', 'api.php?action=create');
        $('#modal-title').html('Crear');
    });

    //Envio de formulario
    $('#form').submit(function (event) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'json'
        }).done(function (data) {
            console.log(data);
            //Manipular el recivido
            if (data.status){
                switch (data.method) {
                    case "create":
                        table.row.add({id:data.data.id,name:data.data.name}).draw(false);
                        break;
                    case "update":
                        table.rows( function ( idx, response, node ) {
                            if (response.id === data.data.id){
                                table.row(idx).remove().draw();
                                table.row.add({id:data.data.id,name:data.data.name}).draw(false);
                            }
                        });
                        break;
                }
                $('#message').append('<div class="alert alert-info alert-dismissible fade show" role="alert">' +
                    '<strong>' + data.message + '</strong>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '</div>');
            }else{
                $('#message').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>' + data.message + '</strong>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '</div>');
            }

            $('#modal').modal('hide');
        });
    });

    //Acción de borrar
    $('#table tbody').on( 'click', '.delete', function () {
        //Inicio el modal
        $('#modal-delete').modal();
        //Capturo los datos
        var data = table.row( $(this).parents('tr') ).data();
        $('#btn-delete').data('url','api.php?action=delete&id=' + data.id);
        $('#name-label').html(data.name);
    } );

    //accion borrar
    $('#btn-delete').click(function (e) {
        var btn = $(this);
        $.ajax({
            type: "GET",
            url: btn.data('url'),
            dataType: 'json'
        }).done(function (data) {
            console.log(data);
            //Manipular el recivido
            if (data.status){
                table.rows( function ( idx, response, node ) {
                    if (response.id === data.data.id){
                        table.row(idx).remove().draw();
                    }
                });
                $('#message').append('<div class="alert alert-info alert-dismissible fade show" role="alert">' +
                    '<strong>' + data.message + '</strong>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '</div>');
            }else{
                $('#message').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>' + data.message + '</strong>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '</div>');
            }

            $('#modal-delete').modal('hide');
        });
    });

} );