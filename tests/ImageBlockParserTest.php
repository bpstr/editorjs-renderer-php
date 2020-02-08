<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ImageBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class ImageBlockParserTest extends TestCase {

	protected $block = [
		'type' => 'image',
		'data' => [
			'file' => ['url' => 'img.jpg'],
			'caption' => 'Lipsum',
			'withBorder' => true,
			'stretched' => true,
			'withBackground' => true,
		]
	];

	public function testImageRenderer(): void {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->default = new ImageBlock();

		$this->assertSame('<img src="img.jpg" alt="Lipsum" width="100%" style="border: 2px solid black; background-color: white;" />', $parser->render());
	}

}
