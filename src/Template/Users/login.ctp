

<div class="index large-4 medium-4 large-offset-4 medium-offset-4 comlumns content">
  <div class="panel">
    <h3 class="text-center">Inicio de Sesion</h3>
    <h5 class="text-center" style="color: powderblue;">Gestor de Facturas</h5>
    <?= $this->Form->create(); ?>
      <?= $this->Form->control('email', array('placeholder' => 'CorreoElectrónico')); ?>
      <?= $this->Form->control('password', array('type' => 'password', 'placeholder' => 'Contraseña')); ?>
      <?= $this->Form->submit('Iniciar Sesion', array('class' => 'button')); ?>
    <?= $this->Form->end(); ?>

  </div>

</div>
