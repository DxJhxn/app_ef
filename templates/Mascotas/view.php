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
            <?= $this->Html->link(__('Editar Mascota'), ['action' => 'edit', $mascota->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Mascota'), ['action' => 'delete', $mascota->id], ['confirm' => __('¿Está seguro que desea eliminar esta mascota?'), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Mascotas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Mascota'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="mascotas view content">
            <h3><?= h($mascota->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($mascota->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Especie') ?></th>
                    <td><?= h($mascota->especie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de Adopción') ?></th>
                    <td><?= h($mascota->fecha_adopcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($mascota->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($mascota->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripción (Español)') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($mascota->descripcion_es)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Description (English)') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($mascota->descripcion_en)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
