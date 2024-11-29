<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function hasPermission(): Boolean
    {
        return true;
    }
    public function index()
    {
        $user = auth()->user();

        // Retrieve all clubs and eager load the 'members' relationship
        $clubs = Club::with('members')->get();

        // If the user is authenticated, eager load the 'memberships' relationship
        if ($user) {
            $user->load('memberships');
            $userClubMemberships = $user->memberships->pluck('id')->toArray(); // Get IDs of user's memberships
        } else {
            $userClubMemberships = [];
        }

        return view('club.index', [
            'clubs' => $clubs,
            'userClubMemberships' => $userClubMemberships,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('club.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'description' => ['required', 'string' , 'min:10'],
            'owner_id' => ['required', 'numeric'],
        ]);
        $club = Club::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'owner_id' => auth()->user()->id,
            'number_of_members'=>1,
        ]);
        return redirect()->route('clubs.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $club = Club::findOrFail($id); // Fetch the specific club
        return view('club.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return view('club.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'description' => ['required', 'string' , 'min:10'],
            'owner_id' => ['required', 'numeric'],
            #'categories' => ['nullable', 'array'],
            #'image' => ['nullable', 'file', 'image', 'max:4096'],
        ]);
        $club = Club::find($club->id);
//        dd($club);
        $club->update([
            'name' => $request->name,
            'description' => $request->description,
            'owner_id' => $request->owner_id,
        ]);

        #club->categories()->sync($request->categories);

//        if($request->has('image')) {
//            $article->media->first()?->delete();
//            $article->addMediaFromRequest('image')->toMediaCollection('images');
//        }

        session()->flash('success', 'Article [<span >'.$club->name.'</span>] updated successfully');

        return redirect()->route('clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $club = Club::find($id);
//        dd($club);
        $club->delete();
        return redirect()->route('clubs.index');
    }
    public function join(Request $request, $clubId)
    {
        $user = auth()->user();

        if ($user && !$user->memberships()->where('club_id', $clubId)->exists()) {
            $user->memberships()->attach($clubId);

            // Optionally increment the number of members
            $club = Club::findOrFail($clubId);
            $club->number_of_members += 1;
            $club->save();

            return redirect()->route("clubs.index")->with('success', 'You have successfully joined the club.');
        }else if (!$user){
            return view('auth.register');
        }
        return redirect()->back()->with('error', 'You are already a member of this club.');
    }
    public function myClubs(){
        $user = auth()->user();
        if ($user != null) {
            $clubs = $user->load('memberships')->memberships;
            if (!$clubs->isEmpty()) {
                $userClubMemberships = auth()->user()?->memberships->pluck('id')->toArray() ?? [];
                return view('club.index', [
                    'clubs' => $clubs,
                    'userClubMemberships' => $userClubMemberships,
                ]);
            } else {
                return view('club.index', ['clubs' => []]); // Handle no events case
            }
        }
        return view('auth.register');
    }

}
