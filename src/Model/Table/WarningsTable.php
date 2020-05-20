<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Warnings Model
 *
 * @method \App\Model\Entity\Warning newEmptyEntity()
 * @method \App\Model\Entity\Warning newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Warning[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Warning get($primaryKey, $options = [])
 * @method \App\Model\Entity\Warning findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Warning patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Warning[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Warning|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Warning saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Warning[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warning[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warning[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warning[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WarningsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('warnings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('source')
            ->maxLength('source', 40)
            ->requirePresence('source', 'create')
            ->notEmptyString('source');

        $validator
            ->boolean('telegram')
            ->requirePresence('telegram', 'create')
            ->notEmptyString('telegram');

        $validator
            ->scalar('email_list')
            ->maxLength('email_list', 200)
            ->requirePresence('email_list', 'create')
            ->notEmptyString('email_list');

        $validator
            ->dateTime('time')
            ->notEmptyDateTime('time');

        return $validator;
    }
}
