<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;

class ListBlock extends BlockBase {

	protected $style;

	protected $items = [];

	public function render() {
		$list = Element::create('ul');

		if ($this->style === 'ordered') {
			$list->setTag('ol');
		}

		foreach ($this->items as $item) {
			$list->appendContent(Element::create('li', $item));
		}

		return $list;
	}

}
