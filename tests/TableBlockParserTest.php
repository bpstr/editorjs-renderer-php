<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ImageBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\Block\QuoteBlock;
use Bpstr\EditorJs\Block\TableBlock;
use Bpstr\EditorJs\Block\WarningBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class TableBlockParserTest extends TestCase {

	protected $block = [
		'type' => 'quote',
		'data' => [
			'content' => [
				['Kine', '1 pcs', '100$'],
				['Pigs', '3 pcs', '200$'],
				['Chix', '1 pcs', '150$'],
			],
		]
	];

	public function testImageRenderer(): void {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->map('table', new TableBlock());

		$this->assertSame('<table><tbody><tr><td>Kine</td><td>1 pcs</td><td>100$</td></tr><tr><td>Pigs</td><td>3 pcs</td><td>200$</td></tr><tr><td>Chix</td><td>1 pcs</td><td>150$</td></tr></tbody></table>', $parser->render());
	}

}
