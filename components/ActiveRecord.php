<?php

namespace app\components;


class ActiveRecord extends \yii\db\ActiveRecord
{
	const STATUS_DELETED = 0;
	const STATUS_OK = 1;


	public function __get($name)
	{
		if($this->hasAttribute('id') && strpos($name, 'localized') === 0)
			return $this->getLocalized(lcfirst(substr($name, 9)));

		return parent::__get($name);
	}


	public function getLocalized($attribute)
	{
		return \app\models\Translation::translate($this->tableName(), $attribute, $this->getAttribute('id'), $this->getAttribute($attribute));
	}
}
