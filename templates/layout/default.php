<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $cakeDescription ?>: <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link('ES', ['controller' => 'Users', 'action' => 'setLanguage', 'es']) ?>
            <?= $this->Html->link('EN', ['controller' => 'Users', 'action' => 'setLanguage', 'en']) ?>
            <?php if ($this->request->getAttribute('identity')): ?>
                <span><?= __('Hola') ?>, <?= h($this->request->getAttribute('identity')->nombre) ?></span>
                <?= $this->Html->link(__('Mis Mascotas'), ['controller' => 'Mascotas', 'action' => 'index']) ?>
                <?= $this->Html->link(__('Mi Perfil'), ['controller' => 'Users', 'action' => 'edit', $this->request->getAttribute('identity')->id]) ?>
                <?= $this->Form->postLink(__('Cerrar Sesión'), ['controller' => 'Users', 'action' => 'logout'], ['confirm' => __('¿Cerrar sesión?')]) ?>
            <?php endif; ?>
            
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
