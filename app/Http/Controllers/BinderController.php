<?php

namespace App\Http\Controllers;

use App\BinderForm;
use Illuminate\Http\Request;

class BinderController extends Controller
{
    public function showBinderForm($form_id)
    {
        $form = BinderForm::find($form_id);
        return view('binder.show-form', compact('form'));
    }

    public function showBinderForms()
    {
        $binderForms = BinderForm::get();
        return view('binder.index', compact('binderForms'));
    }
}
