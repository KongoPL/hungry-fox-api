<?php

namespace app\components;


class ActiveRecord extends \yii\db\ActiveRecord
{
	const STATUS_DELETED = 0;
	const STATUS_OK = 1;
}
