<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleReserva $detalleReserva
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detalle Reserva'), ['action' => 'edit', $detalleReserva->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detalle Reserva'), ['action' => 'delete', $detalleReserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleReserva->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detalle Reservas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detalle Reserva'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detalleReservas view content">
            <h3><?= h($detalleReserva->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Reserva') ?></th>
                    <td><?= $detalleReserva->hasValue('reserva') ? $this->Html->link($detalleReserva->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $detalleReserva->reserva->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recurso') ?></th>
                    <td><?= $detalleReserva->hasValue('recurso') ? $this->Html->link($detalleReserva->recurso->nombre, ['controller' => 'Recursos', 'action' => 'view', $detalleReserva->recurso->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($detalleReserva->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>