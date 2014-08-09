<?php

namespace App\Components\SimpleForm;


interface IControlFactory
{

	/**
	 * @return Control
	 */
	public function create();

}
