<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\BaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table
 */
class CmsPhoneNumber extends BaseEntity
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	public $phoneNumber;

	/**
	 * @ORM\ManyToOne(targetEntity="CmsUser", inversedBy="phonenumbers", cascade={"merge"})
	 */
	protected $user;

}
