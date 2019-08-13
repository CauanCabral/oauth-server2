<?php
namespace OauthServer2\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuthCode Entity
 *
 * @property string $auth_code_id
 * @property int $session_id
 * @property string $redirect_uri
 * @property int $expires
 * @property bool $revoked
 *
 * @property \OauthServer2\Model\Entity\Session $session
 */
class AuthCode extends Entity
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
        'auth_code_id' => true,
        'session_id' => true,
        'redirect_uri' => true,
        'expires' => true,
        'revoked' => true,
        'auth_code' => true,
        'session' => true
    ];
}
