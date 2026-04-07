<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mascotas Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Mascota newEmptyEntity()
 * @method \App\Model\Entity\Mascota newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Mascota> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mascota get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Mascota findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Mascota patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Mascota> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mascota|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Mascota saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Mascota>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mascota>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mascota>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mascota> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mascota>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mascota>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mascota>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mascota> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MascotasTable extends Table
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

        $this->setTable('mascotas');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('especie')
            ->maxLength('especie', 100)
            ->requirePresence('especie', 'create')
            ->notEmptyString('especie');

        $validator
            ->date('fecha_adopcion')
            ->requirePresence('fecha_adopcion', 'create')
            ->notEmptyDate('fecha_adopcion');

        $validator
            ->scalar('descripcion_es')
            ->allowEmptyString('descripcion_es');

        $validator
            ->scalar('descripcion_en')
            ->allowEmptyString('descripcion_en');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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

        return $rules;
    }
}
