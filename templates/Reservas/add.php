<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">Nueva Reserva</h4>

                    <?= $this->Html->link(
                        '← Volver',
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <!--  FORMULARIO CARRITO (SEPARADO) -->
                <?= $this->Form->create(null, ['url' => ['action' => 'agregar']]) ?>

                <div class="mb-3">
                    <?= $this->Form->control('recurso_id', [
                        'options' => $recursos,
                        'label' => 'Seleccionar recurso',
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <?= $this->Form->button('Agregar al carrito', [
                    'class' => 'btn btn-secondary mb-3'
                ]) ?>

                <?= $this->Form->end() ?>

                <!--  MOSTRAR CARRITO -->
                <?php
                $carrito = $this->request->getSession()->read('Carrito') ?? [];
                $recursosLista = $recursos->toArray();
                ?>

                <h5>Carrito</h5>
                <ul>
                    <?php foreach ($carrito as $item): ?>
                        <li><?= $recursosLista[$item] ?? 'Recurso no encontrado' ?></li>
                    <?php endforeach; ?>
                </ul>

                <hr>

                <!--  FORMULARIO PRINCIPAL -->
                <?= $this->Form->create($reserva) ?>

                <div class="mb-3">
                    <?= $this->Form->control('user_id', [
                        'class' => 'form-control',
                        'label' => 'Usuario',
                        'options' => $users
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('fechareserva', [
                        'class' => 'form-control',
                        'label' => 'Fecha Reserva'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('estado', [
                        'class' => 'form-control',
                        'label' => 'Estado'
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('fechacreacion', [
                        'class' => 'form-control',
                        'label' => 'Fecha Creación',
                        'empty' => true
                    ]) ?>
                </div>

                <div class="mb-3">
                    <?= $this->Form->control('observaciones', [
                        'class' => 'form-control',
                        'label' => 'Observaciones',
                        'type' => 'textarea',
                        'placeholder' => 'Ingrese observaciones...'
                    ]) ?>
                </div>

                <!-- BOTÓN GUARDAR -->
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