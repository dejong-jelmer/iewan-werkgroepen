<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use App\User;
use JavaScript;
use Carbon\Carbon;
use App\BinderForm;
use App\Workgroup;
use App\BinderFormField;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BinderController extends Controller
{
    public function showForms()
    {
        $binderForms = Auth::user()->hasWorkgroupRole('aanname') ? BinderForm::get() : BinderForm::where('released', true)->get();
        return view('binder.index', compact('binderForms'));
    }

    public function showForm($form_id)
    {
        $form = BinderForm::find($form_id);
        JavaScript::put([
            'responses' => decrypt($form->response),
            'fields' => $form->fields
        ]);
        Auth::user()->binderForms()->detach($form->id);
        return view('binder.show-form', compact('form'));
    }

    public function showFormOptions()
    {
        $user = Auth::user();
        if(!$user->hasWorkgroupRole('aanname')){
            return redirect()->route('dashboard');
        }

        return view('binder.form-options');
    }

    public function showEditForm()
    {
        $user = Auth::user();
        if(!$user->hasWorkgroupRole('aanname')){
            return redirect()->route('dashboard');
        }
        $binderFormField = BinderFormField::select('fields')->get()->first();
        $fields = json_decode($binderFormField->fields, true);

        return view('binder.edit-form', compact('fields'));
    }

    public function editForm(Request $request)
    {
        $request->validate([
            'name_field.*' => 'required|min:3|max:255',
            'type_field.*' => 'required',
                Rule::in(['text', 'textarea', 'checkbox']),
            'required_field.*' => 'required|boolean'
        ]);
        $field_names = str_replace(' ', '_', $request->name_field);
        $field_types = $request->type_field;
        $field_required = $request->required_field;
        $jsonArray = [];
        for($i=0; $i<count($field_names); $i++) {
            $jsonArray += [$i => ['name' => $field_names[$i], 'type' => $field_types[$i], 'required' => $field_required[$i]]];
        }
        $json = json_encode($jsonArray);
        $binderFormField = BinderFormField::get()->first();
        $binderFormField->fields = $json;
        $binderFormField->save();
        return redirect()->route('workgroup-binder-form')->with('success', 'Formulier is opgeslagen');
    }

    public function showSendForm()
    {
        $user = Auth::user();
        if(!$user->hasWorkgroupRole('aanname')){
            return redirect()->route('dashboard');
        }
        return view('binder.show-send-form');
    }

    public function sendForm(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email'
        ]);
        $user = Auth::user();
        if(!$user->hasWorkgroupRole('aanname')){
            return redirect()->route('dashboard');
        }
        $fields = BinderFormField::first();
        $form = new BinderForm();
        $key = Str::random(32);
        while(BinderForm::where('key', $key)->get()->count()) {
            $key = Str::random(32);
        }
        $form->key = $key;
        $form->name = $request->name;
        $form->fields = (string) $fields->fields;
        $form->expires = Carbon::now()->addMonth();
        $form->save();
        \Mail::to($request->email)->send(new \App\Mail\NewBinderForm($form));
        return redirect()->route('workgroup-binder-form')->with('success', 'Mail verstuurd');
    }

    public function showIntakeForm($key)
    {
        $form = BinderForm::where('key', $key)->first();
        if(empty($form)) {
            abort(404);
        }
        $expires = Carbon::parse($form->expires);
        if($expires->lessThan(Carbon::now())) {
            return redirect()->route('show-form-expired');
        }

        JavaScript::put([
            'fields' => $form->fields
        ]);

        return view('binder.intake-form', compact('form'));
    }
    // @ToDo: een afbeelding toevoegen
    // @ToDo: response encrypten
    public function createNewIntake(Request $request, $key)
    {
        $form = BinderForm::where('key', $key)->first();
        $fields = json_decode($form->fields, true);
        $validationArray = [];
        foreach ($fields as $key => $field) {
            $validationArray[$field['name']] = '';
            $validationArray[$field['name']] .= ($field['type'] == 'checkbox') ? 'boolean|' : '';
            $validationArray[$field['name']] .= ($field['type'] == 'text') ? 'max:255|' : '';
            $validationArray[$field['name']] .= ($field['required'] == 1) ? 'required' : '';
        }
        $validationArray['intake_picture'] = 'image';
        $request->validate($validationArray);
        $response = $request->only(array_keys($validationArray));
        $response = (string) json_encode($response);
        $form->response = encrypt($response);
        $form->filled_in = Carbon::now();
        $form->save();
        $workgroup = Workgroup::getByRole('aanname');
        $workgroup->binderForms()->attach($form->id);
        return redirect()->back()->with('success', 'Bedankt voor je inschrijving, het inschrijfformulier is verstuurd naar Iewan.');
    }

    public function showFormExpired()
    {
        // @ToDo: een pagina maken of een if else in de binder intake form
        dd('formulier is verlopen');
    }
    public function releaseForm($form_id)
    {
        $user = Auth::user();
        if(!$user->hasWorkgroupRole('aanname')){
            return redirect()->route('dashboard');
        }
        $form = BinderForm::find($form_id);
        $form->released = 1;
        $users = User::get();
        $users->each(function($user) use ($form) {
            $user->binderForms()->save($form);
            $user->save();
        });
        $workgroup = Workgroup::getByRole('aanname');
        $workgroup->binderForms()->detach($form->id);
        return redirect()->route('binder-forms')->with('success', 'Klapperformulier is vrijgeven');
    }

}
