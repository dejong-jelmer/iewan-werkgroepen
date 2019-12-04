<?php
namespace App\Http\Boxes;

class UploadFile extends Boxes
{
    public function fileTypes()
    {
        return config('file.types');
    }
}
