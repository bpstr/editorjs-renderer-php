# editorjs-renderer-php

An extendable PHP renderer for the [Editor.js](https://editorjs.io/) which works well with the [Editor.js PHP backend](https://github.com/editor-js/editorjs-php).

# Getting Started

## Installation

Install the package using Composer:
```
composer require bpstr/editorjs-renderer-php:dev-master
```

## Basic usage

```php
use Bpstr\EditorJs\EditorJsRenderer;
$renderer = EditorJsRenderer::withBlocks($blocks);
```

The EditorJsRenderer class uses two required parameters:
- `mapping`: The block classes (or instances) keyed by the block type
    from the CodeX Editor.
```php
Bpstr\EditorJs\EditorJsRenderer::$default_mapping = [
    'header' => HeaderBlock::class,
    'image' => ImageBlock::class,
    'paragraph' => ParagraphBlock::class,
    'quote' => QuoteBlock::class,
    // ...
];
```
- `blocks`: Array having the same structure as one returned by `EditorJS::getBlocks()`

```php
$blocks = [
    ['type' => 'heading', 'data' => ['text' => 'Dolor sit amet.']],
    ['type' => 'paragraph', 'data' => ['text' => 'Lorem ipsum']]
];
```

*Almost every Editor.Js block plugin already have the matching classes
bundled and tested in the package.*

## Rewrite the mapping

In case you would like to alter the Renderer, you can add or replace the
mapped renderer blocks.

### Providing static mapping

Calling this method will create instances of all the default classes plus
the ones you provide.

```php
$renderer = EditorJsRenderer::withBlocks($blocks, ['code' => ColoredCodeBlock::class]);
```

### Replace mapping

Using this method, no defaults will be added, the passed array will replace the inner mapping.

```php
$renderer = EditorJsRenderer::withMapping(['code' => ColoredCodeBlock::class]);
```

### Mapping on the fly

You can add block instances to the Renderer instance on the fly too.

```php
$renderer->map('header', new \Bpstr\EditorJs\Block\HeaderBlock());
```

# Rendering blocks

To get the HTML markup, just call the `render()` method.

```php
echo $renderer->render();
```
