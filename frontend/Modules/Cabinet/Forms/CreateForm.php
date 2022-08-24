<?php

namespace frontend\Modules\Cabinet\Forms;

use yii\base\Model;

class CreateForm extends Model
{
    public $url;

    /**
     * @return array[]
     */
    public function rules() : array
    {
        return [
            [['url'], 'required'],
            [['url'], 'string', 'max' => 1000],
            [['url'], 'url'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels() : array
    {
        return [
            'url' => 'Ссылка для сокращения'
        ];
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }
}