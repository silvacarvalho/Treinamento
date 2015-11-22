@extends('template.default')
@section('content')


<style>
    .label-espaco{
        padding-bottom: 0px;
        font-size: 12px;
    }
    .espaco-row{
        margin-top: 25px;
    }
</style>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Nova Feira
        </h3>
    </div>
</div>
<form class="form-group-sm" method="post" id="form_nova_feira">
    <div class="panel panel-warning">
        <div class="panel-heading">Preencha todos os dados da Feira de Saúde</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <label class="label label-warning control-label label-espaco" for="tipo">Tipo</label>
                    <input class="form-control" required id="tipo" name="tipo" type="text" placeholder="Tipo de Feira">
                </div>
                <div class="col-sm-4">
                    <label class="label label-warning control-label label-espaco" for="tema">Tema</label>
                    <input class="form-control" id="tema" required name="tema" type="text" placeholder="Tema da Feira">
                </div>
                <div class="col-sm-4">
                    <label class="label label-warning control-label label-espaco" for="local">Local</label>
                    <input class="form-control" required id="local" name="local" type="text" placeholder="Local da Feira">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="row espaco-row">
                        <div class="col-sm-12">
                            <label class="label label-warning control-label label-espaco" for="obs">Observação</label>
                            <textarea class="form-control" id="obs" name="observacao" placeholder="Observação" rows="5" cols="5">{{$dados->observacao or "" }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row espaco-row">
                        <div class="col-sm-12">
                            <label class="label label-warning label-espaco" for="data">Data</label>
                            <input type="text" required class="form-control" id="data"name="data" placeholder="Data da Feira">
                        </div>
                    </div>
                    <div class="row espaco-row">
                        <div class="col-sm-12">
                            <label class="label label-warning label-espaco" for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Selecione</option>
                                <option value="1">Habilitada</option>
                                <option value="0">Desabilitada</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" id="envia_dados" class="btn btn-warning btn-sm">Enviar informações</button>
                </div>
                <div class="col-sm-4" id="msg_footer">

                </div>
            </div>
        </div>
    </div>
</form>

<script>

    var now = new Date();
    var hoje = now.getDate() + "-" + (now.getMonth() + 1) + "-" + now.getFullYear();
    $.datetimepicker.setLocale('pt');
    $('#data').datetimepicker({format: 'd-m-Y H:i', minDate: hoje, theme: ' xdsoft_dark'});

    $("#form_nova_feira").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/feira/criar',
            dataType: 'json',
            data: $(this).serialize(),
            type: 'post',
            success: function (data) {
                if (data) {
                    if ($("#btn_success").length < 1) {
                        $(".panel-body").html("<button type='button' id='btn_success' class='btn btn-success'>Sucesso: <span class='badge'>Feira cadastrada com sucesso!</span></button>");
                        $("#envia_dados").hide(300);
                    }
                }
            },
            error: function (data) {
                if ($("#btn_error").length < 1) {
                    $("#msg_footer").append("<button type='button' id='btn_error' class='btn btn-danger'>Error: <span class='badge'>Falha ao cadastrar feira!</span></button>");
                }
            }
        });
    });
</script>
@stop