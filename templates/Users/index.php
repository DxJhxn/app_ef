<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                    <th><?= $this->Paginator->sort('apellido', __('Apellido')) ?></th>
                    <th><?= $this->Paginator->sort('correo', __('Correo')) ?></th>
                    <th><?= $this->Paginator->sort('created', __('Creado')) ?></th>
                    <th><?= $this->Paginator->sort('modified', __('Modificado')) ?></th>
                    <th><?= $this->Paginator->sort('language', __('Idioma')) ?></th>
                    <th><?= $this->Paginator->sort('telefono', __('Telefono')) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellido) ?></td>
                    <td><?= h($user->correo) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td><?= h($user->language) ?></td>
                    <td><?= h($user->telefono) ?></td>
                    <td class="actions" style="display:flex;flex-direction:column;gap:4px;align-items:flex-start;">
                        <?= $this->Html->link('👁', ['action' => 'view', $user->id], ['title' => __('Ver'), 'style' => 'text-decoration:none;font-size:1rem;padding:4px 7px;background:#e8f4fd;border-radius:4px;margin:0 2px;border:1px solid #b3d7f0;']) ?>
                        <?= $this->Html->link('✏️', ['action' => 'edit', $user->id], ['title' => __('Editar'), 'style' => 'text-decoration:none;font-size:1rem;padding:4px 7px;background:#fff8e1;border-radius:4px;margin:0 2px;border:1px solid #ffe082;']) ?>
                        <?= $this->Form->postLink('🗑️', ['action' => 'delete', $user->id], ['method' => 'delete', 'confirm' => __('¿Está seguro que desea eliminar este usuario?'), 'title' => __('Eliminar'), 'style' => 'text-decoration:none;font-size:1rem;padding:4px 7px;background:#fdecea;border-radius:4px;margin:0 2px;border:1px solid #f5c6cb;cursor:pointer;']) ?>
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
