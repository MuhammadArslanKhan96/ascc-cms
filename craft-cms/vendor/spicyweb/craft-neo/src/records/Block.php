<?php

namespace benf\neo\records;

use craft\db\ActiveRecord;
use yii\db\ActiveQueryInterface;

/**
 * Class Block
 *
 * @package benf\neo\records
 * @author Spicy Web <plugins@spicyweb.com.au>
 * @author Benjamin Fleming
 * @since 2.0.0
 */
class Block extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%neoblocks}}';
    }

    /**
     * Returns the block's element.
     *
     * @return ActiveQueryInterface
     */
    public function getElement(): ActiveQueryInterface
    {
        return $this->hasOne(Element::class, ['id' => 'id']);
    }

    /**
     * Returns the block's primary owner.
     *
     * @return ActiveQueryInterface
     */
    public function getPrimaryOwner(): ActiveQueryInterface
    {
        return $this->hasOne(Element::class, ['id' => 'primaryOwnerId']);
    }

    /**
     * Returns the block's field.
     *
     * @return ActiveQueryInterface
     */
    public function getField(): ActiveQueryInterface
    {
        return $this->hasOne(Element::class, ['id' => 'fieldId']);
    }

    /**
     * Returns the block's type.
     *
     * @return ActiveQueryInterface
     */
    public function getType(): ActiveQueryInterface
    {
        return $this->hasOne(Element::class, ['id' => 'typeId']);
    }
}
