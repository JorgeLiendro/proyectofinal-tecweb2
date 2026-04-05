<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                        <?= h($recurso->nombre) ?>
                    </h4>

                    <?= $this->Html->link(
                        '← Volver',
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <!-- DATOS -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="bg-light">Nombre</th>
                            <td><?= h($recurso->nombre) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">ID</th>
                            <td><?= $this->Number->format($recurso->id) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Fecha Creación</th>
                            <td><?= h($recurso->fecha_creacion) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- DESCRIPCIÓN -->
                <div class="mb-4">
                    <strong>Descripción</strong>
                    <div class="border rounded p-2 bg-light">
                        <?= $this->Text->autoParagraph(h($recurso->descripcion)); ?>
                    </div>
                </div>

                <!-- RESERVAS RELACIONADAS -->
                <div class="mt-4">
                    <h5 class="text-secondary">Reservas relacionadas</h5>

                    <?php if (!empty($recurso->reservas)) : ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Fecha Reserva</th>
                                        <th>Estado</th>
                                        <th>Creado</th>
                                        <th>Observaciones</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recurso->reservas as $reserva) : ?>
                                    <tr>
                                        <td><?= h($reserva->id) ?></td>
                                        <td><?= h($reserva->user_id) ?></td>
                                        <td><?= h($reserva->fechareserva) ?></td>
                                        <td><?= h($reserva->estado) ?></td>
                                        <td><?= h($reserva->fechacreacion) ?></td>
                                        <td><?= h($reserva->observaciones) ?></td>
                                        <td class="text-center">

                                            <?= $this->Html->link(
                                                'Ver',
                                                ['controller' => 'Reservas', 'action' => 'view', $reserva->id],
                                                ['class' => 'btn btn-sm btn-primary']
                                            ) ?>

                                            <?= $this->Html->link(
                                                'Editar',
                                                ['controller' => 'Reservas', 'action' => 'edit', $reserva->id],
                                                ['class' => 'btn btn-sm btn-warning']
                                            ) ?>

                                            <?= $this->Form->postLink(
                                                'Eliminar',
                                                ['controller' => 'Reservas', 'action' => 'delete', $reserva->id],
                                                [
                                                    'class' => 'btn btn-sm btn-danger',
                                                    'confirm' => '¿Eliminar esta reserva?'
                                                ]
                                            ) ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-light">
                            No hay reservas relacionadas.
                        </div>
                    <?php endif; ?>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-end gap-2 mt-3">

                    <?= $this->Html->link(
                        'Editar',
                        ['action' => 'edit', $recurso->id],
                        ['class' => 'btn btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $recurso->id],
                        [
                            'class' => 'btn btn-danger',
                            'confirm' => '¿Seguro que deseas eliminar este recurso?'
                        ]
                    ) ?>

                </div>

            </div>
        </div>

    </div>
</div>