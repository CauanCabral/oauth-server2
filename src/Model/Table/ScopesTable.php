<?php
namespace OauthServer2\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scopes Model
 *
 * @method \OauthServer2\Model\Entity\Scope get($primaryKey, $options = [])
 * @method \OauthServer2\Model\Entity\Scope newEntity($data = null, array $options = [])
 * @method \OauthServer2\Model\Entity\Scope[] newEntities(array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Scope|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\Scope saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OauthServer2\Model\Entity\Scope patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Scope[] patchEntities($entities, array $data, array $options = [])
 * @method \OauthServer2\Model\Entity\Scope findOrCreate($search, callable $callback = null, $options = [])
 */
class ScopesTable extends Table
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

        $this->setTable('oauth_scopes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->maxLength('id', 40)
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
