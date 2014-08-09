<?php

namespace App\Components;

use Nextras\Forms\Rendering\Bs3FormRenderer;


class EntityFormFactory
{

	/**
	 * @return EntityForm
	 */
	public function create()
	{
		$form = new EntityForm;
		$form->setRenderer(new Bs3FormRenderer);
		return $form;
	}

}
