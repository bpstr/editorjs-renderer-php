<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\CodeBlock;
use Bpstr\EditorJs\Block\DelimiterBlock;
use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class MixedBlockParserTest extends TestCase {

	private $header = ['type' => 'header', 'data' => ['text' => 'Lorem ipsum', 'level' => 2]];
	private $paragraph = ['type' => 'paragraph', 'data' => ['text' => 'Lorem ipsum <span>dolorem</span>']];
	private $delimiter = ['type' => 'delimiter', 'data' => []];
	private $code = ['type' => 'code', 'data' => ['code' => '<?php']];

	public function testBlockMapping(): void {
		$parser = new EditorJsRenderer();
		$parser->map('header', new HeaderBlock());
		$parser->map('paragraph', new ParagraphBlock());
		$parser->map('delimiter', new DelimiterBlock());
		$parser->map('code', new CodeBlock());

		$parser->insert($this->header);
		$parser->insert($this->paragraph);
		$parser->insert($this->delimiter);
		$parser->insert($this->code);

		$this->assertSame('<h2>Lorem ipsum</h2><p>Lorem ipsum <span>dolorem</span></p><hr /><pre><?php</pre>', $parser->render());
	}
}
