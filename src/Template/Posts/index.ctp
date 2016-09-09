<div class="sugar-breadcrumb">
    <h1>Campanhas Publicitárias</h1>
        <?php
            $this->Html->addCrumb('Home', '/');
            $this->Html->addCrumb('Pages', ['controller' => 'pages']); 
            $this->Html->addCrumb('About', ['controller' => 'pages', 'action' => 'about']);
            $this->Html->addCrumb('Campanhas Publicitárias');
            echo $this->Html->getCrumbList();
        ?>
    <div class="sugar-breadcrumb-tools">
        <button class="btn btn-default">
            <span class="fa fa-envelope"></span> Novo Post
        </button>
    </div>
</div>

<div class="panel panel-default sugar-panel-content">
    <div class="panel-body">
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Palavra Chave</label>
                    <input type="text" class="form-control" placeholder="Nome ou email">
                </div>
                <div class="col-md-2">
                    <label for="">Status</label>
                    <select class="form-control">
                        <option>Todos</option>
                    </select>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-danger sugar-main-filter-search">
                        <span class="fa fa-search"></span> Pesquisar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="panel panel-default sugar-panel-content">
    <table class="table table-hover table-striped">
        <tbody>
            <thead>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th class="text-center" style="width: 120px;">
                        <span class="fa fa-cog"></span>
                    </th>
                </tr>
            </thead>
            <tr>
                <td>
                    Daniel de Faria Pedro
                </td>
                <td class="text-center">
                    <button class="btn btn-default btn-sm">
                        <span class="fa fa-remove"></span>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    Daniel de Faria Pedro
                </td>
                <td class="text-center">
                    <button class="btn btn-default btn-sm">
                        <span class="fa fa-remove"></span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>