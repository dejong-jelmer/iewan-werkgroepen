<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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
        if(Auth::user()->hasAppliedForWorkgroup($workgroup->id)) {
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

    public function acceptUserApplication(Request $request)
    {
        $workgroup = Workgroup::find($request->get('workgroup_id'));
        $user = User::find($request->get('user_id'));
        // Check if authenticated user is member of the workgroup
        if(!Auth::user()->inWorkgroup($workgroup->id)) {
            return redirect()->back();
        }
        // check if the user has applied of has already been accepted
        if(!$workgroup->isApplicant($user->id)) {
            return redirect()->back();
        }
        // update: set active for user to true
        $user->workgroups()->newPivotStatementForId($workgroup->id)->update(['active' => true]);
        // now user is an active workgroup member, so let's go back
      //  return redirect()->back();
		return redirect()->route('workgroup', ['workgroup_id' => $workgroup->name])->with('success', "Je hebt $user->name aan de werkgroep " . ucwords($workgroup->name) . " toegevoegd.");

    }

    public function declineUserApplication(Request $request)
    {
        $workgroup = Workgroup::find($request->get('workgroup_id'));
        $user = User::find($request->get('user_id'));
        // Check if authenticated user is member of the workgroup
        if(!Auth::user()->inWorkgroup($workgroup->id)) {
            return redirect()->back();
        }
        // check if the user has applied of has already been accepted
        if(!$workgroup->isApplicant($user->id)) {
            return redirect()->back();
        }
        // update: remove user relation to workgroup
        $user->workgroups()->detach($workgroup->id);
        // now user application is removed, so let's go back
   //     return redirect()->back();
		return redirect()->route('workgroup', ['workgroup_id' => $workgroup->name])->with('error', "Je hebt de aanmelding van $user->name voor de werkgroep " . ucwords($workgroup->name) . " gewijgerd.");
    }
}
