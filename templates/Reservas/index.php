<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reserva> $reservas
 */
?>
<div class="reservas index content">
    <?= $this->Html->link(__('New Reserva'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reservas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('recurso_id') ?></th>
                    <th><?= $this->Paginator->sort('fechareserva') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th><?= $this->Paginator->sort('fechacreacion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?= $this->Number->format($reserva->id) ?></td>
                    <td><?= $reserva->hasValue('user') ? $this->Html->link($reserva->user->nombre, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
                    <td><?= $reserva->hasValue('recurso') ? $this->Html->link($reserva->recurso->nombre, ['controller' => 'Recursos', 'action' => 'view', $reserva->recurso->id]) : '' ?></td>
                    <td><?= h($reserva->fechareserva) ?></td>
                    <td><?= h($reserva->estado) ?></td>
                    <td><?= h($reserva->fechacreacion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reserva->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserva->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $reserva->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $reserva->id),
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