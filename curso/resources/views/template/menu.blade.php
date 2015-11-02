<nav class="navbar navbar-default">
    <div class="container-fluid" id="container_fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Administração de Feiras</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">PHP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administração <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/feira/nova">Cadastrar Feira</a></li>
                        <li><a href="/usuario/novo">Cadastrar Aluno</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/feira/listar">Consultar Feira</a></li>
                        <li><a href="/usuario/listar">Consultar Aluno</a></li>
                    </ul>
                </li>
            </ul>
            <?php $id = 3;?>
            <form class="navbar-form navbar-right {{isset($id) ? 'hide' : '' }}" role="search">
                <div class="form-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Usuário">
                    <input type="text" name="senha" class="form-control" placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-default">Logar</button>
            </form>
            <ul class="nav navbar-nav navbar-right {{isset($id) ? '' : 'hide'}}">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/usuario/{{$id or '' }}">Editar</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Saír</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>