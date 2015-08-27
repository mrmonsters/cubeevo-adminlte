<?php namespace App\Services;

use Session;
use App\Models\Locale;
use App\Models\Entity;
use App\Models\Attribute;
use App\Models\AttributeValue;

class GeneralHelper
{
	public function getEntityCollection($entityCode, $attributeCodes)
	{
		$entities = array();
		$collection = Entity::where('code', '=', $entityCode)->first()
			->entityInstances()
			->get();

		foreach ($collection as $item)
		{
			$entity = array();

			$entity['id']         = $item->id;
			$entity['status']     = $item->status;
			$entity['created_at'] = $item->created_at;
			$entity['updated_at'] = $item->updated_at;

			foreach ($attributeCodes as $code)
			{
				$entity[$code] = $this->getAttribute($code, $item);
			}

			$entities[] = $entity;
		}

		if (!empty($entities) && isset($entities[0]['sort_order']))
		{
			uasort($entities, array($this, 'cmp'));
		}

		return $entities;
	}

	public function saveEntity($type, $data)
	{
		if (isset($type) && is_array($data) && !empty($data))
		{
			$entity   = Entity::where('code', '=', $type)->first();
			$instance = new EntityInstance;
			
			// Save new instance
			$instance->entity_id = $entity->id;
			$instance->status    = '2';
			$instance->save();

			// Save attributes
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
							$attrValue->entity_instance_id = $instance->id;
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
						$attrValue->entity_instance_id = $instance->id;
						$attrValue->value              = $value;
						$attrValue->status             = '2';
						$attrValue->save();
					}
				}
			}

			return $instance;
		}
	}

	public function getAttribute($code, $item)
	{
		$locale    = Locale::find($this->getCurrentLocaleId());
		$attribute = Attribute::where('code', '=', $code)->first();
		$value     = $item->attributeValues()
			->where('attribute_id', $attribute->id)
			->first();

		if (isset($value->locale_id))
		{
			$value = $item->attributeValues()
				->where('attribute_id', $attribute->id)
				->where('locale_id', $locale->id)
				->first();
		}
		
		return (isset($value)) ? $value->value : '';
	}

	public function saveAttribute($code, $val, $item, $loc = null)
	{
		$attribute = Attribute::where('code', '=', $code)->first();

		if ($attribute->id)
		{
			if ($loc)
			{
				$locale = Locale::where('code', '=', $loc)->first();

				$value = $item->attributeValues()
					->where('attribute_id', $attribute->id)
					->where('locale_id', $locale->id)
					->first();
			}
			else
			{
				$value = $item->attributeValues()
					->where('attribute_id', $attribute->id)
					->first();
			}
			

			if (!isset($value))
			{
				$value = new AttributeValue;
				$value->attribute_id = $attribute->id;
				$value->entity_instance_id = $item->id;
				$value->status = '2';
			}

			if (isset($locale) && $locale->id)
			{
				$value->locale_id = $locale->id;
			}

			$value->value = $val;
			$value->save();
		}
	}

	public function getCurrentLocaleId()
	{
		if (!Session::get('locale'))
		{
			Session::set('locale', 'cn');
		}

		$locale = Locale::where('code', '=', Session::get('locale'))->first();

		return $locale->id;
	}

	static function cmp($x, $y)
	{
		return (intval($x['sort_order']) > intval($y['sort_order'])) ? 1 : -1;	
	}

}