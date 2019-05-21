<?php

namespace App\Http\Controllers;

use App\BinderForm;
use Illuminate\Http\Request;

class BinderController extends Controller
{
    public function showBinderForm($binderform_id)
    {
        dd('klapperrrr van de week');
    }

    public function showBinderForms()
    {
        $binderForms = BinderForm::get();
        dd($binderForms);
    }
}
