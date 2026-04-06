<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleReserva $detalleReserva
 * @var \Cake\Collection\CollectionInterface|string[] $reservas
 * @var \Cake\Collection\CollectionInterface|string[] $recursos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Detalle Reservas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detalleReservas form content">
            <?= $this->Form->create($detalleReserva) ?>
            <fieldset>
                <legend><?= __('Add Detalle Reserva') ?></legend>
                <?php
                    echo $this->Form->control('reserva_id', ['options' => $reservas]);
                    echo $this->Form->control('recurso_id', ['options' => $recursos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
