<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class HeaderBlockParserTest extends TestCase {

	protected $block = ['type' => 'header', 'data' => ['text' => 'Lorem ipsum']];
	protected $another_block = ['type' => 'header', 'data' => ['text' => 'Lorem ipsum', 'level' => 2]];

	public function testHeaderBlock(): void {
		$parser = new EditorJsRenderer([$this->block, $this->another_block]);
		$parser->map('header', new HeaderBlock());

		$this->assertSame('<h1>Lorem ipsum</h1><h2>Lorem ipsum</h2>', $parser->render());
	}

}
