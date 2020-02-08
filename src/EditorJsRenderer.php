<?php

namespace Bpstr\EditorJs;

use Bpstr\EditorJs\Block\BlockInterface;
use Bpstr\EditorJs\Block\CodeBlock;
use Bpstr\EditorJs\Block\DelimiterBlock;
use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ImageBlock;
use Bpstr\EditorJs\Block\SimpleLinkBlock;
use Bpstr\EditorJs\Block\ListBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\QuoteBlock;
use Bpstr\EditorJs\Block\RawHtmlBlock;
use Bpstr\EditorJs\Block\TableBlock;
use Bpstr\EditorJs\Block\WarningBlock;
use Bpstr\Elements\Base\Renderable;
use InvalidArgumentException;


/**
 * Class EditorJsRenderer.
 *
 * @package Bpstr\EditorJs
 */
class EditorJsRenderer implements Renderable {
	public static $default_mapping = [
		'header' => HeaderBlock::class,
		'image' => ImageBlock::class,
		'paragraph' => ParagraphBlock::class,
		'quote' => QuoteBlock::class,
		'code' => CodeBlock::class,
		'link' => SimpleLinkBlock::class,
		'list' => ListBlock::class,
		'delimiter' => DelimiterBlock::class,
		'raw' => RawHtmlBlock::class,
		'warning' => WarningBlock::class,
		'table' => TableBlock::class,
	];

	protected $mapping = [];

	protected $blocks = [];

	public $default;

	public static function withBlocks(array $blocks, array $map = NULL) {
		return static::withMapping(($map ?? self::$default_mapping), $blocks);
	}

	public static function withMapping(array $map = NULL, array $blocks = []) {
		$instance = new static($blocks);
		if ($map === NULL) {
			$map = self::$default_mapping;
		}

		foreach ($map as $key => $item) {
			if (class_exists($item)) {
				$item = new $item;
			}

			if ($item instanceof BlockInterface) {
				$instance->map($key, $item);
				continue;
			}

			throw new InvalidArgumentException("'$item' is not a BlockInterface");
		}

		return $instance;
	}

	public function __construct(array $blocks = []) {
		foreach ($blocks as $block) {
			$this->insert($block);
		}
	}

	public function insert(array $raw) {
		$this->blocks[] = $raw;
		return $this;
	}

	public function map(string $key, BlockInterface $block) {
		if ($this->default === NULL) {
			$this->default = $block;
		}
		$this->mapping[$key] = $block;
		return $this;
	}

	public function render() {
		$render = array();
		foreach ($this->blocks as $raw) {
			$block = clone ($this->mapping[$raw['type']] ?? $this->default);
			$render[] = $block($raw['data']);
		}

		return implode($render);
	}

	public function __toString() {
		return $this->render();
	}

}
