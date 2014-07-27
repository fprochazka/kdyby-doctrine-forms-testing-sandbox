<?php

namespace App\Components;

use Kdyby;
use Nette\Application\UI\Form;


class EntityForm extends Form
{
	use Kdyby\DoctrineForms\EntityForm;

}
