<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Agregar Usuario') ?></legend>
                <?= $this->Form->control('nombre', ['label' => __('Nombre')]) ?>
                <?= $this->Form->control('apellido', ['label' => __('Apellido')]) ?>
                <?= $this->Form->control('correo', ['label' => __('Correo')]) ?>
                <?= $this->Form->control('password', ['label' => __('Contraseña')]) ?>
                <?= $this->Form->control('telefono', ['label' => __('Teléfono')]) ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
