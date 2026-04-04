<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                         <?= h($user->nombre . ' ' . $user->apellido) ?>
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
                            <td><?= h($user->nombre) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Apellido</th>
                            <td><?= h($user->apellido) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Correo</th>
                            <td><?= h($user->correo) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Idioma</th>
                            <td><?= h($user->language) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Dirección</th>
                            <td><?= h($user->direccion) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">ID</th>
                            <td><?= $this->Number->format($user->id) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Creado</th>
                            <td><?= h($user->created) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Modificado</th>
                            <td><?= h($user->modified) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- BOTONES -->
                <div class="d-flex justify-content-end gap-2">

                    <?= $this->Html->link(
                        'Editar',
                        ['action' => 'edit', $user->id],
                        ['class' => 'btn btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $user->id],
                        [
                            'class' => 'btn btn-danger',
                            'confirm' => '¿Seguro que deseas eliminar este usuario?'
                        ]
                    ) ?>

                </div>

            </div>
        </div>

    </div>
</div>