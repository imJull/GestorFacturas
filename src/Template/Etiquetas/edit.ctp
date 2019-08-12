<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etiqueta $etiqueta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Etiqueta', 'typePlural' => 'Etiquetas')); ?>

</nav>
<div class="etiquetas form large-9 medium-8 columns content">
    <?= $this->Form->create($etiqueta) ?>
    <fieldset>
        <legend><?= __('Editar Etiqueta') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('creado', ['empty' => true]);
            echo $this->Form->control('modificado', ['empty' => true]);
            echo $this->Form->control('facturas._ids', ['options' => $facturas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('GUARDAR')) ?>
    <?= $this->Form->end() ?>
</div>
