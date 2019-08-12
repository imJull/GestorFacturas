<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota $nota
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Nota', 'typePlural' => 'Notas')); ?>

</nav>
<div class="notas view large-9 medium-8 columns content">
    <h3><?= h($nota->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Factura') ?></th>
            <td><?= $nota->has('factura') ? $this->Html->link($nota->factura->id, ['controller' => 'Facturas', 'action' => 'view', $nota->factura->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $nota->has('user') ? $this->Html->link($nota->user->id, ['controller' => 'Users', 'action' => 'view', $nota->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($nota->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nota->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($nota->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($nota->modificado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Texto') ?></h4>
        <?= $this->Text->autoParagraph(h($nota->texto)); ?>
    </div>
</div>
