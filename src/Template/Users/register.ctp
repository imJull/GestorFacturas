

<div class="index large-4 medium-4 large-offset-4 medium-offset-4 comlumns content">
  <div class="panel">
    <h3 class="text-center">Registrar Nuevo Usuario</h3>
    <h5 class="text-center" style="color: powderblue;">Gestor de Facturas</h5>
    <?= $this->Form->create($user); ?>
    <?php
        echo $this->Form->control('nombre');
        echo $this->Form->control('apellido');
        echo $this->Form->control('bio');
        echo $this->Form->control('email');
        echo $this->Form->control('password');
        echo $this->Form->control('creado', ['empty' => true]);
        echo $this->Form->control('modificado', ['empty' => true]);
    ?>
      <?= $this->Form->submit('Registrarse', array('class' => 'button')); ?>
    <?= $this->Form->end(); ?>

  </div>

</div>
