<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Kdyby\Doctrine\Entities\BaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table(name="cms_employees")
 */
class CmsEmployee extends BaseEntity
{
	use Identifier;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\OneToOne(targetEntity="CmsEmployee")
	 */
	protected $spouse;

}
