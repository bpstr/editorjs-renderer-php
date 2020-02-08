<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;

class ParagraphBlock extends BlockBase {

	protected $text;

	public function render() {
		return Element::create('p', $this->text);
	}

}
