<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0"><?= __('Nuevo Usuario') ?></h4>

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
                        'label' => __('Nombre'),
                        'placeholder' => __('Ingrese el nombre')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('apellido', [
                        'class' => 'form-control',
                        'label' => __('Apellido'),
                        'placeholder' => __('Ingrese el apellido')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('correo', [
                        'class' => 'form-control',
                        'label' => __('Correo'),
                        'placeholder' => __('ejemplo@email.com')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'label' => __('Contraseña'),
                        'type' => 'password',
                        'placeholder' => __('Ingrese la contraseña')
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
                        'label' => __('Dirección'),
                        'placeholder' => __('Ingrese la dirección')
                    ]) ?>
                </div>

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