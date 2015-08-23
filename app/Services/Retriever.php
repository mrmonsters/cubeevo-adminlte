<?php namespace App\Services;

use Session;
use App\Models\Locale;
use App\Models\Entity;
use App\Models\Attribute;

class Retriever
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

	public function getAttribute($code, $item)
	{
		$locale    = Locale::where('code', '=', Session::get('locale'))->first();
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

	public function getCurrentLocaleId()
	{
		$locale = Locale::where('code', '=', Session::get('locale'))->first();

		return $locale->id;
	}

	static function cmp($x, $y)
	{
		return (intval($x['sort_order']) > intval($y['sort_order'])) ? 1 : -1;	
	}

}