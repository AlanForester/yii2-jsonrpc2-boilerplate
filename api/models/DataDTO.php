<?php


namespace app\modules\v1\dto;

use \JsonRpc2\Dto;

class DataDTO extends Dto
{
    /**
     * @var string
     * @notNull
     */
    public $uid;
    /**
     * @var string
     */
    public $name="";
    /**
     * @var string
     */
    public $surname="";
}