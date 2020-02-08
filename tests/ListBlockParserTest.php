<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\ListBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class ListBlockParserTest extends TestCase {

	protected $empty = ['type' => 'list', 'data' => ['style' => 'unordered', 'items' => []]];
	protected $items = ['type' => 'list', 'data' => ['style' => 'unordered', 'items' => ['Lorem', 'Ipsum', 'Dolor']]];

	public function testEmptyListRenderer(): void {
		$parser = new EditorJsRenderer([$this->empty]);
		$parser->default = new ListBlock();

		$this->assertSame('<ul></ul>', $parser->render());
	}

	public function testItemListRenderer(): void {
		$parser = new EditorJsRenderer();
		$parser->map('list', new ListBlock());

		$parser->insert($this->items);

		$this->assertSame('<ul><li>Lorem</li><li>Ipsum</li><li>Dolor</li></ul>', $parser->render());
	}

}
