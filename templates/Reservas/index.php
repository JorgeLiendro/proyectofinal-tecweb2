<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-danger"><?= __('Reservas') ?></h3>

    <?= $this->Html->link(
        __('Nueva Reserva'),
        ['action' => 'add'],
        ['class' => 'btn btn-danger']
    ) ?>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                <th><?= $this->Paginator->sort('user_id', __('Usuario')) ?></th>
                <th><?= $this->Paginator->sort('recurso_id', __('Recursos')) ?></th>
                <th><?= $this->Paginator->sort('fechareserva', __('Fecha Reserva')) ?></th>
                <th><?= $this->Paginator->sort('estado', __('Estado')) ?></th>
                <th><?= $this->Paginator->sort('fechacreacion', __('Creado')) ?></th>
                <th class="text-center"><?= __('Acciones') ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?= $this->Number->format($reserva->id) ?></td>

                <td>
                    <?= $reserva->hasValue('user') 
                        ? h($reserva->user->nombre)
                        : '' ?>
                </td>

                <td>
                    <?php
                    $nombres = [];

                    foreach ($reserva->detalle_reservas as $detalle) {
                        $nombres[] = $detalle->recurso->nombre;
                    }

                    echo implode(', ', $nombres);
                    ?>
                </td>

                <td><?= h($reserva->fechareserva) ?></td>
                <td><?= h($reserva->estado) ?></td>
                <td><?= h($reserva->fechacreacion) ?></td>

                <td class="text-center">

                    <?= $this->Html->link(
                        __('Ver'),
                        ['action' => 'view', $reserva->id],
                        ['class' => 'btn btn-sm btn-primary']
                    ) ?>

                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $reserva->id],
                        ['class' => 'btn btn-sm btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        __('Eliminar'),
                        ['action' => 'delete', $reserva->id],
                        [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('¿Desea eliminar esta reserva?')
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