<?php
namespace OauthServer2\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuthCodeScope Entity
 *
 * @property int $id
 * @property string $auth_code
 * @property string $scope_id
 *
 * @property \OauthServer2\Model\Entity\Scope $scope
 */
class AuthCodeScope extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'auth_code' => true,
        'scope_id' => true,
        'scope' => true
    ];
}
