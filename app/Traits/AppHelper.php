<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/7/16
 * Time: 5:27 PM
 */

namespace EventApp\Traits;


trait AppHelper
{
    public function decorateWithSpan($state)
    {
        if($state == 'Aprobado'){
            return '<span class="label label-success">'.$state.'</span>';
        }
        return '<span class="label label-warning">'.$state.'</span>';
    }

}