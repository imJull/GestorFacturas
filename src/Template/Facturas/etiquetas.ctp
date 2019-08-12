<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura[]|\Cake\Collection\CollectionInterface $facturas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Factura', 'typePlural' => 'Facturas')); ?>
<!-- Buscar etiquetas -->
  <?= $this->Element('busquedaetiqueta'); ?>
</nav>
<div class="facturas index large-9 medium-8 columns content">
    <h3>Facturas por Etiquetas: <?= $this->Text->toList($etiquetas); ?> </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <!-- Removido cliente.id user.id y lugare.id -->
                <!-- Removido cliente.id user.id y lugare.id -->
                <!-- Removido cliente.id user.id y lugare.id -->
                <!-- Eliminado lanzamiento -->
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturas as $factura): ?>
            <tr>
                <td><?= $this->Number->format($factura->id) ?></td>
                <td><?= h($factura->titulo) ?></td>

                <!-- Eliminado lanzamiento -->
                <td><?= h($factura->creado) ?></td>
                <td><?= h($factura->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $factura->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $factura->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $factura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $factura->id)]) ?>
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
