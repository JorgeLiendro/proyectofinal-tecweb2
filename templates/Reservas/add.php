<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0"><?= __('Nueva Reserva') ?></h4>

                    <?= $this->Html->link(
                        __('← Volver'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <!-- FORMULARIO CARRITO -->
                <?= $this->Form->create(null, ['url' => ['action' => 'agregar']]) ?>

                <div class="mb-3">
                    <?= $this->Form->control('recurso_id', [
                        'options' => $recursos,
                        'label' => __('Seleccionar recurso'),
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <?= $this->Form->button(__('Agregar al carrito'), [
                    'class' => 'btn btn-secondary mb-3'
                ]) ?>

                <?= $this->Form->end() ?>

                <!-- MOSTRAR CARRITO -->
                <?php
                $carrito = $this->request->getSession()->read('Carrito') ?? [];
                $recursosLista = $recursos->toArray();
                ?>

                <h5><?= __('Carrito') ?></h5>
                <ul>
                    <?php foreach ($carrito as $item): ?>
                        <li><?= $recursosLista[$item] ?? __('Recurso no encontrado') ?></li>
                    <?php endforeach; ?>
                </ul>

                <hr>

                <!-- FORMULARIO PRINCIPAL -->
                <?= $this->Form->create($reserva) ?>

                <!-- USUARIO (OCULTO) -->
                <?= $this->Form->hidden('user_id', [
                    'value' => $this->request->getSession()->read('Auth.id')
                ]) ?>

                <div class="mb-3">
                    <?= $this->Form->control('fechareserva', [
                        'class' => 'form-control',
                        'label' => __('Fecha Reserva')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('estado', [
                        'class' => 'form-control',
                        'label' => __('Estado')
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('fechacreacion', [
                        'class' => 'form-control',
                        'label' => __('Fecha Creación'),
                        'empty' => true
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('observaciones', [
                        'class' => 'form-control',
                        'label' => __('Observaciones'),
                        'type' => 'textarea',
                        'placeholder' => __('Ingrese observaciones...')
                    ]) ?>
                </div>

                <!-- BOTÓN GUARDAR -->
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