<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                        <?= h($role->nombre) ?>
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
                            <td><?= h($role->nombre) ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">ID</th>
                            <td><?= $this->Number->format($role->id) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- BOTONES -->
                <div class="d-flex justify-content-end gap-2">

                    <?= $this->Html->link(
                        'Editar',
                        ['action' => 'edit', $role->id],
                        ['class' => 'btn btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $role->id],
                        [
                            'class' => 'btn btn-danger',
                            'confirm' => '¿Seguro que deseas eliminar este rol?'
                        ]
                    ) ?>

                </div>

            </div>
        </div>

    </div>
</div>