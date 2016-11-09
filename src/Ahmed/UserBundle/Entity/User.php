<?php

// src/AppBundle/Entity/User.php

namespace Ahmed\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    public function getExpiresAt() {
        return $this->expiresAt;
    }

    public function getCredentialsExpireAt() {
        return $this->credentialsExpireAt;
    }

    public function getRolesAsString() {
        $roles = parent::getRoles();
        return $roles[0];
    }

    public function setRolesAsString($role) {
        foreach ($this->getRoles() as $originalRole) {
            $this->removeRole($originalRole);
        }
        parent::addRole($role);
    }

    public function __toString() {
        return (string) $this->username;
    }

}
