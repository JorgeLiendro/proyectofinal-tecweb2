<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                        <?= __('Editar Usuario') ?>
                    </h4>

                    <?= $this->Html->link(
                        __('← Volver'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <?= $this->Form->create($user) ?>

                <div class="mb-3">
                    <?= $this->Form->control('nombre', [
                        'class' => 'form-control',
                        'label' => __('Nombre')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('apellido', [
                        'class' => 'form-control',
                        'label' => __('Apellido')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('correo', [
                        'class' => 'form-control',
                        'label' => __('Correo')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'type' => 'password',
                        'label' => __('Contraseña'),
                        'placeholder' => __('Dejar vacío para no cambiar')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('language', [
                        'class' => 'form-control',
                        'label' => __('Idioma')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('direccion', [
                        'class' => 'form-control',
                        'label' => __('Dirección')
                    ]) ?>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-between mt-3">

                    <?= $this->Form->postLink(
                        __('Eliminar'),
                        ['action' => 'delete', $user->id],
                        [
                            'class' => 'btn btn-outline-danger',
                            'confirm' => __('¿Seguro que deseas eliminar este usuario?')
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