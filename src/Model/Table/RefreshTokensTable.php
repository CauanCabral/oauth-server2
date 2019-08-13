<?php
namespace OauthServer2\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefreshTokens Model
 *
 * @property \OauthServer2\Model\Table\AccessTokensTable|\Cake\ORM\Association\BelongsTo $AccessTokens
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

        $this->belongsTo('AccessTokens', [
            'foreignKey' => 'access_token_id',
            'joinType' => 'INNER',
            'className' => 'OauthServer2.AccessTokens'
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
            ->scalar('refresh_token')
            ->maxLength('refresh_token', 40)
            ->allowEmptyString('refresh_token', 'create');

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
        $rules->add($rules->existsIn(['access_token_id'], 'AccessTokens'));

        return $rules;
    }
}
