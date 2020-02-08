<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\ChecklistBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class ChecklistBlockParserTest extends TestCase {

	protected $block = [
		'type' => 'checklist',
		'data' => [
			'items' => [
				['text' => 'Lorem', 'checked' => true],
				['text' => 'Ipsum', 'checked' => false],
				['text' => 'Dolor'],
				[],
			]
		]
	];

	public function testImageRenderer(): void {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->map('checklist', new ChecklistBlock());

		$this->assertSame('<form><input type="checkbox" name="checkboxes" value="Lorem" checked="checked" /><label>Lorem</label><input type="checkbox" name="checkboxes" value="Ipsum" checked="" /><label>Ipsum</label><input type="checkbox" name="checkboxes" value="Dolor" checked="" /><label>Dolor</label></form>', $parser->render());
	}

}
