<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class SiteRegisterFormField extends AbstractHandler
{
    protected $codename = 'Site Register Input';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('vendor.voyager.formfields.site_search', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
