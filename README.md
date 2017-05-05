Breadcrumbs navigation
======

Requirements
------------

Package requires PHP 5.6 or higher

- [nette/component-model](https://github.com/nette/component-model)
- [nette/application](https://github.com/nette/application)

Installation
------------

The best way to install XRuff/Navigation is using  [Composer](http://getcomposer.org/):

```sh
$ composer require xruff/navigation
```

or add package to composer.json file

```json
{
    "require": {
        "xruff/navigation": "dev-master"
    }
}

```


Documentation
------------

Register configuration in config.neon.

Config has two optional parameters - `breadcrumbsTemplate` and `menuTemplate`.

```yml
extensions:
    navigation: XRuff\Components\Navigation\DI\NavigationExtension

# and optional settings for custom templates
navigation:
	breadcrumbsTemplate: %appDir%/components/breadcrumbs.latte

```

Base presenter:

```php
use Nette;
use XRuff\Components\Navigation\Navigation;

abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	protected function createComponentNavigation($name) {
		$nav = new Navigation($this, $name);
		$nav->setupHomepage('Homepage', $this->link('Homepage:'));
		return $nav;
	}
}
```

Another presenter:

```php
use XRuff\Components\Navigation\Navigation;

class SomePresenter extends BasePresenter
{
	/** @var XRuff\Components\Navigation\Navigation $nav */
	private $nav;

	protected function startup()
	{
		parent::startup();
		$this->nav = $this['navigation']->add('Company name', $this->link('Company:'));
	}

	public function renderDefault()
	{
		$this->nav = $this->nav->add('Overview', false);
		$this->nav->setCurrent(true);
	}

	public function renderDepartment()
	{
		$this->nav = $this->nav->add('Department name', false);
		$this->nav->setCurrent(true);
	}

	public function renderOther()
	{

		$sec = $this->nav->add('Section', $this->link('Category:', ['id' => 1]));
		$article = $sec->add('Article', $this->link('Article:', ['id' => 1]));
		$this->nav->setCurrentNode($article);
		// or $article->setCurrent(TRUE);
	}
}
```

template.latte (breadcrumbs template is compatible with [http://getbootstrap.com/components/#breadcrumbs](Bootstrap 3)):

```smarty
    ...
</head>
<body>
    {control navigation:breadcrumbs}
    ...
```

-----

Repository [https://github.com/XRuff/Navigation](https://github.com/XRuff/Navigation).