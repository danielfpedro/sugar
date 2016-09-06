<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="#">Posts</a></li>
                    <li class="active">Adicionar Post</li>
                </ol>
            </div>
        </div>

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
</div>