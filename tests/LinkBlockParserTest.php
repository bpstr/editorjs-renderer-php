<?php

declare(strict_types=1);

use Bpstr\EditorJs\Block\BookmarkLinkBlock;
use Bpstr\EditorJs\Block\SimpleLinkBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use PHPUnit\Framework\TestCase;

final class LinkBlockParserTest extends TestCase {

	protected $block = [
		'type' => 'link',
		'data' => [
			'link' => 'https://codex.so',
			'meta' => [
				'title' => 'CodeX',
				'site_name' => 'CodeX.so',
				'description' => 'Lorem ipsum',
				'image' => ['url' => 'link.jpg'],
			],
		]
	];

	public function testSimpleLinkRenderer(): void {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->map('link', new SimpleLinkBlock());

		$this->assertSame('<a href="https://codex.so">CodeX</a>', $parser->render());
	}

	public function testBookmarkLinkRenderer() {
		$parser = new EditorJsRenderer([$this->block]);
		$parser->map('link', new BookmarkLinkBlock());

		$this->assertSame('<a href="https://codex.so"><img src="link.jpg" alt="CodeX" /><h6>CodeX</h6><span>Lorem ipsum</span><small>CodeX.so</small></a>', $parser->render());
	}

}
