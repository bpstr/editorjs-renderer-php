<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;

class DelimiterBlock extends BlockBase {

	public function render() {
		return Element::create('hr');
	}

}
