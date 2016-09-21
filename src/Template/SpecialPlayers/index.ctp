
<!-- Breadcrumb -->
<div class="sugar-breadcrumb">
    <h1>Special Players</h1>
    <?php
        $this->Html->addCrumb('Special Players /');
        echo $this->Html->getCrumbList();
    ?>
    <!-- Botão Adicionar registro -->
    <div class="sugar-breadcrumb-tools">
        <?= $this->Html->link('Novo Special Player' , [
            'action' => 'add'
        ], [
            'escape' => false,
            'class' => 'btn btn-default'
        ]) ?>
    </div>
</div>

<!-- Painel de Busca -->
<div class="panel panel-default sugar-panel-content">
    <div class="panel-body">
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Palavra Chave</label>
                    <input
                        type="text"
                        name="q"
                        placeholder="Id"
                        class="form-control"
                        value="<?= h($this->request->query('q'))?>">
                </div>
                <div class="col-md-8 text-right">
                    <button class="btn btn-danger sugar-main-filter-search">
                        <span class="fa fa-search"></span> Pesquisar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Painel com a tabela -->
<div class="panel panel-default sugar-panel-content">
    <div class="">
        <table class="table table-hover table-striped">
            <!-- Header listando os campos -->
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('criado') ?></th>
                    <th><?= $this->Paginator->sort('modificado') ?></th>
                    <th><?= $this->Paginator->sort('ativo') ?></th>
                    <th><?= $this->Paginator->sort('deletado') ?></th>
                    <th><?= $this->Paginator->sort('dt_deletado') ?></th>
                        <th style="width: 120px;">
                    </th>
                </tr>
            </thead>
            <!-- Body com os dados -->
            <tbody>
                <?php foreach ($specialPlayers as $specialPlayer): ?>
                <tr>
                        <td><?= $this->Number->format($specialPlayer->id) ?></td>
                        <td><?= h($specialPlayer->nome) ?></td>
                        <td><?= h($specialPlayer->criado) ?></td>
                        <td><?= h($specialPlayer->modificado) ?></td>
                        <td><?= $this->Number->format($specialPlayer->ativo) ?></td>
                        <td><?= $this->Number->format($specialPlayer->deletado) ?></td>
                        <td><?= h($specialPlayer->dt_deletado) ?></td>
                        <!-- Botões de Ação -->
                    <td class="text-right">
                        <!-- Botão Editar -->
                        <?= $this->Html->link(
                            '<span class="fa fa-pencil"></span>',
                            [
                                'action' => 'edit',
                                $specialPlayer->id
                            ],
                            [
                                'escape' => false,
                                'class' => 'btn btn-default btn-sm'
                            ])
                        ?>
                        <!-- Botão Remover -->
                        <?= $this->Form->postLink(
                            '<span class="fa fa-remove"></span>',
                            [
                                'action' => 'delete',
                                $specialPlayer->id],
                            [
                                'escape' => false,
                                'class' => 'btn btn-default btn-sm',
                                'confirm' => __('Are you sure you want to delete # {0}?',
                                $specialPlayer->id)
                            ])
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Paginação -->
<div class="sugar-panel-content">
    <div class="sugar-panel-paginator">
        <span>
            <?php
                echo $this->Paginator->counter('Página <strong>{{page}}</strong>-<strong>{{pages}}</strong> de <strong>{{count}}</strong> registros')
            ?>
        </span>
        <ul class="pagination">
            <?php
                echo $this->Paginator->prev('<span class="fa fa-chevron-left"></span>', ['escape' => false]);
                echo $this->Paginator->next('<span class="fa fa-chevron-right"></span>', ['escape' => false]);
            ?>
        </ul>
    </div>
</div>