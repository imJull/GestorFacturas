<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->Element('actions', array('type' => 'Usuario', 'typePlural' => 'Usuarios')); ?>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($user->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($user->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($user->modificado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Bio') ?></h4>
        <?= $this->Text->autoParagraph(h($user->bio)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Facturas') ?></h4>
        <?php if (!empty($user->facturas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Lugar Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <!-- Descripcion, modificado y lanzamiento -->
                <th scope="col"><?= __('Productos') ?></th>
                <!-- Descripcion, modificado y lanzamiento -->
                <th scope="col"><?= __('Creado') ?></th>
                <!-- Descripcion, modificado y lanzamiento -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->facturas as $facturas): ?>
            <tr>
                <td><?= h($facturas->id) ?></td>
                <td><?= h($facturas->user_id) ?></td>
                <td><?= h($facturas->cliente_id) ?></td>
                <td><?= h($facturas->lugar_id) ?></td>
                <td><?= h($facturas->titulo) ?></td>
                <td><?= h($facturas->productos) ?></td>
                <td><?= h($facturas->creado) ?></td>

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
    <div class="related">
        <h4><?= __('Related Notas') ?></h4>
        <?php if (!empty($user->notas)): ?>
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
            <?php foreach ($user->notas as $notas): ?>
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
