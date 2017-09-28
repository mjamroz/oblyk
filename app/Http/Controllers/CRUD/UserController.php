<?php

namespace App\Http\Controllers\CRUD;

use App\Search;
use App\User;
use App\UserSettings;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    //ENREGISTRE LES PARAMÈTRES DU DASH
    function saveSettings(Request $request){

        $settings = UserSettings::where('user_id', Auth::id())->first();

        $settings->dash_welcome = $request->input('dash_welcome');
        $settings->dash_comments = $request->input('dash_comments');
        $settings->dash_crags = $request->input('dash_crags');
        $settings->dash_friend_cross = $request->input('dash_friend_cross');
        $settings->dash_forum = $request->input('dash_forum');
        $settings->dash_list_crag_sae = $request->input('dash_list_crag_sae');
        $settings->dash_my_cross = $request->input('dash_my_cross');
        $settings->dash_oblyk_news = $request->input('dash_oblyk_news');
        $settings->dash_partenaire = $request->input('dash_partenaire');
        $settings->dash_photos = $request->input('dash_photos');
        $settings->dash_routes = $request->input('dash_routes');
        $settings->dash_sae = $request->input('dash_sae');
        $settings->dash_topos = $request->input('dash_topos');
        $settings->dash_users = $request->input('dash_users');
        $settings->dash_videos = $request->input('dash_videos');
        $settings->dash_random_word = $request->input('dash_random_word');
        $settings->dash_contribution = $request->input('dash_contribution');
        $settings->save();

        return response()->json($settings);
    }

    //ENREGISTRE LES PARAMÈTRES DE CONNEXION
    function saveMailPassword(Request $request){

        $user = User::where('id',Auth::id())->first();

        if($request->input('change_mpd')){

            $this->validate($request, [
                'password_old'=>"required",
                'password_new'=>"required|same:password_confirm|min:8|max:255",
                'password_confirm'=>"required|same:password_new|min:8|max:255",
                'email'=>"required|unique:users,email,$user->id|max:255|email",
            ]);

            $currentPassword = $user->password;
            $newPassword = $request->input('password_new');
            $checkPassword = $request->input('password_old');

            if(Hash::check($checkPassword, $currentPassword)) {
                $user->password = Hash::make($newPassword);
                $user->email = $request->input('email');
                $user->save();
            } else {
                return response()->json(['password_old' => ['Erreur dans l\'ancien mot de passe']], 422);
            }

        }else{

            $this->validate($request, [
                'email'=>"required|unique:users,email,$user->id|max:255|email",
            ]);

            $user->email = $request->input('email');
            $user->save();
        }

        return response()->json($user);
    }


    //ENREGISTRE LES PARAMÈTRES DE LA MESSAGERIE
    function saveUserMessagerieSettings(Request $request){

        $settings = UserSettings::where('user_id', Auth::id())->first();

        $settings->mail_new_conversation = $request->input('mail_new_conversation');
        $settings->mail_new_message = $request->input('mail_new_message');
        $settings->sound_alert = $request->input('sound_alert');
        $settings->save();

        return response()->json($settings);
    }

    //ENREGISTRE LES PARAMÈTRES DE CONFIDENTIALITÉ
    function saveUserConfidentialiteSettings(Request $request){

        $settings = UserSettings::where('user_id', Auth::id())->first();

        $settings->public = $request->input('public');
        $settings->save();

        return response()->json($settings);
    }


    //UPLOAD DU BANDEAU
    function uploadBandeau(Request $request){
        $user_id = Auth::id();

        $this->validate($request, [
            'bandeau' => 'required|image:jpeg,jpg,png|file|max:10240',
        ]);

        if ($request->hasFile('bandeau')) {

            //Image en 1300px de large
            Image::make($request->file('bandeau'))
                ->orientate()
                ->resize(1300, null, function ($constraint) {$constraint->aspectRatio();})
                ->encode('jpg', 85)
                ->save(storage_path('app/public/users/1300/bandeau-' . $user_id . '.jpg'));

            //Image en 500px de large
            Image::make($request->file('bandeau'))
                ->orientate()
                ->resize(500, null, function ($constraint) {$constraint->aspectRatio();})
                ->encode('jpg', 85)
                ->save(storage_path('app/public/users/500/bandeau-' . $user_id . '.jpg'));
        }
    }

    //UPLOAD DE LA PHOTOD DE PROFIL
    function uploadPhotoProfile(Request $request){
        $user_id = Auth::id();

        $this->validate($request, [
            'photo' => 'required|image:jpeg,jpg,png|file|max:10240',
        ]);

        if ($request->hasFile('photo')) {

            //Image en 1000px
            Image::make($request->file('photo'))
                ->orientate()
                ->fit(1000, 1000)
                ->encode('jpg', 85)
                ->save(storage_path('app/public/users/1000/user-' . $user_id . '.jpg'));

            //Image en 200px
            Image::make($request->file('photo'))
                ->orientate()
                ->fit(200, 200)
                ->encode('jpg', 85)
                ->save(storage_path('app/public/users/200/user-' . $user_id . '.jpg'));

            //Image en 100px
            Image::make($request->file('photo'))
                ->orientate()
                ->fit(100, 100)
                ->encode('jpg', 85)
                ->save(storage_path('app/public/users/100/user-' . $user_id . '.jpg'));

            //Image en 50px
            Image::make($request->file('photo'))
                ->orientate()
                ->fit(50, 50)
                ->encode('jpg', 85)
                ->save(storage_path('app/public/users/50/user-' . $user_id . '.jpg'));
        }
    }

    function saveFilterSettings(Request $request){

        $user = User::where('id', Auth::id())->with('settings')->first();

        $user->settings->filter_climb = $request->input('filter_climb');
        $user->settings->filter_status = $request->input('filter_status');
        $user->settings->filter_period = $request->input('filter_period');
        $user->settings->save();

    }


    function saveBirth(Request $request){

        $this->validate($request, [
            'birth'=>"required|Integer|min:1900|max:" . date('Y')
        ]);

        $user = User::where('id', Auth::id())->first();
        $user->birth = $request->input('birth');
        $user->save();

        return $user;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //see modal controller
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //see modal controller
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = User::where('id', Auth::id())->first();

        $this->validate($request, [
            'name'=>"required|unique:users,name,$user->id|max:255"
        ]);

        $user->name = $request->input('name');
        $user->localisation = $request->input('localisation');
        $user->birth = $request->input('birth');
        $user->sex = $request->input('sex');
        $user->description = $request->input('description');
        $user->save();

        //Mise à jour de l'index de recherche
        Search::index('App\User', $user->id, $user->name);


        return response()->json(json_encode($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
