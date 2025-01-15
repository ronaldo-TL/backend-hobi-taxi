<?php
/**
 * Created by PhpStorm.
 * User: juan.llusco
 * Date: 1/3/2024
 * Time: 11:21
 */

namespace App\Http\Resources;

class ConductorCollection extends  BaseResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, ConductorResource::class);
    }
}