<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lugare $lugare
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Lugar', 'typePlural' => 'Lugares')); ?>

</nav>
<div class="lugares form large-9 medium-8 columns content">
    <?= $this->Form->create($lugare) ?>
    <fieldset>
        <legend><?= __('Añadir Lugar') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('creado', ['empty' => true]);
            echo $this->Form->control('modificado', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('AÑADIR')) ?>
    <?= $this->Form->end() ?>
</div>
