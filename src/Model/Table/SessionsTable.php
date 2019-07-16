<?php
namespace OauthServer2\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sessions Model
 *
 * @property \OauthServer2\Model\Table\OwnersTable|\Cake\ORM\Association\BelongsTo $Owners
 * @property \OauthServer2\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 *
 * @method \OauthServer2\Model\Entity\Session get($primaryKey, $options = [])
 * @method \OauthServer2\Model\Entity\Session newEntity($data = null, array $options = [])
 * @method \OauthServer2\Model\Entity\Session[] newEntities(array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Session|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\Session saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\Session patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Session[] patchEntities($entities, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Session findOrCreate($search, callable $callback = null, $options = [])
 */
class SessionsTable extends Table
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

        $this->setTable('oauth_sessions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id',
            'joinType' => 'INNER',
            'className' => 'OauthServer2.Owners'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
            'className' => 'OauthServer2.Clients'
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
            ->scalar('owner_model')
            ->maxLength('owner_model', 200)
            ->requirePresence('owner_model', 'create')
            ->notEmptyString('owner_model');

        $validator
            ->scalar('client_redirect_uri')
            ->maxLength('client_redirect_uri', 200)
            ->allowEmptyString('client_redirect_uri');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
