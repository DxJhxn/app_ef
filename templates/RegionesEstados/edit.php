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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $regionesEstado->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $regionesEstado->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Regiones Estados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="regionesEstados form content">
            <?= $this->Form->create($regionesEstado) ?>
            <fieldset>
                <legend><?= __('Edit Regiones Estado') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('codigo');
                    echo $this->Form->control('pais');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
