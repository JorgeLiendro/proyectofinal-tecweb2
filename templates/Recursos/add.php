<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recurso $recurso
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Recursos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="recursos form content">
            <?= $this->Form->create($recurso) ?>
            <fieldset>
                <legend><?= __('Add Recurso') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('fecha_creacion', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
