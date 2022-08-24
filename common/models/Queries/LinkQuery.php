<?php

namespace common\models\Queries;

use common\models\ActiveRecords\Link;

/**
 * This is the ActiveQuery class for [[\app\models\Link]].
 *
 * @see Link
 */
class LinkQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Link[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Link|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function byCode(string $code)
    {
        return $this->andWhere(['short_code' => $code]);
    }
}
