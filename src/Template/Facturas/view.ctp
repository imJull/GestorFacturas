<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Factura', 'typePlural' => 'Facturas')); ?>

</nav>
<div class="facturas view large-9 medium-8 columns content">
    <h3><?= h($factura->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $factura->has('user') ? $this->Html->link($factura->user->nombre, ['controller' => 'Users', 'action' => 'view', $factura->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $factura->has('cliente') ? $this->Html->link($factura->cliente->nombre, ['controller' => 'Clientes', 'action' => 'view', $factura->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lugare') ?></th>
            <td><?= $factura->has('lugare') ? $this->Html->link($factura->lugare->nombre, ['controller' => 'Lugares', 'action' => 'view', $factura->lugare->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($factura->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($factura->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lanzamiento') ?></th>
            <td><?= h($factura->lanzamiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($factura->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($factura->modificado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($factura->descripcion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Productos') ?></h4>
        <?= $this->Text->autoParagraph(h($factura->productos)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Etiquetas') ?></h4>
        <?php if (!empty($factura->etiquetas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Creado') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($factura->etiquetas as $etiquetas): ?>
            <tr>
                <td><?= h($etiquetas->id) ?></td>
                <td><?= h($etiquetas->titulo) ?></td>
                <td><?= h($etiquetas->creado) ?></td>
                <td><?= h($etiquetas->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Etiquetas', 'action' => 'view', $etiquetas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Etiquetas', 'action' => 'edit', $etiquetas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Etiquetas', 'action' => 'delete', $etiquetas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etiquetas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notas') ?></h4>
        <?php if (!empty($factura->notas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Factura Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Texto') ?></th>
                <th scope="col"><?= __('Creado') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($factura->notas as $notas): ?>
            <tr>
                <td><?= h($notas->id) ?></td>
                <td><?= h($notas->factura_id) ?></td>
                <td><?= h($notas->user_id) ?></td>
                <td><?= h($notas->titulo) ?></td>
                <td><?= h($notas->texto) ?></td>
                <td><?= h($notas->creado) ?></td>
                <td><?= h($notas->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notas', 'action' => 'view', $notas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notas', 'action' => 'edit', $notas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notas', 'action' => 'delete', $notas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
