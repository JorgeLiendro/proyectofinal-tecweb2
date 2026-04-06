<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleReservas Model
 *
 * @property \App\Model\Table\ReservasTable&\Cake\ORM\Association\BelongsTo $Reservas
 * @property \App\Model\Table\RecursosTable&\Cake\ORM\Association\BelongsTo $Recursos
 *
 * @method \App\Model\Entity\DetalleReserva newEmptyEntity()
 * @method \App\Model\Entity\DetalleReserva newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DetalleReserva> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetalleReserva get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DetalleReserva findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DetalleReserva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DetalleReserva> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleReserva|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DetalleReserva saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleReserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleReserva>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleReserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleReserva> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleReserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleReserva>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleReserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleReserva> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetalleReservasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('detalle_reservas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Reservas', [
            'foreignKey' => 'reserva_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Recursos', [
            'foreignKey' => 'recurso_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('reserva_id')
            ->notEmptyString('reserva_id');

        $validator
            ->integer('recurso_id')
            ->notEmptyString('recurso_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['reserva_id'], 'Reservas'), ['errorField' => 'reserva_id']);
        $rules->add($rules->existsIn(['recurso_id'], 'Recursos'), ['errorField' => 'recurso_id']);

        return $rules;
    }
}
