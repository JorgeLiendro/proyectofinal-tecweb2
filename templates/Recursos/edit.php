<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                        <?= __('Editar Recurso') ?>
                    </h4>

                    <?= $this->Html->link(
                        __('← Volver'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <?= $this->Form->create($recurso) ?>

                <div class="mb-3">
                    <?= $this->Form->control('nombre', [
                        'class' => 'form-control',
                        'label' => __('Nombre')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('descripcion', [
                        'class' => 'form-control',
                        'label' => __('Descripción')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('fecha_creacion', [
                        'class' => 'form-control',
                        'label' => __('Fecha Creación'),
                        'empty' => true
                    ]) ?>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-between mt-3">

                    <?= $this->Form->postLink(
                        __('Eliminar'),
                        ['action' => 'delete', $recurso->id],
                        [
                            'class' => 'btn btn-outline-danger',
                            'confirm' => __('¿Seguro que deseas eliminar este recurso?')
                        ]
                    ) ?>

                    <?= $this->Form->button(__('Actualizar'), [
                        'class' => 'btn btn-danger px-4'
                    ]) ?>

                </div>

                <?= $this->Form->end() ?>

            </div>
        </div>

    </div>
</div>