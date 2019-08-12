<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Factura', 'typePlural' => 'Facturas')); ?>

</nav>
<div class="facturas form large-9 medium-8 columns content">
    <?= $this->Form->create($factura) ?>
    <fieldset>
        <legend><?= __('Add Factura') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            echo $this->Form->control('lugar_id', ['options' => $lugares]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('productos');
            echo $this->Form->control('lanzamiento', ['empty' => true]);
            echo $this->Form->control('creado', ['empty' => true]);
            echo $this->Form->control('modificado', ['empty' => true]);
            echo $this->Form->control('etiquetas._ids', ['options' => $etiquetas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
