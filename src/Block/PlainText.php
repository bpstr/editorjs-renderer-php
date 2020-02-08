<?php

namespace Bpstr\EditorJs\Block;

class PlainText extends BlockBase {

	public function render() {
		return json_encode(get_object_vars($this));
	}

}
