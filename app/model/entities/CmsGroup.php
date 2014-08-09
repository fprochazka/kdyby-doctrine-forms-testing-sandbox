<?php

namespace App\Model\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Kdyby\Doctrine\Entities\BaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table
 */
class CmsGroup extends BaseEntity
{
	use Identifier;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\ManyToMany(targetEntity="CmsUser", mappedBy="groups")
	 * @var CmsUser[]|ArrayCollection
	 */
	protected $users;


	public function __construct()
	{
		$this->users = new ArrayCollection;
	}

}
