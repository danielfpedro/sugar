<div class="sugar-breadcrumb">
    <h1>Adicionar Post</h1>
    <?php
        $this->Html->addCrumb('Posts', ['controller' => 'Posts', 'action' => 'index']); 
        $this->Html->addCrumb('Adicionar Post');
        echo $this->Html->getCrumbList();
    ?>
</div>

<?= $this->Form->create($post, [
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
            <?= $this->Form->input('title', ['help' => 'Oi gente bonita rsrs']) ?>
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

<!-- <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <div class="content">
                        <?= $this->Form->create($post, [
                            'horizontal' => true,
                            'novalidate' => true,
                            'columns' => [
                                'label' => 2,
                                'input' => 6,
                                'error' => 4
                            ]
                        ]) ?>
    
                            <?= $this->Form->input('title', ['help' => 'Oi gente bonita rsrs']) ?>
                            <?= $this->Form->submit('Salvar', ['bootstrap-type' => 'primary']) ?>

                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> -->