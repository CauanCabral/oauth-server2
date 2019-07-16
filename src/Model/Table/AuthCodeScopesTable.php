<?php
namespace OauthServer2\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuthCodeScopes Model
 *
 * @property \OauthServer2\Model\Table\ScopesTable|\Cake\ORM\Association\BelongsTo $Scopes
 *
 * @method \OauthServer2\Model\Entity\AuthCodeScope get($primaryKey, $options = [])
 * @method \OauthServer2\Model\Entity\AuthCodeScope newEntity($data = null, array $options = [])
 * @method \OauthServer2\Model\Entity\AuthCodeScope[] newEntities(array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\AuthCodeScope|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\AuthCodeScope saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\AuthCodeScope patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\AuthCodeScope[] patchEntities($entities, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\AuthCodeScope findOrCreate($search, callable $callback = null, $options = [])
 */
class AuthCodeScopesTable extends Table
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

        $this->setTable('oauth_auth_code_scopes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Scopes', [
            'foreignKey' => 'scope_id',
            'joinType' => 'INNER',
            'className' => 'OauthServer2.Scopes'
        ]);
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('auth_code')
            ->maxLength('auth_code', 40)
            ->requirePresence('auth_code', 'create')
            ->notEmptyString('auth_code');

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
        $rules->add($rules->existsIn(['scope_id'], 'Scopes'));

        return $rules;
    }
}
