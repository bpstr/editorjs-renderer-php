<?php

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\EditorJsRenderer;

require_once '../../vendor/autoload.php';

$blocks = [
	['type' => 'header', 'data' => ['text' => 'Dolor sit amet.']],
	['type' => 'paragraph', 'data' => ['text' => 'Lorem ipsum']]
];

$renderer = EditorJsRenderer::withMapping($blocks);

$renderer = new EditorJsRenderer($blocks);

$renderer->map('header', new HeaderBlock());
$renderer->map('paragraph', new ParagraphBlock());

$renderer->default = new PlainText();

$renderer->insert(['type' => 'header', 'data' => ['text' => 'This __ rocks!']]);

echo $renderer->render();

echo $renderer;
