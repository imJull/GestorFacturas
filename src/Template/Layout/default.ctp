<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">Gestor de Facturas</a></h1>
      </li>
 <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

<section class="top-bar-section">
<!-- Right Nav Section -->
  <ul class="right">

    <!-- inicio de condicional para mostrar barra si se esta iniciado -->
    <?php if ($iniciado) : ?>
    <!-- No listo aun-->
    <li><?= $this->Html->link(__('Cerrar Sesion'), ['controller' => 'users', 'action' => 'logout']); ?></li>

  </ul>

<!-- Left Nav Section -->
<!-- Barra de facturas, categorias, etc -->
<!-- html helper para poner las diferentes secciones en el menú -->
  <ul class="left">
    <li><?= $this->Html->link(__('Facturas'), ['controller' => 'facturas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Lugares'), ['controller' => 'lugares', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Clientes'), ['controller' => 'clientes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Notas'), ['controller' => 'notas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Etiquetas'), ['controller' => 'etiquetas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('Usuarios'), ['controller' => 'users', 'action' => 'index']); ?></li>

  <?php else :  ?>
    <li><?= $this->Html->link(__('Iniciar Sesion'), ['controller' => 'users', 'action' => 'login']); ?></li>
    <li><?= $this->Html->link(__('Registrarse'), ['controller' => 'users', 'action' => 'register']); ?></li>
  <?php endif; ?>


  </ul>
  </section>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
