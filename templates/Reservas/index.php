<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-danger">Reservas</h3>

    <?= $this->Html->link(
        ' Nueva Reserva',
        ['action' => 'add'],
        ['class' => 'btn btn-danger']
    ) ?>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th><?= $this->Paginator->sort('user_id', 'Usuario') ?></th>
                <th><?= $this->Paginator->sort('recurso_id', 'Recurso') ?></th>
                <th><?= $this->Paginator->sort('fechareserva', 'Fecha Reserva') ?></th>
                <th><?= $this->Paginator->sort('estado', 'Estado') ?></th>
                <th><?= $this->Paginator->sort('fechacreacion', 'Creado') ?></th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?= $this->Number->format($reserva->id) ?></td>

                <td>
                    <?= $reserva->hasValue('user') 
                        ? $this->Html->link(
                            $reserva->user->nombre,
                            ['controller' => 'Users', 'action' => 'view', $reserva->user->id]
                        ) 
                        : '' ?>
                </td>

                <td>
                    <?= $reserva->hasValue('recurso') 
                        ? $this->Html->link(
                            $reserva->recurso->nombre,
                            ['controller' => 'Recursos', 'action' => 'view', $reserva->recurso->id]
                        ) 
                        : '' ?>
                </td>

                <td><?= h($reserva->fechareserva) ?></td>
                <td><?= h($reserva->estado) ?></td>
                <td><?= h($reserva->fechacreacion) ?></td>

                <td class="text-center">

                    <?= $this->Html->link(
                        'Ver',
                        ['action' => 'view', $reserva->id],
                        ['class' => 'btn btn-sm btn-primary']
                    ) ?>

                    <?= $this->Html->link(
                        'Editar',
                        ['action' => 'edit', $reserva->id],
                        ['class' => 'btn btn-sm btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $reserva->id],
                        [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => '¿Desea eliminar esta reserva?'
                        ]
                    ) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- PAGINACIÓN -->
<div class="d-flex justify-content-center">
    <ul class="pagination">
        <?= $this->Paginator->first('<<', ['class' => 'page-link']) ?>
        <?= $this->Paginator->prev('<', ['class' => 'page-link']) ?>
        <?= $this->Paginator->numbers(['class' => 'page-link']) ?>
        <?= $this->Paginator->next('>', ['class' => 'page-link']) ?>
        <?= $this->Paginator->last('>>', ['class' => 'page-link']) ?>
    </ul>
</div>