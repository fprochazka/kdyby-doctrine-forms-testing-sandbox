<?php

namespace App\Components\SimpleForm;

use App\Components\EntityForm;
use App\Components\EntityFormFactory;
use App\Model\Entities\CmsAddress;
use Kdyby\Autowired\AutowireComponentFactories;
use Nette;


class Control extends Nette\Application\UI\Control
{
	use AutowireComponentFactories;

	/**
	 * @var CmsAddress
	 */
	private $cmsAddress;


	public function __construct()
	{
		$this->cmsAddress = new CmsAddress;
	}


	/**
	 * @param \Nette\ComponentModel\Container $obj
	 */
	protected function attached($obj)
	{
		parent::attached($obj);

		if (!$obj instanceof \Nette\Application\UI\Presenter) {
			return;
		}

		// note: entity has to be bind after presenter attachment due to internal service locator
		/** @var EntityForm $form */
		$form = $this['form'];
		$form->bindEntity($this->cmsAddress);
	}


	/**
	 * @return EntityForm
	 */
	protected function createComponentForm(EntityFormFactory $factory)
	{
		$form = $factory->create();
		$form->addText('country', 'Country');
		$form->addText('zip', 'Zip');
		$form->addText('city', 'City');
		$form->addSubmit('send', 'Save');
		$form->onSuccess[] = $this->processForm;
		return $form;
	}


	public function processForm(EntityForm $form)
	{
		$this->cmsAddress = $form->getEntity();
	}


	public function render()
	{
		$this->template->cmsAddress = $this->cmsAddress;
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}
