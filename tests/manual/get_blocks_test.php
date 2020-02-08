<?php

use Bpstr\EditorJs\Block\HeaderBlock;
use Bpstr\EditorJs\Block\ParagraphBlock;
use Bpstr\EditorJs\EditorJsRenderer;
use EditorJS\EditorJS;

require_once '../../vendor/autoload.php';

$json = <<<json
{
    "time" : 1550476186479,
    "blocks" : [
        {
            "type" : "paragraph",
            "data" : {
                "text" : "The example of text that was written in <b>one of popular</b> text editors."
            }
        },
        {
            "type" : "header",
            "data" : {
                "text" : "With the header of course",
                "level" : 2
            }
        },
        {
            "type" : "paragraph",
            "data" : {
                "text" : "So what do we have?"
            }
        }
    ],
    "version" : "2.8.1"
}
json;

$conf = <<<json
{
  "tools": {
    "header": {
      "text": {
        "type": "string",
        "allowedTags": ""
      },
      "level": {
        "type": "int",
        "canBeOnly": [2, 3, 4]
      }
    },
    "paragraph": {
      "text": {
        "type": "string",
        "allowedTags": "i,b,u,a[href]"
      }
    }
}
}
json;

try {
	$editorJS = new EditorJS($json, $conf);
	$parser = EditorJsRenderer::withBlocks($editorJS->getBlocks());
	echo $parser->render();
}
catch (\Exception $exception) {
	echo $exception->getMessage();
}

