<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $recursos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reserva->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reservas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reservas form content">
            <?= $this->Form->create($reserva) ?>
            <fieldset>
                <legend><?= __('Edit Reserva') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('recurso_id', ['options' => $recursos]);
                    echo $this->Form->control('fechareserva');
                    echo $this->Form->control('estado');
                    echo $this->Form->control('fechacreacion', ['empty' => true]);
                    echo $this->Form->control('observaciones');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
