<?php

namespace Bpstr\EditorJs\Block;

use Bpstr\Elements\Html\Anchor;
use Bpstr\Elements\Html\Element;
use Bpstr\Elements\Html\Heading;
use Bpstr\Elements\Html\Image;

class BookmarkLinkBlock extends BlockBase {

	protected $link;

	protected $meta;

	protected $title;

	protected $site_name;

	protected $description;

	protected $image = [];

	public function __invoke(array $raw) {
		foreach ($raw as $key => $item) {
			if (is_array($item)) {
				foreach ($item as $flat_key => $sub) {
					$this->$flat_key = $sub;
				}
			}

			$this->$key = $item;
		}

		return $this;
	}


	public function render() {
		$bookmark = new Anchor($this->link);

		if (isset($this->image['url'])) {
			$bookmark->placeContent('img', Image::build($this->image['url'], $this->title));
		}

		if ($this->title) {
			$bookmark->placeContent('title', Heading::build(6, $this->title));
		}

		if ($this->description) {
			$bookmark->placeContent('desc', Element::create('span', $this->description));
		}

		if ($this->site_name) {
			$bookmark->placeContent('site', Element::create('small', $this->site_name));
		}

		return $bookmark;
	}

}
