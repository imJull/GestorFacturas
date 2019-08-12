<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nota $nota
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Nota', 'typePlural' => 'Notas')); ?>

</nav>
<div class="notas form large-9 medium-8 columns content">
    <?= $this->Form->create($nota) ?>
    <fieldset>
        <legend><?= __('Edit Nota') ?></legend>
        <?php
            echo $this->Form->control('factura_id', ['options' => $facturas]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('texto');
            echo $this->Form->control('creado', ['empty' => true]);
            echo $this->Form->control('modificado', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
