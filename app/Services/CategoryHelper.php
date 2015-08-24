<?php namespace App\Services;

use App\Models\Locale;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Entity;
use App\Models\EntityInstance;

class CategoryHelper
{
	public function saveNewCategory($data)
	{
		if (is_array($data) && !empty($data))
		{
			$entity   = Entity::where('code', '=', 'category')->first();
			$category = new EntityInstance;
			
			// Save new category instance
			$category->entity_id = $entity->id;
			$category->status    = '2';
			$category->save();

			// Save category attributes
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
							$attrValue->entity_instance_id = $category->id;
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
						$attrValue->entity_instance_id = $category->id;
						$attrValue->value              = $value;
						$attrValue->status             = '2';
						$attrValue->save();
					}
				}
			}

			return $category;
		}

		return false;
	}
}