<?php
namespace OauthServer2\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefreshTokens Model
 *
 * @method \OauthServer2\Model\Entity\RefreshToken get($primaryKey, $options = [])
 * @method \OauthServer2\Model\Entity\RefreshToken newEntity($data = null, array $options = [])
 * @method \OauthServer2\Model\Entity\RefreshToken[] newEntities(array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\RefreshToken|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\RefreshToken saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\RefreshToken patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\RefreshToken[] patchEntities($entities, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\RefreshToken findOrCreate($search, callable $callback = null, $options = [])
 */
class RefreshTokensTable extends Table
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

        $this->setTable('oauth_refresh_tokens');
        $this->setDisplayField('refresh_token');
        $this->setPrimaryKey('refresh_token');
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
            ->scalar('refresh_token')
            ->maxLength('refresh_token', 40)
            ->allowEmptyString('refresh_token', 'create');

        $validator
            ->scalar('oauth_token')
            ->maxLength('oauth_token', 40)
            ->requirePresence('oauth_token', 'create')
            ->notEmptyString('oauth_token');

        $validator
            ->integer('expires')
            ->requirePresence('expires', 'create')
            ->notEmptyString('expires');

        return $validator;
    }
}
