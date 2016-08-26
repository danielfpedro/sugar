<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CakePortugues Model
 *
 * @method \App\Model\Entity\CakePortugue get($primaryKey, $options = [])
 * @method \App\Model\Entity\CakePortugue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CakePortugue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CakePortugue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CakePortugue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CakePortugue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CakePortugue findOrCreate($search, callable $callback = null)
 */
class CakePortuguesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('cake_portugues');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->dateTime('criado')
            ->requirePresence('criado', 'create')
            ->notEmpty('criado');

        $validator
            ->dateTime('modificado')
            ->allowEmpty('modificado');

        $validator
            ->integer('ativo')
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');

        $validator
            ->integer('deletado')
            ->requirePresence('deletado', 'create')
            ->notEmpty('deletado');

        $validator
            ->dateTime('dt_deletado')
            ->allowEmpty('dt_deletado');

        return $validator;
    }
}
