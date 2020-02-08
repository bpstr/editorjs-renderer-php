<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ImageBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\Block\QuoteBlock;
use Bpstr\EditorJs\Block\WarningBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class WarningBlockParserTest extends TestCase {

	protected $block = [
		'type' => 'warning',
		'data' => [
			'title' => 'Warning',
			'message' => 'Lipsum dolorium!',
		]
	];

	public function testImageRenderer(): void {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->map('warning', new WarningBlock());

		$this->assertSame('<div class="alert"><h5>Warning</h5><p>Lipsum dolorium!</p></div>', $parser->render());
	}

}
