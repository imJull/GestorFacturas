<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Cliente', 'typePlural' => 'Clientes')); ?>

</nav>
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Editar Cliente') ?></legend>
        <?php
            echo $this->Form->control('compania');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('info');
            echo $this->Form->control('email');
            echo $this->Form->control('telefono');
            echo $this->Form->control('creado', ['empty' => true]);
            //Espacio de modificado
        ?>
    </fieldset>
    <?= $this->Form->button(__('GUARDAR')) ?>
    <?= $this->Form->end() ?>
</div>
