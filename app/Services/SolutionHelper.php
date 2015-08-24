<?php namespace App\Services;

use App\Models\Locale;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Entity;
use App\Models\EntityInstance;

class SolutionHelper
{
	public function saveNewSolution($data)
	{
		if (is_array($data) && !empty($data))
		{
			$entity   = Entity::where('code', '=', 'solution')->first();
			$solution = new EntityInstance;
			
			// Save new solution instance
			$solution->entity_id = $entity->id;
			$solution->status    = '2';
			$solution->save();

			// Save solution attributes
			foreach ($data as $code => $value)
			{
				$attribute = Attribute::where('code', '=', $code)->first();

				if (isset($attribute))
				{
					if (is_array($value))
					{
						foreach ($value as $key => $val)
						{
							$attrValue = new AttributeValue;

							$attrValue->attribute_id       = $attribute->id;
							$attrValue->entity_instance_id = $solution->id;
							$attrValue->value              = $val;
							$attrValue->locale_id          = $key; 
							$attrValue->status             = '2';
							$attrValue->save();
						}
					}
					else
					{
						$attrValue = new AttributeValue;
						
						$attrValue->attribute_id       = $attribute->id;
						$attrValue->entity_instance_id = $solution->id;
						$attrValue->value              = $value;
						$attrValue->status             = '2';
						$attrValue->save();
					}
				}
			}

			return $solution;
		}

		return false;
	}
}