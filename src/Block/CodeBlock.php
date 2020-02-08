<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;

class CodeBlock extends BlockBase {

	protected $code;

	public function render() {
		return Element::create('pre', $this->code);
	}

}
