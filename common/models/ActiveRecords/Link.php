<?php

namespace common\models\ActiveRecords;

use Carbon\Carbon;
use common\models\Queries\LinkQuery;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "app__links".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $url
 * @property string|null $short_code
 * @property string $created_at
 */
class Link extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
                'value' => Carbon::now()
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app__links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 1000],
            [['short_code'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'url' => 'Url',
            'short_code' => 'Short Code',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return LinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LinkQuery(get_called_class());
    }
}
