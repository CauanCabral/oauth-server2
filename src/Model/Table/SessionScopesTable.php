<?php
namespace OauthServer2\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SessionScopes Model
 *
 * @property \OauthServer2\Model\Table\SessionsTable|\Cake\ORM\Association\BelongsTo $Sessions
 * @property \OauthServer2\Model\Table\ScopesTable|\Cake\ORM\Association\BelongsTo $Scopes
 *
 * @method \OauthServer2\Model\Entity\SessionScope get($primaryKey, $options = [])
 * @method \OauthServer2\Model\Entity\SessionScope newEntity($data = null, array $options = [])
 * @method \OauthServer2\Model\Entity\SessionScope[] newEntities(array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\SessionScope|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\SessionScope saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\SessionScope patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\SessionScope[] patchEntities($entities, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\SessionScope findOrCreate($search, callable $callback = null, $options = [])
 */
class SessionScopesTable extends Table
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

        $this->setTable('oauth_session_scopes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'OauthServer2.Sessions'
        ]);
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
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        $rules->add($rules->existsIn(['scope_id'], 'Scopes'));

        return $rules;
    }
}
