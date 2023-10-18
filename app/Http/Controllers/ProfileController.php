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
use App\Models\user;
use App\Models\ordres_arret;
use App\Models\jours_ferrie;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    public function dashboard(){
        $bats = bat::all();
        $users = user::all();
        $operations = operation::all();
        $jours = jours_ferrie::all();
        return view('dashboard',compact('bats','users','operations','jours'));
    }

    public function imprimer($id){
        $operation = Operation::where('id','=',$id)->first();
        $bats = bat::all();
        $arrets = ordres_arret::where('id_operation','=',$id)->get();
        return view('imprimer',compact('operation','bats','arrets'));
    }
    public function supprimer($id){
        $recordToDelete = user::find($id);
        if ($recordToDelete) {
            $recordToDelete->id_role = 4;
            $recordToDelete->save();
            return back()->with('success', 'Supprimé Avec Succès')->with('goto',1);
        } 
        else {
            return back()->with('error', "N'est Pas Trouvé!");
        }
    }
    public function suspendre($id){    
        $recordToDelete = user::find($id);
        if ($recordToDelete) {
            $recordToDelete->id_role = 3;
            $recordToDelete->save();
            return back()->with('success', 'Sunspendu Avec Succès')->with('goto',1);
        } 
        else {
            return back()->with('error', "N'est Pas Trouvé!");
        }
    }
    public function activer($id){    
        $recordToDelete = user::find($id);
        if ($recordToDelete) {
            $recordToDelete->id_role = 2;
            $recordToDelete->save();
            return back()->with('success', 'Activation Avec Succès')->with('goto',1);
        } 
        else {
            return back()->with('error', "N'est Pas Trouvé!");
        }
    }
    public function userProfile($id){
        $user = user::where('id','=',$id)->first();
        $operations = operation::where('id_user','=',$user->id)->get();
        $arrets = array();
        for ($i=0; $i<count($operations); $i++){
            $a = ordres_arret::where('id_operation','=',$operations[$i])->get();
            array_push($arrets,$a);
        }
        return view('profile',compact('user','operations','arrets'));
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
            'DD' => $request->input('dd'),
            'ntj' => $request->input('inputNTJ'),
            'md' => $request->input('md'),
            'mr' => $request->input('mr'),
            'mtva' => $request->input('mtva'),
            'mtrp-ttc' => $request->input('mtrp-ttc'),
        ]);
        if (!empty($request->listreferences)){
           $listreferences = explode("|", $request->listreferences);
            for ($i=0;$i<count($listreferences);$i++){
                $deuxdates = explode("/",$listreferences[$i]);
                ordres_arret::create([
                    'id_operation' => $operation->id,
                    'OA' => $deuxdates[0],
                    'OR' => $deuxdates[1],
                ]);
            } 
        }
        
        return $this->imprimer($operation->id);
    }


    public function addJours(Request $request){
        jours_ferrie::create([
            'label' => $request->label,
            'jour' => $request->jour,
        ]);
        return back()->with('success', 'Ajouté Avec Succès.')->with('goto',3);
    }


    public function deleteJour($id){
        $recordToDelete = jours_ferrie::find($id);
        if ($recordToDelete) {
            $recordToDelete->delete();
            return back()->with('success', 'Supprimé Avec Succès')->with('goto',3);
        } 
        else {
            return back()->with('error', "N'est Pas Trouvé!");
        }
    }

    public function upload(Request $request)
    {
        DB::table('bats')->truncate();
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray(null, true, true, true);
        foreach (array_slice($data, 1) as $row) {
            $b = new bat();
            $b->DO =  $row['B'];
            $b->btp =  $row['C'];
            $b->i0 =  $row['D'];
            $b->save();
        }
        $bats = bat::all();
        if (count($bats)>0){
            return back()->with('success','Opération Effectuée avec succès');
        }
        else {
            return back()->with('fail',"Erreur : Soit table que vous avez inséré est vide ou bien le traitement n'avait pas terminé ! Merci de répéter!");
        }
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
    public function show()
    {
            // Récupérez l'utilisateur connecté
            $utilisateurConnecte = Auth::user();

            // Vérifiez s'il y a un utilisateur connecté
            if ($utilisateurConnecte) {
                // Sélectionnez toutes les lignes de votre table où id_user est égal à l'ID de l'utilisateur connecté
                $data = operation::where('id_user', $utilisateurConnecte->id)->get();

                // Faites quelque chose avec les données, comme les renvoyer à une vue
                return view('dashboard')->with('data', $data);
            } else {
                // Gérez le cas où aucun utilisateur n'est connecté
                // Vous pouvez rediriger vers une page de connexion ou afficher un message d'erreur
                return redirect()->route('login')->with('message', 'Vous devez vous connecter pour accéder à ces données.');
            }
    }
    public function delete($id){
        $data=DB::table('operations')->where('id', $id)->delete();
        return back()->with('goto',2);
    }
    public function modifier(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'rs' => 'string|max:255',
            'rc' => 'string|max:255',
            'ice' => 'string|max:255',
            'ville' => 'string|max:255',
            'fj' => 'string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
    
        // // Récupérez l'utilisateur à mettre à jour en utilisant l'ID
        $user = User::findOrFail($request->id);
    
        // // Mettez à jour les données du profil de l'utilisateur
        $user->name = $request->name;
        $user->email = $validatedData['email'];
        $user->rs = $validatedData['rs'];
        $user->rc = $validatedData['rc'];
        $user->ice = $validatedData['ice'];
        $user->ville = $validatedData['ville'];
        $user->fj = $validatedData['fj'];
    
        // Mettez à jour le mot de passe si fourni
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }
    
        $user->save();
    
        return back()->with('success', 'Profil mis à jour avec succès.')->with('goto',0);
        // echo 'hiiii';
    }
    


    public function logoutPerform()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
