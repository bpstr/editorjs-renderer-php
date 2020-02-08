<?php

namespace Bpstr\EditorJs\Block;

class RawHtmlBlock extends BlockBase {

	protected $html;

	public function render() {
		return $this->html;
	}

}
