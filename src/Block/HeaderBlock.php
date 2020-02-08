<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Heading;

class HeaderBlock extends BlockBase {

	protected $text;

	protected $level = 1;

	public function render() {
		return Heading::build($this->level, $this->text);
	}

}
