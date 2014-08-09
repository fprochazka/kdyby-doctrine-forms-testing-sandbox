<?php

namespace App\Components\SimpleForm;

use App\Components\EntityForm;
use App\Components\EntityFormFactory;
use App\Model\Entities\CmsAddress;
use Nette;


class Control extends Nette\Application\UI\Control
{
	/**
	 * @var CmsAddress
	 */
	private $cmsAddress;

	/**
	 * @var EntityFormFactory
	 */
	private $entityFormFactory;


	public function __construct(EntityFormFactory $entityFormFactory)
	{
		$this->cmsAddress = new CmsAddress;
		$this->entityFormFactory = $entityFormFactory;
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

		// note: entity has to bind after presenter attachment due to internal service locator
		/** @var EntityForm $form */
		$form = $this['form'];
		$form->bindEntity($this->cmsAddress);
	}


	/**
	 * @return EntityForm
	 */
	protected function createComponentForm()
	{
		$form = $this->entityFormFactory->create();
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
