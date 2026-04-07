<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                        <?= __('Reserva #{0}', $this->Number->format($reserva->id)) ?>
                    </h4>

                    <?= $this->Html->link(
                        __('← Volver'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <!-- DATOS -->
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th class="bg-light"><?= __('Usuario') ?></th>
                            <td>
                                <?= $reserva->hasValue('user') 
                                    ? $this->Html->link(
                                        $reserva->user->nombre,
                                        ['controller' => 'Users', 'action' => 'view', $reserva->user->id]
                                    ) 
                                    : '' ?>
                            </td>
                        </tr>

                        <tr>
                            <th class="bg-light"><?= __('Recurso') ?></th>
                            <td>
                                <?= $reserva->hasValue('recurso') 
                                    ? $this->Html->link(
                                        $reserva->recurso->nombre,
                                        ['controller' => 'Recursos', 'action' => 'view', $reserva->recurso->id]
                                    ) 
                                    : '' ?>
                            </td>
                        </tr>

                        <tr>
                            <th class="bg-light"><?= __('Estado') ?></th>
                            <td><?= h($reserva->estado) ?></td>
                        </tr>

                        <tr>
                            <th class="bg-light"><?= __('Fecha Reserva') ?></th>
                            <td><?= h($reserva->fechareserva) ?></td>
                        </tr>

                        <tr>
                            <th class="bg-light"><?= __('Creado') ?></th>
                            <td><?= h($reserva->fechacreacion) ?></td>
                        </tr>

                    </tbody>
                </table>

                <!-- OBSERVACIONES -->
                <div class="mb-3">
                    <strong><?= __('Observaciones') ?></strong>
                    <div class="border rounded p-2 bg-light">
                        <?= $this->Text->autoParagraph(h($reserva->observaciones)); ?>
                    </div>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-end gap-2">

                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $reserva->id],
                        ['class' => 'btn btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        __('Eliminar'),
                        ['action' => 'delete', $reserva->id],
                        [
                            'class' => 'btn btn-danger',
                            'confirm' => __('¿Seguro que deseas eliminar esta reserva?')
                        ]
                    ) ?>

                </div>

            </div>
        </div>

    </div>
</div>