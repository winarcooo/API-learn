<?php
/**
 * Created by PhpStorm.
 * User: winarkoandy
 * Date: 11/04/16
 * Time: 17:17
 */

namespace Acme\Transformers;


class LessonTransformer extends Transformer
{

    public function transform($lesson)
    {
        return [
            'title'     => $lesson['title'],
            'body'      => $lesson['body'],
            'active'    => (boolean) $lesson['isactive']
        ];
    }
}