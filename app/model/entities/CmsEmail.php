<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Kdyby\Doctrine\Entities\BaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table
 */
class CmsEmail extends BaseEntity
{
	use Identifier;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $email;

	/**
	 * @ORM\OneToOne(targetEntity="CmsUser", mappedBy="email")
	 * @ORM\JoinColumn(nullable=false)
	 */
	protected $user;

}
