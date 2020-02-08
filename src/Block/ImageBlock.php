<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Image;

class ImageBlock extends BlockBase {

	protected $file = [];

	protected $caption;

	protected $withBorder = true;
	protected $stretched = false;
	protected $withBackground = false;

	public function render() {
		if (empty($this->file['url'])) {
			return '';
		}

		$img = Image::build($this->file['url'], $this->caption);

		if ($this->stretched) {
			$img->attr('width', '100%');
		}

		if ($this->withBorder) {
			$img->style('border', '2px solid black');
		}

		if ($this->withBackground) {
			$img->style('background-color', 'white');
		}

		return $img;
	}

}
