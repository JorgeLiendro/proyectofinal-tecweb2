<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-danger">Usuarios</h3>

    <?= $this->Html->link(
        ' Nuevo Usuario',
        ['action' => 'add'],
        ['class' => 'btn btn-danger']
    ) ?>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th><?= $this->Paginator->sort('nombre', 'Nombre') ?></th>
                <th><?= $this->Paginator->sort('apellido', 'Apellido') ?></th>
                <th><?= $this->Paginator->sort('correo', 'Correo') ?></th>
                <th><?= $this->Paginator->sort('created', 'Creado') ?></th>
                <th><?= $this->Paginator->sort('language', 'Idioma') ?></th>
                <th><?= $this->Paginator->sort('direccion', 'Dirección') ?></th>
                <th class="text-center ">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->apellido) ?></td>
                <td><?= h($user->correo) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->language) ?></td>
                <td><?= h($user->direccion) ?></td>
                <td class="text-center">

                    <?= $this->Html->link('Ver', ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-primary']) ?>

                    <?= $this->Html->link('Editar', ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-warning']) ?>

                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $user->id],
                        [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => 'Desea eliminar este usuario?'
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