<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cake Portugue'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cakePortugues index large-9 medium-8 columns content">
    <h3><?= __('Cake Portugues') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('criado') ?></th>
                <th><?= $this->Paginator->sort('modificado') ?></th>
                <th><?= $this->Paginator->sort('ativo') ?></th>
                <th><?= $this->Paginator->sort('deletado') ?></th>
                <th><?= $this->Paginator->sort('dt_deletado') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cakePortugues as $cakePortugue): ?>
            <tr>
                <td><?= $this->Number->format($cakePortugue->id) ?></td>
                <td><?= h($cakePortugue->nome) ?></td>
                <td><?= h($cakePortugue->criado) ?></td>
                <td><?= h($cakePortugue->modificado) ?></td>
                <td><?= $this->Number->format($cakePortugue->ativo) ?></td>
                <td><?= $this->Number->format($cakePortugue->deletado) ?></td>
                <td><?= h($cakePortugue->dt_deletado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cakePortugue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cakePortugue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cakePortugue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cakePortugue->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
