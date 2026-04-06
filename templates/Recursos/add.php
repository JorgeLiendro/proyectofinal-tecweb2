<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">Nuevo Recurso</h4>

                    <?= $this->Html->link(
                        '← Volver',
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <?= $this->Form->create($recurso) ?>

                <div class="mb-3">
                    <?= $this->Form->control('nombre', [
                        'class' => 'form-control',
                        'label' => 'Nombre',
                        'placeholder' => 'Ingrese el nombre del recurso'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('descripcion', [
                        'class' => 'form-control',
                        'label' => 'Descripción',
                        'type' => 'textarea',
                        'placeholder' => 'Ingrese la descripción...'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('fecha_creacion', [
                        'class' => 'form-control',
                        'label' => 'Fecha Creación',
                        'empty' => true
                    ]) ?>
                </div>

                <!-- BOTÓN -->
                <div class="d-flex justify-content-end">
                    <?= $this->Form->button('Guardar', [
                        'class' => 'btn btn-danger px-4'
                    ]) ?>
                </div>

                <?= $this->Form->end() ?>

            </div>
        </div>

    </div>
</div>