<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Heading;

class WarningBlock extends BlockBase {

	protected $title;
	protected $message;

	public function render() {
		$warn = Element::createWithClass('div', 'alert');
		$warn->placeContent('title', Heading::build(5, $this->title));
		$warn->placeContent('message', Element::create('p', $this->message));

		return $warn;
	}

}
