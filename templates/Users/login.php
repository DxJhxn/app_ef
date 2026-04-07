<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form">
    <h2><?= __('Iniciar Sesión') ?></h2>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ingresa tus credenciales') ?></legend>
        <?= $this->Form->control('correo', ['required' => true, 'label' => __('Correo')]) ?>
        <?= $this->Form->control('password', ['required' => true, 'label' => __('Contraseña')]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Ingresar')) ?>
    <?= $this->Form->end() ?>
</div>
