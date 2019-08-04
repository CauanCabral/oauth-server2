<?php
namespace OauthServer2\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccessToken Entity
 *
 * @property string $oauth_token
 * @property int $session_id
 * @property int $expires
 *
 * @property \OauthServer2\Model\Entity\Session $session
 */
class AccessToken extends Entity
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
        'session_id' => true,
        'expires' => true,
        'session' => true
    ];
}
