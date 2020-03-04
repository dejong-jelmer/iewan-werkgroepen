<?php
namespace App\Http\Boxes;
use App\File;
use Illuminate\Support\Facades\Storage;

class FilesOverview extends Boxes
{
    public function fileTypes()
    {
        return config('file.types');
    }
    public function files()
    {
       $files = File::get();
       return $files;
    }
}
