<?php
/**
 * Created by PhpStorm.
 * User: winarkoandy
 * Date: 11/04/16
 * Time: 17:09
 */

namespace Acme\Transformers;


abstract class Transformer
{
    /**
     * Transform a collection of lessons
     *
     * @param $items
     * @return array
     */
    public function transformCollection($items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}