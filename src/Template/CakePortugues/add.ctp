<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cake Portugues'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cakePortugues form large-9 medium-8 columns content">
    <?= $this->Form->create($cakePortugue) ?>
    <fieldset>
        <legend><?= __('Add Cake Portugue') ?></legend>
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
