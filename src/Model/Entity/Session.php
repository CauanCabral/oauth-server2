<?php
namespace OauthServer2\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity
 *
 * @property int $id
 * @property string $owner_model
 * @property string $owner_id
 * @property string $client_id
 * @property string|null $client_redirect_uri
 *
 * @property \OauthServer2\Model\Entity\Owner $owner
 * @property \OauthServer2\Model\Entity\Client $client
 */
class Session extends Entity
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
        'owner_model' => true,
        'owner_id' => true,
        'client_id' => true,
        'client_redirect_uri' => true,
        'owner' => true,
        'client' => true
    ];
}
