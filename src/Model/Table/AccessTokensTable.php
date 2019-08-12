<?php
namespace OauthServer2\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;

/**
 * AccessTokens Model
 *
 * @property \OauthServer2\Model\Table\SessionsTable|\Cake\ORM\Association\BelongsTo $Sessions
 *
 * @method \OauthServer2\Model\Entity\AccessToken get($primaryKey, $options = [])
 * @method \OauthServer2\Model\Entity\AccessToken newEntity($data = null, array $options = [])
 * @method \OauthServer2\Model\Entity\AccessToken[] newEntities(array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\AccessToken|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\AccessToken saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\AccessToken patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\AccessToken[] patchEntities($entities, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\AccessToken findOrCreate($search, callable $callback = null, $options = [])
 */
class AccessTokensTable extends Table implements AccessTokenRepositoryInterface
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

        $this->setTable('oauth_access_tokens');
        $this->setDisplayField('oauth_token');
        $this->setPrimaryKey('oauth_token');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'OauthServer2.Sessions'
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
            ->scalar('oauth_token')
            ->maxLength('oauth_token', 40)
            ->allowEmptyString('oauth_token', 'create');

        $validator
            ->integer('expires')
            ->requirePresence('expires', 'create')
            ->notEmptyString('expires');

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
        $rules->add($rules->isUnique(['oauth_token']));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewToken(ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null)
    {
        $token = $this->newEntity();
        $token->scopes = $scopes;
        $token->userIdentifier = $userIdentifier;

        return $token;
    }

    /**
     * {@inheritdoc}
     */
    public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity)
    {
        $entry = $this->newEntity([
            'oauth_token' => $accessTokenEntity->getIdentifier(),
            'user_id' => $accessTokenEntity->getUserIdentifier(),
            'client_id' => $accessTokenEntity->getClient()->getIdentifier(),
            'scopes' => $accessTokenEntity->getScopes(),
            'revoked' => false,
            'expires_at' => $accessTokenEntity->getExpiryDateTime(),
        ]);

        $this->save($entry);
    }

    /**
     * Revoke an access token.
     *
     * @param string $tokenId
     */
    public function revokeAccessToken($tokenId)
    {
        $this->updateAll(['revoked' => true], ['oauth_token' => $tokenId]);
    }

    /**
     * Check if the access token has been revoked.
     *
     * @param string $tokenId
     *
     * @return bool Return true if this token has been revoked
     */
    public function isAccessTokenRevoked($tokenId)
    {
        $entry = $this->get($tokenId);
        return $entry->revoked;
    }
}
