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
class CmsArticle extends BaseEntity
{
	use Identifier;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $topic;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */
	protected $text;

	/**
	 * @ORM\ManyToOne(targetEntity="CmsUser", inversedBy="articles")
	 * @var CmsUser
	 */
	protected $user;

	/**
	 * @ORM\OneToMany(targetEntity="CmsComment", mappedBy="article")
	 */
	protected $comments;

	/**
	 * @ORM\Version
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	protected $version;


	public function __construct()
	{
		$this->comments = new ArrayCollection;
	}

}
