<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Recurso> $recursos
 */
?>
<div class="recursos index content">
    <?= $this->Html->link(__('New Recurso'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Recursos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('fecha_creacion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recursos as $recurso): ?>
                <tr>
                    <td><?= $this->Number->format($recurso->id) ?></td>
                    <td><?= h($recurso->nombre) ?></td>
                    <td><?= h($recurso->fecha_creacion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $recurso->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recurso->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $recurso->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $recurso->id),
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