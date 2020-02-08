<?php


namespace Bpstr\EditorJs\Block;


use Bpstr\Elements\Base\Renderable;

interface BlockInterface extends Renderable {

	public function __invoke(array $raw);

}
