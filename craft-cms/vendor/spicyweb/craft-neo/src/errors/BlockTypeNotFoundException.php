<?php

namespace benf\neo\errors;

use yii\base\Exception;

/**
 * Class BlockTypeNotFoundException
 *
 * @package benf\neo\errors
 * @author Spicy Web <plugins@spicyweb.com.au>
 * @author Benjamin Fleming
 * @since 2.0.0
 */
class BlockTypeNotFoundException extends Exception
{
    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "Neo block type not found";
    }
}
