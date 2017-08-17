<?php

namespace App\Http\Controllers;

use App\Crag;
use App\Cross;
use App\Follow;
use App\TickList;
use App\User;
use App\UserPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CragController extends Controller
{
    function cragPage($crag_id, $crag_title){

        $crag = Crag::where('id', $crag_id)
            ->with('rock')
            ->with('orientation')
            ->with('season')
            ->withCount('routes')
            ->withCount('links')
            ->withCount('photos')
            ->withCount('videos')
            ->withCount('topos')
            ->withCount('topoWebs')
            ->withCount('topoPdfs')
            ->withCount('posts')
            ->with('photos')
            ->with('topos.topo')
            ->with('massives.massive')
            ->with('topoWebs.user')
            ->with('topoPdfs.user')
            ->with('gapGrade')
            ->with('descriptions.user')
            ->first();

        $partners = User::whereIn('id', UserPlace::getPartnersAroundCenter($crag->lat, $crag->lng))->get();

        $user = User::where('id',Auth::id())->with('partnerSettings')->first();

        $crag_id = $crag->id;
        $userCrosses = Cross::where('user_id', Auth::id())
            ->whereHas('route', function ($query) use ($crag_id) {$query->where('crag_id', $crag_id);})
            ->with('route')
            ->with('route.routeSections')
            ->with('crossStatus')
            ->get();

        $userTicklists = TickList::where('user_id', Auth::id())
            ->whereHas('route', function ($query) use ($crag_id) {$query->where('crag_id', $crag_id);})
            ->with('route')
            ->with('route.routeSections')
            ->get();

        //on va chercher si l'utilisateur follow ce site
        $userFollow = Follow::where(
            [
                ['user_id', '=', Auth::id()],
                ['followed_type', '=', 'App\Crag'],
                ['followed_id', '=', $crag->id]
            ]
        )->first();
        $userFollow = (isset($userFollow)) ? 'true' : 'false';

        //on ajoute une vue à la falaise
        $crag->views++;
        $crag->save();

        $data = [
            'crag' => $crag,
            'user' => $user,
            'userCrosses' => $userCrosses,
            'userTicklists' => $userTicklists,
            'meta_title' => $crag['label'],
            'meta_description' => 'description de ' . $crag['label'],
            'user_follow' => $userFollow,
            'partners' => $partners,
        ];

        return view('pages.crag.crag', $data);
    }
}
