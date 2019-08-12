<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lugare[]|\Cake\Collection\CollectionInterface $lugares
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Lugar', 'typePlural' => 'Lugares')); ?>

</nav>
<div class="lugares index large-9 medium-8 columns content">
    <h3><?= __('Lugares') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lugares as $lugare): ?>
            <tr>
                <td><?= $this->Number->format($lugare->id) ?></td>
                <td><?= h($lugare->nombre) ?></td>
                <td><?= h($lugare->creado) ?></td>
                <td><?= h($lugare->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lugare->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lugare->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lugare->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lugare->id)]) ?>
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
