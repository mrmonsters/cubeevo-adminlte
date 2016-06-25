<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

	public function boot()
	{
		View::composers([
			'App\Http\ViewComposers\LocaleComposer'   => [
				'management.post.create',
				'management.post.edit',
				'management.category.create',
				'management.category.edit',
			],
			'App\Http\ViewComposers\SettingsComposer' => [
				'management.setting.edit',
			],
			'App\Http\ViewComposers\FilesComposer'    => [
				'management.setting.edit',
				'management.category.create',
				'management.category.edit',
				'management.project.create',
				'management.project.edit',
				'management.solution.create',
				'management.solution.edit',
			],
			'App\Http\ViewComposers\HomeComposer'     => [
				'frontend.homepage.index'
			],
		]);
	}

	public function register()
	{

	}

}