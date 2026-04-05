<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reserva'), ['action' => 'edit', $reserva->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reserva'), ['action' => 'delete', $reserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reservas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reserva'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reservas view content">
            <h3><?= h($reserva->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reserva->hasValue('user') ? $this->Html->link($reserva->user->nombre, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Recurso') ?></th>
                    <td><?= $reserva->hasValue('recurso') ? $this->Html->link($reserva->recurso->nombre, ['controller' => 'Recursos', 'action' => 'view', $reserva->recurso->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($reserva->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reserva->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fechareserva') ?></th>
                    <td><?= h($reserva->fechareserva) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fechacreacion') ?></th>
                    <td><?= h($reserva->fechacreacion) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Observaciones') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($reserva->observaciones)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>