
<div class="sugar-breadcrumb">
    <h1>Configurações de Conta</h1>
    <?php
        $this->Html->addCrumb('Configurações de Conta');
        echo $this->Html->getCrumbList();
    ?>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?= $this->element('settingsSidebar') ?>
        </div>
        <div class="col-md-9">
            <?= $this->Form->create($user, [
                'horizontal' => true,
                'novalidate' => true,
                'type' => 'file',
                'columns' => [
                    'label' => 2,
                    'input' => 4,
                    'error' => 6
                ]
            ]) ?>

                <div class="panel panel-default sugar-panel-content sugar-panel-form">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2 sugar-account-settings-profile-picture-container">
                                <?= $this->Html->image($user->profile_picture_path) ?>
                            </div>
                        </div>
                        <?php
                            echo $this->Form->input('profile_picture', ['type' => 'file']);
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
        </div>
    </div>
</div>