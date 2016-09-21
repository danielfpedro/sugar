<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Special Player'), ['action' => 'edit', $specialPlayer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Special Player'), ['action' => 'delete', $specialPlayer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialPlayer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Special Players'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Special Player'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="specialPlayers view large-9 medium-8 columns content">
    <h3><?= h($specialPlayer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($specialPlayer->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($specialPlayer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $this->Number->format($specialPlayer->ativo) ?></td>
        </tr>
        <tr>
            <th><?= __('Deletado') ?></th>
            <td><?= $this->Number->format($specialPlayer->deletado) ?></td>
        </tr>
        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= h($specialPlayer->criado) ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= h($specialPlayer->modificado) ?></td>
        </tr>
        <tr>
            <th><?= __('Dt Deletado') ?></th>
            <td><?= h($specialPlayer->dt_deletado) ?></td>
        </tr>
    </table>
</div>
