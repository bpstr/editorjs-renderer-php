<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Input;

class ChecklistBlock extends BlockBase {

	protected $group = 'checkboxes';

	protected $items = [];

	public function render() {
		$checkboxes = Element::create('form');
		foreach ($this->items as $key => $item) {
			if (empty($item['text'])) {
				continue;
			}

			$checkboxes->placeContent(
				$key,
			  	Input::build($this->group, $item['text'], Input::TYPE_CHECKBOX)
					->after(Element::create('label', $item['text']))
					->attr('checked', $item['checked'] ?? false)
			);
		}

		return $checkboxes;
	}

}
