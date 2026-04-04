<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                         Editar Usuario
                    </h4>

                    <?= $this->Html->link(
                        '← Volver',
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <?= $this->Form->create($user) ?>

                <div class="mb-3">
                    <?= $this->Form->control('nombre', [
                        'class' => 'form-control',
                        'label' => 'Nombre'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('apellido', [
                        'class' => 'form-control',
                        'label' => 'Apellido'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('correo', [
                        'class' => 'form-control',
                        'label' => 'Correo'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'type' => 'password',
                        'label' => 'Contraseña',
                        'placeholder' => 'Dejar vacío para no cambiar'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('language', [
                        'class' => 'form-control',
                        'label' => 'Idioma'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('direccion', [
                        'class' => 'form-control',
                        'label' => 'Dirección'
                    ]) ?>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-between mt-3">

                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $user->id],
                        [
                            'class' => 'btn btn-outline-danger',
                            'confirm' => '¿Seguro que deseas eliminar este usuario?'
                        ]
                    ) ?>

                    <?= $this->Form->button('Actualizar', [
                        'class' => 'btn btn-danger px-4'
                    ]) ?>

                </div>

                <?= $this->Form->end() ?>

            </div>
        </div>

    </div>
</div>