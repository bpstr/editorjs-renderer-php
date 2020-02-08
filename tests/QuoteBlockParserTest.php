<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ImageBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\Block\QuoteBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class QuoteBlockParserTest extends TestCase {

	protected $block = [
		'type' => 'quote',
		'data' => [
			'text' => 'This __ Rocks!',
			'caption' => 'Lipsum',
			'alignment' => 'center',
		]
	];

	public function testImageRenderer(): void {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->default = new QuoteBlock();

		$this->assertSame('<blockquote style="text-align: center;"><p>This __ Rocks!</p><cite>Lipsum</cite></blockquote>', $parser->render());
	}

}
