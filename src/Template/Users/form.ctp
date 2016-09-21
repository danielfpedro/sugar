
<div class="sugar-breadcrumb">
    <h1>Adicionar User</h1>
    <?php
        $this->Html->addCrumb('Users', ['action' => 'index']); 
        $this->Html->addCrumb('Adicionar User');
        echo $this->Html->getCrumbList();
    ?>
</div>

<?= $this->Form->create($user, [
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
            echo $this->Form->input('name');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
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