<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etiqueta[]|\Cake\Collection\CollectionInterface $etiquetas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Etiqueta', 'typePlural' => 'Etiquetas')); ?>

</nav>
<div class="etiquetas index large-9 medium-8 columns content">
    <h3><?= __('Etiquetas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etiquetas as $etiqueta): ?>
            <tr>
                <td><?= $this->Number->format($etiqueta->id) ?></td>
                <td><?= h($etiqueta->titulo) ?></td>
                <td><?= h($etiqueta->creado) ?></td>
                <td><?= h($etiqueta->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $etiqueta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $etiqueta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $etiqueta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etiqueta->id)]) ?>
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
