<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Kdyby\Doctrine\Entities\BaseEntity;


/**
 * @ORM\Entity
 * @ORM\Table
 */
class CmsComment extends BaseEntity
{
	use Identifier;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $topic;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $text;

	/**
	 * @ORM\ManyToOne(targetEntity="CmsArticle", inversedBy="comments")
	 */
	protected $article;

}
