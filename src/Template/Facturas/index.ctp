<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura[]|\Cake\Collection\CollectionInterface $facturas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Factura', 'typePlural' => 'Facturas')); ?>
   <!-- busquedaetiqueta.ctp -->
  <?= $this->Element('busquedaetiqueta'); ?>
</nav>
<div class="facturas index large-9 medium-8 columns content">
    <h3><?= __('Facturas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lugar_id') ?></th>
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
                <td><?= $factura->has('user') ? $this->Html->link($factura->user->nombre, ['controller' => 'Users', 'action' => 'view', $factura->user->id]) : '' ?></td>
                <td><?= $factura->has('cliente') ? $this->Html->link($factura->cliente->nombre, ['controller' => 'Clientes', 'action' => 'view', $factura->cliente->id]) : '' ?></td>
                <td><?= $factura->has('lugare') ? $this->Html->link($factura->lugare->nombre, ['controller' => 'Lugares', 'action' => 'view', $factura->lugare->id]) : '' ?></td>
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
