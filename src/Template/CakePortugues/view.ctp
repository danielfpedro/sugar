<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cake Portugue'), ['action' => 'edit', $cakePortugue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cake Portugue'), ['action' => 'delete', $cakePortugue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakePortugue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cake Portugues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cake Portugue'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cakePortugues view large-9 medium-8 columns content">
    <h3><?= h($cakePortugue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($cakePortugue->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cakePortugue->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($cakePortugue->ativo) ?></td>
        </tr>
        <tr>
            <th><?= __('Deletado') ?></th>
            <td><?= $this->Number->format($cakePortugue->deletado) ?></td>
        </tr>
        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= h($cakePortugue->criado) ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= h($cakePortugue->modificado) ?></td>
        </tr>
        <tr>
            <th><?= __('Dt Deletado') ?></th>
            <td><?= h($cakePortugue->dt_deletado) ?></td>
        </tr>
    </table>
</div>
