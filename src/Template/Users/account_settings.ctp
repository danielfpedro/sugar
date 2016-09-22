
<div class="sugar-breadcrumb">
    <h1>Configurações de Conta</h1>
    <?php
        $this->Html->addCrumb('Configurações de Conta');
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
            ?>
        </div>
    </div>

    <div class="panel panel-default sugar-panel-content sugar-panel-form">
        <div class="panel-body">
            <?php
                echo $this->Form->input('new_password');
                echo $this->Form->input('confirm_new_password');
            ?>
        </div>
    </div>

    <div class="panel panel-default sugar-panel-content sugar-panel-form">
        <div class="panel-body">
            <?php
                echo $this->Form->input('current_password', [
                    'help' => 'Para a sua segurança você deve confirmar a sua senha atual para alterar qualquer dado da sua conta.'
                ]);
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