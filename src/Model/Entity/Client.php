<?php
namespace OauthServer2\Model\Entity;

use Cake\ORM\Entity;
use League\OAuth2\Server\Entities\ClientEntityInterface;

/**
 * Client Entity
 *
 * @property string $id
 * @property string $secret
 * @property string $name
 * @property bool $revoked
 * @property string $redirect_uri
 * @property string|null $parent_model
 * @property int|null $parent_id
 *
 * @property \OauthServer2\Model\Entity\Client $parent_client
 * @property \OauthServer2\Model\Entity\Client[] $child_clients
 */
class Client extends Entity implements ClientEntityInterface
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
        'secret' => true,
        'name' => true,
        'revoked' => true,
        'redirect_uri' => true,
        'parent_model' => true,
        'parent_id' => true,
        'parent_client' => true,
        'child_clients' => true
    ];

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return (string) $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }
}
