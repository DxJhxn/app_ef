<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Mascota> $mascotas
 */
?>
<div class="mascotas index content">
    <?= $this->Html->link(__('Nueva Mascota'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mis Mascotas') ?></h3>

    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <?= $this->Form->control('buscar', [
            'label' => __('Buscar por nombre o especie'),
            'value' => $this->request->getQuery('buscar'),
            'placeholder' => __('Ej: Anubis, Perro...')
        ]) ?>
        <?= $this->Form->button(__('Buscar')) ?>
        <?= $this->Html->link(__('Limpiar'), ['action' => 'index'], ['class' => 'button']) ?>
        <?= $this->Form->end() ?>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                    <th><?= $this->Paginator->sort('especie', __('Especie')) ?></th>
                    <th><?= $this->Paginator->sort('fecha_adopcion', __('Fecha Adopción')) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mascotas as $mascota): ?>
                <tr>
                    <td><?= h($mascota->nombre) ?></td>
                    <td><?= h($mascota->especie) ?></td>
                    <td><?= h($mascota->fecha_adopcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $mascota->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $mascota->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $mascota->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Está seguro que desea eliminar esta mascota?'),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} registros')) ?></p>
    </div>
</div>
