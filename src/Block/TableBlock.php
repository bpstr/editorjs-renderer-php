<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Heading;
use Bpstr\Elements\Html\Table;

class TableBlock extends BlockBase {

	protected $content = [];

	public function render() {
		return new Table($this->content);
	}

}
