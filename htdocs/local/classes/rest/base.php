<?php

namespace Ms\Rest;

abstract class Base {

	/** @var array|null параметры вызова */
	protected $params;

	/** @var mixed id сущности */
	protected $id;

	/** @var array|null массив данных вызова */
	protected $data;

	function __construct($id, $data, $params)
	{
		$this->id = $id;
		$this->params = $params;
		$this->data = $data;
	}

	/**
	 * проверка прав на выполнение метода
	 * @param string $method
	 * @return boolean
	 */
	public function checkRights($method)
	{
		switch (strtolower($method)) {
			default:
				return true;
		}
	}

	public function checkDataStructure($method)
	{
		return $this->checkDataStructureRecursive($this->data, $this->getDataStructure($method));
	}

	protected function checkDataStructureRecursive($arData, $arStructure)
	{
		if (gettype($arData) !== gettype($arStructure)) {
			return false;
		} elseif (is_array($arData)) {
			return $this->isAssocArray($arData) ? $this->checkStructureAssocArray($arData, $arStructure) : $this->checkStructureNumericArray($arData,
					$arStructure);
		} else {
			return true;
		}
	}

	protected static function isAssocArray($array)
	{
		$keys = array_keys($array);

		return array_keys($keys) !== $keys;
	}

	protected function checkStructureAssocArray($arData, $arStructure)
	{
		if (empty(array_diff_key($arData, $arStructure)) && empty(array_diff_key($arStructure, $arData))) {
			foreach ($arData as $key => $value) {
				if (!$this->checkDataStructureRecursive($value, $arStructure[$key])) {
					return false;
				}
			}

			return true;
		} else {
			return false;
		}
	}

	protected function checkStructureNumericArray($arData, $arStructure)
	{
		foreach ($arData as $value) {
			if (!$this->checkDataStructureRecursive($value, $arStructure['0'])) {
				return false;
			}
		}

		return true;
	}

	/**
	 * описание структуры данных, передаваемых в метод
	 * @param string $method
	 * @return mixed
	 */
	protected function getDataStructure($method)
	{
		switch (strtolower($method)) {
			default:
				return null;
		}
	}

}
