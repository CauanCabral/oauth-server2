<?php
namespace OauthServer2\Model\Table;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;

/**
 * Clients Model
 *
 * @property \OauthServer2\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $ParentClients
 * @property \OauthServer2\Model\Table\ClientsTable|\Cake\ORM\Association\HasMany $ChildClients
 *
 * @method \OauthServer2\Model\Entity\Client get($primaryKey, $options = [])
 * @method \OauthServer2\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \OauthServer2\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\Client saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table implements ClientRepositoryInterface
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

        $this->setTable('oauth_clients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentClients', [
            'className' => 'OauthServer2.Clients',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildClients', [
            'className' => 'OauthServer2.Clients',
            'foreignKey' => 'parent_id'
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
            ->scalar('id')
            ->maxLength('id', 20)
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('secret')
            ->maxLength('secret', 40)
            ->requirePresence('secret', 'create')
            ->notEmptyString('secret');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('redirect_uri')
            ->maxLength('redirect_uri', 255)
            ->requirePresence('redirect_uri', 'create')
            ->notEmptyString('redirect_uri');

        $validator
            ->scalar('parent_model')
            ->maxLength('parent_model', 200)
            ->allowEmptyString('parent_model');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentClients'));

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientEntity($clientIdentifier, $grantType = null, $clientSecret = null, $mustValidateSecret = true)
    {
        try {
            $client = $this->get($clientIdentifier);
        } catch (RecordNotFoundException $e) {
            return null;
        }

        if (!$this->canHandleGrant($client, $grantType)) {
            return null;
        }

        if ($mustValidateSecret && !hash_equals($client->secret, $clientSecret)) {
            return null;
        }

        return $client;
    }

    /**
     * Determine if the given client can handle the given grant type.
     *
     * @param  ClientEntityInterface  $client
     * @param  string  $grantType
     * @return bool
     */
    protected function canHandleGrant(ClientEntityInterface $client, $grantType)
    {
        if ($grantType === 'client_credentials') {
            return !empty($client->secret);
        }

        if (method_exists($client, 'handleGrande')) {
            return $client->handleGrande($grantType);
        }

        return false;
    }
}
