<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-danger mb-0">
                        <?= __('Editar Reserva') ?>
                    </h4>

                    <?= $this->Html->link(
                        __('← Volver'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm']
                    ) ?>
                </div>

                <?= $this->Form->create($reserva) ?>

                <!-- USUARIO -->
                <div class="mb-3">
                    <?= $this->Form->control('user_id', [
                        'class' => 'form-control',
                        'label' => __('Usuario'),
                        'options' => $users
                    ]) ?>
                </div>

                <!-- RECURSOS -->
                <div class="mb-3">
                    <label class="form-label"><?= __('Recursos') ?></label>

                    <?php foreach ($recursos as $id => $nombre): ?>

                        <?php
                        $detalleExistente = null;

                        if (!empty($reserva->detalle_reservas)) {
                            foreach ($reserva->detalle_reservas as $d) {
                                if ($d->recurso_id == $id) {
                                    $detalleExistente = $d;
                                    break;
                                }
                            }
                        }
                        ?>

                        <div class="form-check">
                            <input type="checkbox"
                                name="detalle_reservas[<?= $id ?>][recurso_id]"
                                value="<?= $id ?>"
                                class="form-check-input"
                                <?= ($detalleExistente !== null) ? 'checked' : '' ?>
                            >

                            <?php if ($detalleExistente !== null): ?>
                                <input type="hidden"
                                    name="detalle_reservas[<?= $id ?>][id]"
                                    value="<?= $detalleExistente->id ?>">
                            <?php endif; ?>

                            <label class="form-check-label">
                                <?= h($nombre) ?>
                            </label>
                        </div>

                    <?php endforeach; ?>
                </div>

                <!-- FECHA -->
                <div class="mb-3">
                    <?= $this->Form->control('fechareserva', [
                        'class' => 'form-control',
                        'label' => __('Fecha Reserva')
                    ]) ?>
                </div>

                <!-- ESTADO -->
                <div class="mb-3">
                    <?= $this->Form->control('estado', [
                        'class' => 'form-control',
                        'label' => __('Estado')
                    ]) ?>
                </div>

                <!-- FECHA CREACION -->
                <div class="mb-3">
                    <?= $this->Form->control('fechacreacion', [
                        'class' => 'form-control',
                        'label' => __('Fecha Creación'),
                        'empty' => true
                    ]) ?>
                </div>

                <!-- OBSERVACIONES -->
                <div class="mb-3">
                    <?= $this->Form->control('observaciones', [
                        'class' => 'form-control',
                        'label' => __('Observaciones'),
                        'type' => 'textarea'
                    ]) ?>
                </div>

                <!-- BOTONES -->
                <div class="d-flex justify-content-between mt-3">

                    <?= $this->Form->postLink(
                        __('Eliminar'),
                        ['action' => 'delete', $reserva->id],
                        [
                            'class' => 'btn btn-outline-danger',
                            'confirm' => __('¿Seguro que deseas eliminar esta reserva?')
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