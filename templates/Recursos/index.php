<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-danger"><?= __('Recursos') ?></h3>

    <?= $this->Html->link(
        __('Nuevo Recurso'),
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
                <th><?= $this->Paginator->sort('fecha_creacion', __('Fecha Creación')) ?></th>
                <th class="text-center"><?= __('Acciones') ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($recursos as $recurso): ?>
            <tr>
                <td><?= $this->Number->format($recurso->id) ?></td>
                <td><?= h($recurso->nombre) ?></td>
                <td><?= h($recurso->fecha_creacion) ?></td>
                <td class="text-center">

                    <?= $this->Html->link(
                        __('Ver'),
                        ['action' => 'view', $recurso->id],
                        ['class' => 'btn btn-sm btn-primary']
                    ) ?>

                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $recurso->id],
                        ['class' => 'btn btn-sm btn-warning']
                    ) ?>

                    <?= $this->Form->postLink(
                        __('Eliminar'),
                        ['action' => 'delete', $recurso->id],
                        [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('¿Desea eliminar este recurso?')
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