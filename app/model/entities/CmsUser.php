<?php

namespace App\Model\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Kdyby\Doctrine\Entities\BaseEntity;
use KdybyTests\DoctrineForms\CmsAddress;


/**
 * @ORM\Entity
 * @ORM\Table
 */
class CmsUser extends BaseEntity
{
	use Identifier;

	/**
	 * @ORM\Column(type="string", nullable=TRUE)
	 * @var string
	 */
	protected $status;

	/**
	 * @ORM\Column(type="string", unique=TRUE)
	 * @var string
	 */
	protected $username;

	/**
	 * @ORM\Column(type="string")
 	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\OneToMany(targetEntity="CmsPhoneNumber", mappedBy="user", cascade={"persist", "merge"}, orphanRemoval=TRUE)
	 * @var CmsPhoneNumber[]|ArrayCollection
	 */
	protected $phoneNumbers;

	/**
	 * @ORM\OneToMany(targetEntity="CmsArticle", mappedBy="user", cascade={"detach"})
	 * @var CmsArticle[]|ArrayCollection
	 */
	protected $articles;

	/**
	 * @ORM\OneToOne(targetEntity="CmsAddress", mappedBy="user", cascade={"persist"}, orphanRemoval=TRUE)
	 * @var CmsAddress
	 */
	protected $address;

	/**
	 * @ORM\OneToOne(targetEntity="CmsEmail", inversedBy="user", cascade={"persist"}, orphanRemoval=TRUE)
	 * @ORM\JoinColumn(nullable=TRUE)
	 * @var CmsEmail
	 */
	protected $email;

	/**
	 * @ORM\ManyToMany(targetEntity="CmsGroup", inversedBy="users", cascade={"persist", "merge", "detach"})
	 * @ORM\JoinTable(name="cms_users_groups",
	 *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
	 *      )
	 * @var CmsGroup[]|ArrayCollection
	 */
	protected $groups;


	public function __construct()
	{
		$this->phoneNumbers = new ArrayCollection;
		$this->articles = new ArrayCollection;
		$this->groups = new ArrayCollection;
	}

}
