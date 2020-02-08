<?php

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\Block\PlainText;
use Bpstr\EditorJs\EditorJsRenderer;

require_once '../../vendor/autoload.php';

$blocks = [
	['type' => 'heading', 'data' => ['text' => 'Dolor sit amet.']],
	['type' => 'paragraph', 'data' => ['text' => 'Lorem ipsum']]
];

$parser = new EditorJsRenderer($blocks);

$parser->map('heading', new HeaderBlock());
$parser->map('paragraph', new ParagraphBlock());

$parser->default = new PlainText();

$parser->insert(['type' => 'heading', 'data' => ['text' => 'This __ rocks!']]);

echo $parser->render();

echo $parser;
