<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use App\Models\Locale;

class LocaleComposer {

	protected $_locales;

	public function __construct()
	{
		if (is_null($this->_locales)) {

			$this->_locales = Locale::where('status', 2)->get();
		}
	}

	public function compose(View $view)
	{
		$view->with('locales', $this->_locales);	
	}
}