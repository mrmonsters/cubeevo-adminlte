<?php namespace App\Http\ViewComposers;

use App\Models\Status;
use Illuminate\Contracts\View\View;

use App\Models\Files;

class FilesComposer {

	protected $_files;
	protected $_collection = null;

	protected function _getAllActiveFiles()
	{
		if (!$this->_collection) {

			$this->_collection = $this->_files
				->where('delete', '=', 0)
				->where('status', '=', Status::ACTIVE)
				->get()
				->sortBy('created_at');
		}

		return $this->_collection;
	}

	public function __construct(Files $files)
	{
		$this->_files = $files;
	}

	public function compose(View $view)
	{
		$collection = $this->_getAllActiveFiles();
		$files      = array_map(function ($item) {

			return [
				'id'   => $item['id'],
				'name' => $item['name'],
				'dir'  => $item['dir'],
			];
		}, $collection->toArray());

		return $view->with(compact('files'));
	}

}