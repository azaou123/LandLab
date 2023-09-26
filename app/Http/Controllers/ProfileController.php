<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\bat;
use App\Models\operation;
use App\Models\ordres_arret;

class ProfileController extends Controller
{
    public function dashboard(){
        $bats = bat::all();
        return view('dashboard',compact('bats'));
    }

    public function imprimer(){
        return view('imprimer');
    }

    public function envoyer(Request $request){
        $operation = Operation::create([
            'id_user' => $request->input('id_user'),
            'id_bat' => $request->input('indexBase'),
            'nomMarche' => $request->input('nomMarche'),
            'numMarche' => $request->input('numMarche'),
            'lo' => $request->input('lo'),
            'DS' => $request->input('ds'),
            'DO' => $request->input('dateOuverture'),
            'ntj' => $request->input('inputNTJ'),
            'trs' => $request->input('trs'),
            'mds' => $request->input('mds'),
            'mtrp' => $request->input('mtrp'),
            'mtva' => $request->input('mtva'),
            'mtrp-ttc' => $request->input('mtrp-ttc'),
        ]);
        $listreferences = explode("|", $request->listreferences);
        for ($i=0;$i<count($listreferences);$i++){
            $deuxdates = explode("/",$listreferences[$i]);
            ordres_arret::create([
                'id_operation' => $operation->id,
                'OA' => $deuxdates[0],
                'OR' => $deuxdates[1],
            ]);
        }
        return back()->with('success', 'Operation created successfully.');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
