@extends('template.default')
@section('content')
<style>
    .manager-feira{
        padding-left: 10px;
    }
    i.fa.fa-check-square-o {
        color: green;
    }
    i.fa.fa-close {
        color: red;
    }
</style>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Lista de Feiras
        </h3>
    </div>
</div>

<div class="panel panel-warning">
    <div class="panel-heading">Feiras ativas</div>
    <div class="panel-body">
        <table id="feiras" class="hover row-border" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Tema</th>
                    <th>Local</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $info)
                    <tr>
                        <?php   $data = date_create($info->data);
                                $newData = date_format($data, "d-m-Y H:i");
                        ?>
                        <td>{{$info->tipo or "" }}</td>
                        <td>{{$info->tema or "" }}</td>
                        <td>{{$info->local or "" }}</td>
                        <td>{{$newData or "" }}</td>
                        <td>
                            <a href="/feira/ver/{{$info->id or ""}}">
                                <i class="fa fa-edit" id="editar_feira" title="Editar a feira"> </i>
                            </a>
                            <?php $title = $info->status == 0 ? "Habilitar feira" : "Desabilitar feira" ?>
                            <?php $fa_icon = $info->status == 1 ? "fa-check-square-o" : "fa-close" ?>
                            <?php $status = $info->status == 1 ? 0 : 1 ?>
                            <a href="" value="{{$info->id or ""}}" status="{{$status}}" class="manager-feira">
                                <i class="fa {{$fa_icon}}" value="{{$info->id or ""}}" title="{{$title}}"> </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#feiras").DataTable({
        "language": {
            "lengthMenu": "Listar _MENU_ Por página",
            "zeroRecords": "Nada para mostrar - Desculpe",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Buscado em _MAX_ registros no total)",
            "search": "Pesquisar",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            }
        }
    });
    
    $(".manager-feira").click(function(e){
        e.preventDefault();
        console.log($(this).attr("value"));
        $.ajax({
            url: "/feira/manager/" + $(this).attr("value"),
            type: "post",
            dataType: "json",
            data: {status : $(this).attr("status")},
            success: function(r){
                console.log(r);
                alert("Atualização realizada com sucesso.");
                window.location = location;
            },
            error: function(r){
                alert("Erro ao efetuar ação na feira de ID: " + $(this).attr("value"));
                console.log(r);
            }
        });
    });
    
</script>


@stop