<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class PlainTextParserTest extends TestCase {

	protected $block = ['type' => 'unknown', 'data' => ['text' => 'Lorem ipsum']];
	protected $another_block = ['type' => 'unknown_another', 'data' => ['text' => 'Lorem ipsum']];

	public function testUnknownRenderer(): void {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->default = new PlainText();

		$this->assertSame('{"text":"Lorem ipsum"}', $parser->render());
	}

	public function testBlockMapping(): void {
		$parser = new EditorJsRenderer();
		$parser->map('unknown', new PlainText());

		$parser->insert($this->block);
		$parser->insert($this->another_block);

		$this->assertSame('{"text":"Lorem ipsum"}{"text":"Lorem ipsum"}', $parser->render());
	}

}
