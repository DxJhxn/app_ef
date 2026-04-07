<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RegionesEstado $regionesEstado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Regiones Estado'), ['action' => 'edit', $regionesEstado->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Regiones Estado'), ['action' => 'delete', $regionesEstado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regionesEstado->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Regiones Estados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Regiones Estado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="regionesEstados view content">
            <h3><?= h($regionesEstado->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($regionesEstado->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= h($regionesEstado->codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pais') ?></th>
                    <td><?= h($regionesEstado->pais) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($regionesEstado->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($regionesEstado->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($regionesEstado->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>