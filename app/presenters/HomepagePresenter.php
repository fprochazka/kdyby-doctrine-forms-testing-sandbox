<?php

namespace App\Presenters;

use App\Components\SimpleForm;
use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	/**
	 * @var SimpleForm\IControlFactory
	 * @inject
	 */
	public $simpleFormFactory;


	/**
	 * @return SimpleForm\Control
	 */
	protected function createComponentSimpleForm()
	{
		$control = $this->simpleFormFactory->create();
		return $control;
	}

}
