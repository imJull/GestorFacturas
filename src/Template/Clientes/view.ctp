<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Cliente', 'typePlural' => 'Clientes')); ?>

</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Compania') ?></th>
            <td><?= h($cliente->compania) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($cliente->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($cliente->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($cliente->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($cliente->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($cliente->modificado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Info') ?></h4>
        <?= $this->Text->autoParagraph(h($cliente->info)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Facturas') ?></h4>
        <?php if (!empty($cliente->facturas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Lugar Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Productos') ?></th>
                <th scope="col"><?= __('Lanzamiento') ?></th>
                <th scope="col"><?= __('Creado') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->facturas as $facturas): ?>
            <tr>
                <td><?= h($facturas->titulo) ?></td>
                <td><?= h($facturas->id) ?></td>
                <td><?= h($facturas->user_id) ?></td>
                <td><?= h($facturas->cliente_id) ?></td>
                <td><?= h($facturas->lugar_id) ?></td>
                <td><?= h($facturas->descripcion) ?></td>
                <td><?= h($facturas->productos) ?></td>
                <td><?= h($facturas->lanzamiento) ?></td>
                <td><?= h($facturas->creado) ?></td>
                <td><?= h($facturas->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Facturas', 'action' => 'view', $facturas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Facturas', 'action' => 'edit', $facturas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Facturas', 'action' => 'delete', $facturas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facturas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
