<?php

namespace App\View;

use App\Exception\NotFoundException;

class View implements Renderable
{
	private $view;
	private $data;

	public function __construct($view, $data = [])
	{
		$this->view = $view;
		$this->data = $data;
	}

	public function render()
	{
		extract($this->data);
		include $this->getIncludeTemplate($this->view);
	}

	private function getIncludeTemplate($view)
	{
		$path = VIEW_DIR . str_replace('.', DIRECTORY_SEPARATOR, $view) . '.php';		

		if (file_exists($path)) {
			return $path;
		}	

		throw new NotFoundException('Шаблон: ' . $path . '  - не найден', 125);	
	}
}
