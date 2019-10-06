<?php

namespace App\Http\Controllers;

use Auth;
use App\Workgroup;
use Illuminate\Http\Request;

class WorkgroupController extends Controller
{
    public function showWorkgroup(Request $request, $workgroup)
    {
        $workgroup = Workgroup::where('name', $workgroup)->first();
        if(Auth::user()->inWorkgroup($workgroup->id)) {
            $workgroup->messages;
        }

        return view('workgroup', compact('workgroup'));
    }

    public function joinWorkgroup($workgroup_id)
    {
        $workgroup = Workgroup::find($workgroup_id);
        if(Auth::user()->hasApplied($workgroup->id)) {
            return redirect()->back();
        }
        Auth::user()->workgroups()->attach($workgroup);
        return redirect()->route('workgroup', ['workgroup_id' => $workgroup->name])->with('success', "Je aanmelding voor de werkgroep  $workgroup->name is verstuurd.");
    }

    public function leaveWorkgroup($workgroup_id)
    {
        $workgroup = Workgroup::find($workgroup_id);
        $workgroup->users()->detach(Auth::user());
        // Auth::user()->workgroups()->detach($workgroup);
        return redirect()->route('workgroup', ['workgroup_id' => $workgroup->name])->with('success', "Je hebt $workgroup->name verlaten");
    }

    public function showWorkgroupMembers($workgroup_id)
    {
        $workgroup = Workgroup::with('users')->find($workgroup_id);
        return view('workgroup.users', compact('workgroup'));
    }
}
