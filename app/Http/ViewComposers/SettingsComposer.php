<?php namespace App\Http\ViewComposers;

use App\Models\Status;
use Illuminate\Contracts\View\View;

use App\Models\Setting;

class SettingsComposer {

	protected $_setting;
	protected $_collection = null;

	protected function _getAllActiveSettings()
	{
		if (!$this->_collection) {

			$this->_collection = $this->_setting
				->where('delete', '=', 0)
				->where('status', '=', Status::ACTIVE)
				->get()
				->sortBy('type');
		}

		return $this->_collection;
	}

	public function __construct(Setting $setting)
	{
		$this->_setting = $setting;
	}

	public function compose(View $view)
	{
		$settings   = [];
		$collection = $this->_getAllActiveSettings();

		foreach ($collection->toArray() as $item) {

			$settings[$item['code']] = [
				'name'  => $item['name'],
				'value' => $item['value'],
			];

			if ($item['code'] == 'meta_img_id'
				&& ($imgId = $this->_setting->getMetaImage())
				&& $imgId->exists
			) {

				$settings[$item['code']]['img_name'] = $imgId->name;
				$settings[$item['code']]['img_dir']  = $imgId->dir;
			}
		}

		return $view->with(compact('settings'));
	}

}