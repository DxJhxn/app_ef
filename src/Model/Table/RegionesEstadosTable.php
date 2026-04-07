<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RegionesEstados Model
 *
 * @method \App\Model\Entity\RegionesEstado newEmptyEntity()
 * @method \App\Model\Entity\RegionesEstado newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RegionesEstado> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RegionesEstado get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RegionesEstado findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RegionesEstado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RegionesEstado> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RegionesEstado|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RegionesEstado saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RegionesEstado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegionesEstado>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RegionesEstado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegionesEstado> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RegionesEstado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegionesEstado>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RegionesEstado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegionesEstado> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RegionesEstadosTable extends Table
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

        $this->setTable('regiones_estados');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->maxLength('nombre', 250)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('codigo')
            ->maxLength('codigo', 10)
            ->requirePresence('codigo', 'create')
            ->notEmptyString('codigo');

        $validator
            ->scalar('pais')
            ->maxLength('pais', 100)
            ->requirePresence('pais', 'create')
            ->notEmptyString('pais');

        return $validator;
    }
}
