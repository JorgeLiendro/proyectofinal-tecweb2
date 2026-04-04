<div class="login-container">
    <div class="login-card">
        <h2>Iniciar Sesión</h2>

        <?= $this->Form->create(null) ?>

        <div class="input-group input-field">
            <?= $this->Form->control('correo', [
                'label' => 'Correo',
                'placeholder' => 'Ingrese su correo',
                'required' => true
            ]) ?>
        </div>

        <div class="input-group input-field">
            <?= $this->Form->control('password', [
                'type' => 'password',
                'label' => 'Contraseña',
                'placeholder' => 'Ingrese su contraseña',
                'required' => true
            ]) ?>
        </div>

        <?= $this->Form->button('Ingresar', ['class' => 'btn-login']) ?>

        <?= $this->Form->end() ?>
    </div>
</div>