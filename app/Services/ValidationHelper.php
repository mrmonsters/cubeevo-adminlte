<?php namespace App\Services;

use Validator;

class ValidationHelper 
{
	public function validateRequired($fields, $data)
	{
		if (is_array($fields) && !empty($fields))
		{
			$rules = array();

			foreach ($fields as $field)
			{
				$rules[$field] = 'required';
			}

			$validator = Validator::make($data, $rules);

			if ($validator->fails())
			{
				$messages = array();
				foreach (json_decode($validator->messages()) as $key => $val)
				{
					$messages[] = $key." - ".implode(" | ", $val);
				}
				$msg = implode(",", $messages);

				return $msg;
			}
		}
	}
}