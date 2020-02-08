<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Anchor;

class SimpleLinkBlock extends BlockBase {

	protected $link;

	protected $meta;

	public function render() {
		$link = new Anchor($this->link);
		$link->appendContent($this->meta['title'] ?? $this->link);

		return $link;
	}

}
