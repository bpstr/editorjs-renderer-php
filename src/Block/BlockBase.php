<?php

namespace Bpstr\EditorJs\Block;

abstract class BlockBase implements BlockInterface {

	abstract public function render();

	public function 	__invoke(array $raw) {
		foreach ($raw as $key => $item) {
			$this->$key = $item;
		}
		return $this;
	}

	public function __toString() {
		return (string) $this->render();
	}

}
