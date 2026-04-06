<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleReserva $detalleReserva
 * @var string[]|\Cake\Collection\CollectionInterface $reservas
 * @var string[]|\Cake\Collection\CollectionInterface $recursos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detalleReserva->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detalleReserva->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detalle Reservas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detalleReservas form content">
            <?= $this->Form->create($detalleReserva) ?>
            <fieldset>
                <legend><?= __('Edit Detalle Reserva') ?></legend>
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
