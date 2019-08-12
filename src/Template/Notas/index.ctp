<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota[]|\Cake\Collection\CollectionInterface $notas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Nota', 'typePlural' => 'Notas')); ?>

</nav>
<div class="notas index large-9 medium-8 columns content">
    <h3><?= __('Notas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('factura_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notas as $nota): ?>
            <tr>
                <td><?= $this->Number->format($nota->id) ?></td>
                <td><?= $nota->has('factura') ? $this->Html->link($nota->factura->id, ['controller' => 'Facturas', 'action' => 'view', $nota->factura->id]) : '' ?></td>
                <td><?= $nota->has('user') ? $this->Html->link($nota->user->id, ['controller' => 'Users', 'action' => 'view', $nota->user->id]) : '' ?></td>
                <td><?= h($nota->titulo) ?></td>
                <td><?= h($nota->creado) ?></td>
                <td><?= h($nota->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nota->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nota->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nota->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nota->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
