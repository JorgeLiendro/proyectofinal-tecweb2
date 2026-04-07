<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-danger"><?= __('Roles') ?></h3>

    <?= $this->Html->link(
        __('Nuevo Rol'),
        ['action' => 'add'],
        ['class' => 'btn btn-danger']
    ) ?>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                <th class="text-center"><?= __('Acciones') ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $role->id ?></td>
                <td><?= h($role->nombre) ?></td>
                <td class="text-center">

                    <?= $this->Html->link(
                        __('Ver'),
                        ['action' => 'view', $role->id],
                        ['class' => 'btn btn-sm btn-primary']
                    ) ?>

                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $role->id],
                        ['class' => 'btn btn-sm btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        __('Eliminar'),
                        ['action' => 'delete', $role->id],
                        [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('¿Desea eliminar este rol?')
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