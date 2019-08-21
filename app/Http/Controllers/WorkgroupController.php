<?php

namespace App\Http\Controllers;

use Auth;
use App\Workgroup;
use Illuminate\Http\Request;

class WorkgroupController extends Controller
{
    public function showWorkgroup(Request $request, $workgroup_id)
    {
        // dd('Hallo');
        $workgroup = Workgroup::find($workgroup_id);
        if(Auth::user()->inWorkgroup($workgroup->id)) {
            $workgroup->messages;
        }
        return view('workgroup.index', compact('workgroup'));
    }

    public function joinWorkgroup($workgroup_id)
    {
        $workgroup = Workgroup::find($workgroup_id);

        Auth::user()->workgroups()->save($workgroup);
        return redirect()->route('workgroup', ['workgroup_id' => $workgroup->id])->with('success', "Je bent nu lid van $workgroup->name");
    }

    public function leaveWorkgroup($workgroup_id)
    {
        $workgroup = Workgroup::find($workgroup_id);
        $workgroup->users()->detach(Auth::user());
        // Auth::user()->workgroups()->detach($workgroup);
        return redirect()->route('workgroup', ['workgroup_id' => $workgroup->id])->with('success', "Je hebt $workgroup->name verlaten");
    }

    public function showWorkgroupMembers($workgroup_id)
    {
        $workgroup = Workgroup::with('users')->find($workgroup_id);
        return view('workgroup.users', compact('workgroup'));
    }
}
