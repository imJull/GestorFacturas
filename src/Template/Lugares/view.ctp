<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lugare $lugare
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?= $this->Element('actions', array('type' => 'Lugar', 'typePlural' => 'Lugares')); ?>

</nav>
<div class="lugares view large-9 medium-8 columns content">
    <h3><?= h($lugare->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($lugare->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lugare->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($lugare->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($lugare->modificado) ?></td>
        </tr>
    </table>
</div>
