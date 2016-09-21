<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $specialPlayer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $specialPlayer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Special Players'), ['action' => 'index']) ?></li>
    </ul>
</nav>

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


<div class="specialPlayers form large-9 medium-8 columns content">
    <?= $this->Form->create($specialPlayer) ?>
    <fieldset>
        <legend><?= __('Edit Special Player') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('criado');
            echo $this->Form->input('modificado', ['empty' => true]);
            echo $this->Form->input('ativo');
            echo $this->Form->input('deletado');
            echo $this->Form->input('dt_deletado', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
