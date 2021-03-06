<?php

namespace app\models;

use yii\db\ActiveRecord;

class Usuarios extends ActiveRecord{

    public function rules(){
        return [
            [['user', 'pwd'], 'required'],
            [['user'], 'string', 'max' => 255],
            [['pwd'], 'string', 'max' => 255],
            [['user'], 'unique'],
        ];
    }
}