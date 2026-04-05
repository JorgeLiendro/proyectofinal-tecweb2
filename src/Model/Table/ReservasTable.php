<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservas Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RecursosTable&\Cake\ORM\Association\BelongsTo $Recursos
 *
 * @method \App\Model\Entity\Reserva newEmptyEntity()
 * @method \App\Model\Entity\Reserva newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Reserva> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reserva get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Reserva findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Reserva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Reserva> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reserva|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Reserva saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ReservasTable extends Table
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

        $this->setTable('reservas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('recurso_id')
            ->notEmptyString('recurso_id');

        $validator
            ->date('fechareserva')
            ->requirePresence('fechareserva', 'create')
            ->notEmptyDate('fechareserva');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 50)
            ->allowEmptyString('estado');

        $validator
            ->dateTime('fechacreacion')
            ->allowEmptyDateTime('fechacreacion');

        $validator
            ->scalar('observaciones')
            ->allowEmptyString('observaciones');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['recurso_id'], 'Recursos'), ['errorField' => 'recurso_id']);

        return $rules;
    }
}
