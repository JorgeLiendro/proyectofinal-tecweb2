<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DetalleReserva> $detalleReservas
 */
?>
<div class="detalleReservas index content">
    <?= $this->Html->link(__('New Detalle Reserva'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detalle Reservas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('reserva_id') ?></th>
                    <th><?= $this->Paginator->sort('recurso_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalleReservas as $detalleReserva): ?>
                <tr>
                    <td><?= $this->Number->format($detalleReserva->id) ?></td>
                    <td><?= $detalleReserva->hasValue('reserva') ? $this->Html->link($detalleReserva->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $detalleReserva->reserva->id]) : '' ?></td>
                    <td><?= $detalleReserva->hasValue('recurso') ? $this->Html->link($detalleReserva->recurso->nombre, ['controller' => 'Recursos', 'action' => 'view', $detalleReserva->recurso->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detalleReserva->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detalleReserva->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $detalleReserva->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $detalleReserva->id),
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>