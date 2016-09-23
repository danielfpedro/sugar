<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SpecialPlayers Model
 *
 * @method \App\Model\Entity\SpecialPlayer get($primaryKey, $options = [])
 * @method \App\Model\Entity\SpecialPlayer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SpecialPlayer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SpecialPlayer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpecialPlayer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SpecialPlayer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SpecialPlayer findOrCreate($search, callable $callback = null)
 */
class SpecialPlayersTable extends Table
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

        $this->table('special_players');
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
