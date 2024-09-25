<?php 
namespace app\commands;

use kartik\select2\Select2;

class Filter
{
    public static function select($paramFIlter)
    {
        return [
                'data' => $paramFIlter,
                'options' => ['placeholder' => '', 'multiple' => false, 'required' => false],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'theme' => Select2::THEME_KRAJEE,
                'size' => 'md',
            ];
    }
}