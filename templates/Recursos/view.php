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
            <?= $this->Html->link(__('Edit Recurso'), ['action' => 'edit', $recurso->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Recurso'), ['action' => 'delete', $recurso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recurso->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Recursos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Recurso'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="recursos view content">
            <h3><?= h($recurso->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($recurso->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($recurso->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Creacion') ?></th>
                    <td><?= h($recurso->fecha_creacion) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($recurso->descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Reservas') ?></h4>
                <?php if (!empty($recurso->reservas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Fechareserva') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('Fechacreacion') ?></th>
                            <th><?= __('Observaciones') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($recurso->reservas as $reserva) : ?>
                        <tr>
                            <td><?= h($reserva->id) ?></td>
                            <td><?= h($reserva->user_id) ?></td>
                            <td><?= h($reserva->fechareserva) ?></td>
                            <td><?= h($reserva->estado) ?></td>
                            <td><?= h($reserva->fechacreacion) ?></td>
                            <td><?= h($reserva->observaciones) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reservas', 'action' => 'view', $reserva->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reservas', 'action' => 'edit', $reserva->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Reservas', 'action' => 'delete', $reserva->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $reserva->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>