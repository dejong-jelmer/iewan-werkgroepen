<?php
namespace App\Http\Boxes;

use App\BinderForm;

class Applications extends Boxes
{
    public function applications()
    {
        return BinderForm::where('released', false)->paginate(2);
    }
}
