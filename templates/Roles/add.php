<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0"><?= __('Nuevo Rol') ?></h4>

                    <?= $this->Html->link(
                        __('← Volver'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <?= $this->Form->create($role) ?>

                <div class="mb-3">
                    <?= $this->Form->control('nombre', [
                        'class' => 'form-control',
                        'label' => __('Nombre'),
                        'placeholder' => __('Ingrese el nombre del rol')
                    ]) ?>
                </div>

                <!-- BOTÓN -->
                <div class="d-flex justify-content-end">
                    <?= $this->Form->button(__('Guardar'), [
                        'class' => 'btn btn-danger px-4'
                    ]) ?>
                </div>

                <?= $this->Form->end() ?>

            </div>
        </div>

    </div>
</div>