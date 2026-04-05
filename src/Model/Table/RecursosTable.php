<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recursos Model
 *
 * @property \App\Model\Table\ReservasTable&\Cake\ORM\Association\HasMany $Reservas
 *
 * @method \App\Model\Entity\Recurso newEmptyEntity()
 * @method \App\Model\Entity\Recurso newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Recurso> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recurso get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Recurso findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Recurso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Recurso> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recurso|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Recurso saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Recurso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recurso>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recurso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recurso> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recurso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recurso>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Recurso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Recurso> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RecursosTable extends Table
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

        $this->setTable('recursos');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->hasMany('Reservas', [
            'foreignKey' => 'recurso_id',
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
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        $validator
            ->dateTime('fecha_creacion')
            ->allowEmptyDateTime('fecha_creacion');

        return $validator;
    }
}
