<?php

namespace app\records;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[WishRecord]].
 *
 * @see WishRecord
 */
class WishQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return WishRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return WishRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
