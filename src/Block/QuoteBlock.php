<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Element;

class QuoteBlock extends BlockBase {

	protected $text;
	protected $caption;
	protected $alignment;

	public function render() {
		$quote = Element::create('blockquote');
		$quote->placeContent('text', Element::create('p', $this->text));
		$quote->placeContent('caption', Element::create('cite', $this->caption));

		if ($this->alignment !== 'left') {
			$quote->style('text-align', $this->alignment);
		}

		return $quote;
	}

}
