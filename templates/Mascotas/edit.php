<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mascota $mascota
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(__('Eliminar Mascota'), ['action' => 'delete', $mascota->id], ['confirm' => __('¿Está seguro que desea eliminar esta mascota?'), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Mascotas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="mascotas form content">
            <?= $this->Form->create($mascota) ?>
            <fieldset>
                <legend><?= __('Editar Mascota') ?></legend>
                <?= $this->Form->control('nombre', ['label' => __('Nombre')]) ?>
                <?= $this->Form->control('especie', ['label' => __('Especie')]) ?>
                <?= $this->Form->control('fecha_adopcion', ['label' => __('Fecha de Adopción'), 'type' => 'date']) ?>
                <?= $this->Form->control('descripcion_es', ['label' => __('Descripción (Español)'), 'type' => 'textarea']) ?>
                <?= $this->Form->control('descripcion_en', ['label' => __('Description (English)'), 'type' => 'textarea']) ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
