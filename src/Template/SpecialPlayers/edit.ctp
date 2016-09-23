
<div class="sugar-breadcrumb">
    <h1>Adicionar Special Player</h1>
    <?php
        $this->Html->addCrumb('Special Players', ['action' => 'index']); 
        $this->Html->addCrumb('Adicionar Special Player');
        echo $this->Html->getCrumbList();
    ?>
</div>

<?= $this->Form->create($specialPlayer, [
    'horizontal' => true,
    'novalidate' => true,
    'columns' => [
        'label' => 2,
        'input' => 4,
        'error' => 6
    ]
]) ?>

    <div class="panel panel-default sugar-panel-content sugar-panel-form">
        <div class="panel-body">
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('criado');
            echo $this->Form->input('modificado', ['empty' => true]);
            echo $this->Form->input('ativo');
            echo $this->Form->input('deletado');
            echo $this->Form->input('dt_deletado', ['empty' => true]);
        ?>
        </div>
    </div>

    <div class="panel panel-default sugar-panel-content">
        <div class="panel-body text-right">
            <button type="submit" class="btn btn-primary">
                <span class="fa fa-check"></span> Salvar
            </button>
        </div>
    </div>

<?= $this->Form->end() ?>