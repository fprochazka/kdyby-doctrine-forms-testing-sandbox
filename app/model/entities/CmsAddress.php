<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Kdyby\Doctrine\Entities\BaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table
 */
class CmsAddress extends BaseEntity
{
	use Identifier;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $country;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $zip;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $city;

	/**
	 * @ORM\OneToOne(targetEntity="CmsUser", inversedBy="address")
	 * @var CmsUser
	 */
	protected $user;

}
