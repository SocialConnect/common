<?php
/**
 * SocialConnect project
 * @author: Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace SocialConnect\Common\Entity;

/**
 * Class User
 * @package SocialConnect\Common\Entity
 */
class User extends \stdClass
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $birthday;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $sex;

    /**
     * @var string
     */
    public $fullname;
}
