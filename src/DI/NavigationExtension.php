<?php

namespace XRuff\Components\Navigation\DI;

use Nette;
use Nette\Utils\Validators;

class NavigationExtension extends Nette\DI\CompilerExtension
{
	/** @var array $defaults */
	private static $defaults = [
		'breadcrumbsTemplate' => null,
		'menuTemplate' => null,
	];

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig(self::$defaults);

		if ($config['breadcrumbsTemplate']) {
			Validators::assert($config['breadcrumbsTemplate'], 'string', 'breadcrumbsTemplate');
		}
		if ($config['menuTemplate']) {
			Validators::assert($config['menuTemplate'], 'string', 'menuTemplate');
		}

		$configuration = $builder->addDefinition($this->prefix('Navigation'))
			->setClass('XRuff\Components\Navigation\Navigation')
			->addSetup('setBreadcrumbsTemplate', [$config['breadcrumbsTemplate']])
			->addSetup('setMenuTemplate', [$config['menuTemplate']]);
	}

	/**
	 * @param Nette\Configurator $configurator
	 */
	public static function register(Nette\Configurator $configurator)
	{
		$configurator->onCompile[] = function ($config, Nette\DI\Compiler $compiler) {
			$compiler->addExtension('navigation', new NavigationExtension());
		};
	}
}
