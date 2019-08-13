<?php
namespace OauthServer2\Model\Entity;

use Cake\ORM\Entity;
use League\OAuth2\Server\CryptKey;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\Traits\EAccessTokenTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;

/**
 * AccessToken Entity
 *
 * @property string $id
 * @property int $session_id
 * @property int $expires
 * @property bool $revoked
 *
 * @property \OauthServer2\Model\Entity\Session $session
 */
class AccessToken extends Entity implements AccessTokenEntityInterface
{
    use AccessTokenTrait, TokenEntityTrait;

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
        'revoked' => true,
        'session' => true,
    ];

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setIdentifier(string $identifier)
    {
        $this->id = $identifier;
    }

    /**
     * {@inheritdoc}
     */
    public function getClient()
    {
        return $this->session->client;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpiryDateTime()
    {
        return $this->expires;
    }

    /**
     * {@inheritdoc}
     */
    public function setExpiryDateTime(\DateTime $dateTime)
    {
        $this->expires = $dateTime;
    }
}
