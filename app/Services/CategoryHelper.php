<?php namespace App\Services;

use App\Models\Locale;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Entity;
use App\Models\EntityInstance;
use App\Services\GeneralHelper;

class CategoryHelper extends GeneralHelper
{
	public function getCategoryProject($categoryId, $codes)
	{
		$entities = array();
		$collection = EntityInstance::find($categoryId)->instanceChildren()->get();

		foreach ($collection as $item)
		{
			$entity = array();
			$instance = EntityInstance::find($item->child_id);

			$entity['id']         = $instance->id;
			$entity['status']     = $instance->status;
			$entity['created_at'] = $instance->created_at;
			$entity['updated_at'] = $instance->updated_at;

			foreach ($codes as $code)
			{
				$entity[$code] = $this->getAttribute($code, $instance);
			}

			$entities[] = $entity;
		}

		if (!empty($entities) && isset($entities[0]['sort_order']))
		{
			uasort($entities, array($this, 'cmp'));
		}

		return $entities;
	}

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