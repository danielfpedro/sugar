<?php
namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');


        $validator
            ->allowEmpty('new_password')
            ->add('new_password', 'confirmaSenha', [
                'rule' => function ($value, $context) {
                    if ($value) {
                        return ($value == $context['data']['confirm_new_password']);
                    }
                    return true;
                },
                'message' => 'Você não confirmou a sua nova senha corretamente.'
            ]);

        $validator
            ->allowEmpty('current_password')
            ->add('current_password', 'confirmaSenhaAtual', [
                'rule' => function ($value, $context) {
                    /**
                     * Eu alguns casos você programador vai querer que o usuario confirmar a senha atual
                     * dele para alguns algumas coisas e outras horas não. Para dar maior flexibilidade
                     * só é checado quando estiver nos dados a flag 'precisa_confirmar_senha_atual'.
                     * Lembrando que vc deve setar essa flag manualmente no controller, não coloque isso
                     * como um campo do formulário pois o usuário pode retirá-la facilmente.
                     */
                    if ($context['data']['precisa_confirmar_senha_atual']) {
                        $user = $this->get($context['data']['id']);

                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                            return true;
                        }
                        return false;
                    }

                    return true;
                },
                'message' => 'Você não confirmou a sua nova atual corretamente.'
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
