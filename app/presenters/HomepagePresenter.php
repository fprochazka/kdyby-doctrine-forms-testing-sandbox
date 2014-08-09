<?php

namespace App\Presenters;

use App\Components\SimpleForm;
use Kdyby\Autowired\AutowireComponentFactories;
use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	use AutowireComponentFactories;


	/**
	 * @return SimpleForm\Control
	 */
	protected function createComponentSimpleForm(SimpleForm\IControlFactory $factory)
	{
		return $factory->create();
	}

}
