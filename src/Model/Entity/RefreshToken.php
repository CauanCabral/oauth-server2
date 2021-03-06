<?php
namespace OauthServer2\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefreshToken Entity
 *
 * @property string $refresh_token
 * @property string $access_token_id
 * @property int $expires
 *
 * @property \OauthServer2\Model\Entity\AccessToken $access_token
 */
class RefreshToken extends Entity
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
        'access_token_id' => true,
        'expires' => true,
        'access_token' => true,
    ];
}
