@extends('layouts.app')

@section('css')
    <link href="/css/crag.css" rel="stylesheet">
    <link href="/framework/simplemde/simplemde.min.css" rel="stylesheet">
@endsection

@section('content')

    {{--parallax--}}
    @include('includes.crag-parallax', array('imgSrc' => '/img/oblyk-home-baume-rousse.jpg', 'imgAlt' => 'Falaise de baume rousse'))

    {{--Menu des falaises--}}
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs tabs-fixed-width crag-menu">
                    <li class="tab col s2"><a class="active" href="#test1"><i class="material-icons">info</i><span>Informations</span></a></li>
                    <li class="tab col s2"><a href="#test2"><i class="material-icons">shuffle</i><span>Fils d'actu</span></a></li>
                    <li class="tab col s2"><a href="#test3"><i class="material-icons">format_list_bulleted</i><span>Voies</span></a></li>
                    <li class="tab col s2"><a href="#test4"><i class="material-icons">collections</i><span>Médias</span></a></li>
                    <li class="tab col s2"><a href="#test5"><i class="material-icons">link</i><span>Liens</span></a></li>
                    <li class="tab col s2"><a href="#test6"><i class="material-icons">local_library</i><span>Topos</span></a></li>
                    <li class="tab col s2"><a href="#test7"><i class="material-icons">map</i><span>Map</span></a></li>
                </ul>
            </div>
        </div>
    </div>

    {{--contenu de la page--}}
    <div class="container info-crag">
        <div class="row">

            <div class="col s12 m7">
                <div class="card-panel">

                    <h2 class="loved-king-font">Informations sur {{ $crag->label }}</h2>
                    <p>{{$crag['label']}} est un site d'escalade de {{ $crag->rock->label }}, on y trouve x lignes de {{$crag->type_voie }}</p>
                </div>
            </div>
            <div class="col s12 m5">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s5">
                            <svg version="1.1" viewBox="0 0 100.61393 100.61393" height="28.395487mm" width="28.395487mm">
                                <g transform="translate(-299.43062,-288.93568)">
                                    <path class="tooltipped" data-position="top" data-delay="50" data-tooltip="Nord" style="fill:@if($crag->orientation->north){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-rule:evenodd;stroke:none" d="m 349.73758,288.93568 -11.20135,39.10561 11.20135,11.20135 0,-42.84708 9.54034,33.30673 1.66102,-1.661 z"></path>
                                    <path class="tooltipped" data-position="left" data-delay="50" data-tooltip="Ouest" style="fill:@if($crag->orientation->west){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none" d="m 338.53623,328.04129 -39.10561,11.20135 39.10561,11.20136 11.20135,-11.20136 -42.84704,0 33.30671,-9.54033 z"></path>
                                    <path class="tooltipped" data-position="right" data-delay="50" data-tooltip="Est" style="fill:@if($crag->orientation->east){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-rule:evenodd;stroke:none" d="m 400.04455,339.24264 -39.10561,-11.20135 -11.20136,11.20135 42.84709,0 -33.30672,9.54034 1.66099,1.66104 z"></path>
                                    <path class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Sud" style="fill:@if($crag->orientation->south){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-rule:evenodd;stroke:none" d="m 349.73758,389.54961 11.20136,-39.10561 -11.20136,-11.20136 0,42.84708 -9.54033,-33.30671 -1.66102,1.66099 z"></path>
                                    <path class="tooltipped" data-position="left" data-delay="50" data-tooltip="Sud-Ouest" style="fill:@if($crag->orientation->south_west){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none" d="m 330.74892,348.21342 -10.44405,20.46194 20.46195,-10.44405 -2.23059,-7.78731 z"></path>
                                    <path class="tooltipped" data-position="left" data-delay="50" data-tooltip="Nord-Ouest" style="fill:@if($crag->orientation->north_west){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none" d="m 340.76682,320.25398 -20.46195,-10.44405 10.44405,20.46195 7.78731,-2.23059 z"></path>
                                    <path class="tooltipped" data-position="right" data-delay="50" data-tooltip="Nord-Est" style="fill:@if($crag->orientation->north_east){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none" d="m 368.72625,330.27188 10.44405,-20.46195 -20.46194,10.44406 2.23058,7.7873 z"></path>
                                    <path class="tooltipped" data-position="right" data-delay="50" data-tooltip="Sud-Est" style="fill:@if($crag->orientation->south_east){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none" d="m 358.70836,358.23133 20.46194,10.44403 -10.44405,-20.46194 -7.78731,2.23058 z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="col s7 petites-infos-crag">
                            <ul>
                                <li><i class="material-icons">pin_drop</i> <a href="#!">{{$crag->lat}}, {{$crag->lng}}</a></li>
                                <li class="saison">
                                    <svg class="tooltipped" data-position="top" data-delay="50" data-tooltip="Été" version="1.1" viewBox="0 0 24.999991 24.999999" height="7.0555553mm" width="7.055553mm">
                                        <g transform="translate(-253.62697,-533.73525)">
                                            <path style="fill:@if($crag->season->summer){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" d="m 266.15215,533.73525 -2.49553,3.34322 -3.69292,-1.39604 -0.64907,3.94192 -3.8412,0.54834 1.24776,3.59222 -3.09422,2.74451 3.09422,2.39481 -1.4464,3.59501 4.03984,0.84769 0.64907,3.69293 3.69292,-1.29812 2.24653,2.99351 2.59345,-2.94315 3.89436,1.24776 0.54834,-3.79365 3.64256,-0.64906 -1.14704,-3.74048 3.19214,-2.24653 -3.2425,-2.84523 1.39604,-3.44114 -3.74049,-0.55114 -0.5987,-4.14056 -3.844,1.4464 -2.44516,-3.34322 z m -0.0419,4.328 a 8.2632674,8.2632674 0 0 1 8.26153,8.26153 8.2632674,8.2632674 0 0 1 -8.26153,8.26432 8.2632674,8.2632674 0 0 1 -8.26432,-8.26432 8.2632674,8.2632674 0 0 1 8.26432,-8.26153 z m 0,1.14705 a 7.1155426,7.1155426 0 0 0 -7.11728,7.11448 7.1155426,7.1155426 0 0 0 7.11728,7.11727 7.1155426,7.1155426 0 0 0 7.11448,-7.11727 7.1155426,7.1155426 0 0 0 -7.11448,-7.11448 z"></path>
                                        </g>
                                    </svg>


                                    <svg class="tooltipped" data-position="top" data-delay="50" data-tooltip="Automne" version="1.1" viewBox="0 0 25.89868 24.999999" height="7.0555553mm" width="7.3091831mm">
                                        <g transform="translate(-378.28044,-439.36014)">
                                            <path style="opacity:1;fill:@if($crag->season->autumn){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" d="m 397.74521,464.36014 c 0.27167,-0.51062 0.24438,-1.02124 0.0818,-1.53186 -2.66948,0.0151 -3.05407,-1.99346 -3.92157,-3.57435 1.17395,0.51622 2.39626,0.87774 3.83987,0.53105 0.94308,-1.4991 2.27711,-2.8449 5.96405,-3.26798 -1.48418,-0.78978 -2.82675,-1.91616 -2.65524,-3.43137 0.16923,-1.49504 1.69741,-2.46467 3.125,-3.34967 -0.62803,-0.47239 -1.47844,-0.59204 -1.77696,-1.61356 -0.38102,-1.3039 0.28864,-2.628 0.8987,-3.942 -2.41053,1.5492 -4.77649,3.87511 -7.35294,3.67647 -2.23861,-0.17259 -0.95416,-3.85898 -1.30719,-5.88235 -1.04168,0.41208 -2.1091,0.78291 -3.125,0.55147 -1.57763,-0.3594 -1.9268,-2.00704 -2.69608,-3.16585 -0.17792,1.30462 0.0817,2.84678 -0.87827,3.79902 -0.98016,0.97224 -2.26034,0.82728 -3.39052,1.18464 1.0126,1.47039 2.58284,2.78652 2.36929,4.92239 -0.25331,2.53354 -5.74319,0.60138 -8.63971,0.87826 2.83012,2.34983 2.71656,3.85285 1.59313,5.06536 3.71006,0.76312 5.57929,2.34245 3.5335,5.65768 2.24508,-0.31162 4.47249,-0.89689 6.82189,0.4085 0.90551,-0.34462 1.811,-0.63656 2.71651,-1.61356 0.0882,2.18899 1.17198,3.79514 3.49264,4.67728 z"></path>
                                        </g>
                                    </svg>

                                    <svg class="tooltipped" data-position="top" data-delay="50" data-tooltip="Hiver" version="1.1" viewBox="0 0 22.150363 24.999997" height="7.0555549mm" width="6.2513247mm">
                                        <g transform="translate(-451.64934,-436.50304)">
                                            <path style="fill:@if($crag->season->winter){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" d="m 462.77611,436.50314 c -0.74131,-0.008 -1.48189,0.4427 -1.48186,1.37581 l 0,2.22423 -1.58505,-1.25257 c -1.27596,-1.00843 -2.54765,0.91269 -1.43314,1.76276 l 3.01819,2.30162 0,3.48826 -3.09845,-1.78569 -0.58758,-3.73476 c -0.10552,-0.66909 -0.65866,-0.96298 -1.17231,-0.90287 -0.51364,0.0601 -0.98805,0.47483 -0.93153,1.22389 l 0.14617,1.94334 -1.79144,-1.03472 c -1.56138,-0.90147 -3.10094,1.6351 -1.48473,2.56818 l 1.92614,1.11211 -1.8774,0.74523 c -1.51131,0.6008 -0.47939,2.66121 0.81401,2.12105 l 3.49973,-1.4618 3.02392,1.74556 -3.09844,1.78856 -3.52839,-1.35862 c -1.26443,-0.48632 -2.12782,1.33229 -0.77389,1.98347 l 1.75702,0.84555 -1.79428,1.03472 c -1.56139,0.90147 -0.13149,3.50131 1.48473,2.56818 l 1.92614,-1.11211 -0.29237,1.9978 c -0.23535,1.60922 2.06251,1.74851 2.24143,0.35828 l 0.4844,-3.76342 3.02393,-1.74556 0,3.57711 -2.94081,2.37614 c -1.05338,0.85187 0.0891,2.50939 1.32995,1.66244 l 1.61086,-1.10065 0,2.07232 c 0,1.80294 2.96658,1.86626 2.96658,0 l 0,-2.22423 1.58219,1.25256 c 1.27597,1.00843 2.54765,-0.91557 1.43314,-1.76563 l -3.01533,-2.29875 0,-3.49112 3.09559,1.78855 0.58759,3.7319 c 0.21104,1.33818 2.21687,1.17996 2.10384,-0.31816 l -0.14617,-1.9462 1.79429,1.03759 c 1.56138,0.90147 3.09807,-1.63512 1.48186,-2.56819 l -1.92614,-1.11211 1.87742,-0.7481 c 1.51131,-0.6008 0.48229,-2.66121 -0.81115,-2.12104 l -3.50259,1.4618 -3.02393,-1.74556 3.09845,-1.78569 3.52838,1.35575 c 1.26444,0.48632 2.12783,-1.32942 0.7739,-1.9806 l -1.75704,-0.84555 1.7943,-1.03473 c 1.56138,-0.90146 0.13149,-3.50133 -1.48473,-2.56818 l -1.92614,1.11211 0.29236,-2.00065 c 0.23535,-1.60924 -2.0625,-1.74853 -2.24142,-0.35829 l -0.4844,3.76342 -3.02393,1.74556 0,-3.57424 2.94081,-2.37901 c 1.05337,-0.85187 -0.0891,-2.50939 -1.32996,-1.66245 l -1.61085,1.10066 0,-2.06945 c 0,-0.90147 -0.74055,-1.36791 -1.48187,-1.37581 z"></path>
                                        </g>
                                    </svg>

                                    <svg class="tooltipped" data-position="top" data-delay="50" data-tooltip="Printemps" version="1.1" viewBox="0 0 19.96755 24.999999" height="7.0555553mm" width="5.6352863mm">
                                        <g transform="translate(-257.30034,-422.21728)">
                                            <path style="opacity:1;fill:@if($crag->season->spring){{'rgb(33,150,243)'}}@else{{'rgb(77,77,77)'}}@endif;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" d="m 267.29222,422.21728 c -3.31373,2.24388 -2.69156,5.03736 -1.85776,7.86101 -2.492,-2.20482 -5.14342,-3.04384 -8.13412,-0.98702 0.96818,3.8544 3.70193,4.25822 6.49539,4.55111 -2.98491,1.42929 -3.23879,4.05202 -3.03407,6.87398 2.21231,-0.37767 4.47004,-0.53745 6.15468,-3.3775 l 0,7.38507 c -2.47245,-2.31509 -3.48157,-2.15872 -4.68902,-2.33639 0.79874,1.66899 2.09881,2.96354 4.70795,3.27474 l -0.0676,1.755 1.12494,0 0,-1.65495 c 2.09833,-0.51248 3.81899,-1.38715 4.38074,-3.39102 -1.44951,0.28274 -2.89878,0.36766 -4.34829,2.18226 l 0,-7.19578 c 1.15446,2.13703 2.92494,3.46815 5.8491,3.29097 0.21947,-4.30513 -1.18048,-5.79634 -2.84748,-6.82261 3.75822,-0.16722 5.42658,-1.97424 6.24121,-4.45105 -3.42152,-2.3782 -5.72691,-1.01558 -7.89345,0.81936 0.58002,-2.88822 1.15522,-5.77673 -2.08221,-7.77718 z m 0.0973,9.1536 a 1.6399296,1.6399296 0 0 1 1.64143,1.63872 1.6399296,1.6399296 0 0 1 -1.64143,1.63872 1.6399296,1.6399296 0 0 1 -1.63871,-1.63872 1.6399296,1.6399296 0 0 1 1.63871,-1.63872 z"></path>
                                        </g>
                                    </svg>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="card-panel">
                    <h2 class="loved-king-font">Déscription par ce qui y grimpe</h2>

                    <div class="description-zone">
                        @foreach ($crag->descriptions as $description)
                            <div class="description-div">
                                <p>
                                    {{$description->description}}
                                </p>
                                <p class="info-user-description grey-text">
                                    par {{$description->user->name}} le {{$description->created_at->format('d M Y')}}

                                    @if(Auth::check())
                                        <i data-modal="{'id':{{$description->id}}, 'model':'Description'}" data-route="{{route('problemModal')}}" data-target="modal" class="material-icons tiny-btn right tooltipped btnModal" data-position="top" data-delay="50" data-tooltip="Signaler un problème">flag</i>
                                        @if($description->user_id == Auth::id())
                                            <i data-modal="{'crag_id':{{$crag->id}}, 'description_id':{{$description->id}}, 'title':'Modifier la description', 'method' : 'PUT'}" data-route="{{route('descriptionModal')}}" data-target="modal" class="material-icons tiny-btn right tooltipped btnModal" data-position="top" data-delay="50" data-tooltip="Modifier cette déscription">edit</i>
                                            <i data-modal="{'route' : '/descriptions/{{$description->id}}'}" data-route="{{route('deleteModal')}}" data-target="modal" class="material-icons tiny-btn right tooltipped btnModal" data-position="top" data-delay="50" data-tooltip="Supprimer cette déscription">delete</i>
                                        @endif
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>

                    {{--BOUTON POUR AJOUTER UNE DESCRIPTION--}}
                    @if(Auth::check())
                        <div class="text-right">
                            <a data-modal="{'crag_id':{{$crag->id}}, 'description_id':'', 'title':'Ajouter une description', 'method' : 'POST'}" data-route="{{route('descriptionModal')}}" data-target="modal" id="description-btn-modal" data-position="top" data-delay="50" data-tooltip="Rédiger une déscription"  class="btn-floating btn waves-effect waves-light tooltipped btnModal"><i class="material-icons">mode_edit</i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m7">
                <div class="card-panel">
                    <h2 class="loved-king-font">Topos papier</h2>
                    <p>
                        liste des topos
                    </p>
                </div>
            </div>
            <div class="col s12 m5">
                <div class="card-panel">
                    <h2 class="loved-king-font">Topos web</h2>
                    <p>
                        liste des webs
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="card-panel">
                    <h2 class="loved-king-font">Photo</h2>
                    <p>
                        liste des photos
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m4">
                <div class="card-panel">
                    <h2 class="loved-king-font">Type de lignes</h2>
                    <p>
                        graphe
                    </p>
                </div>
            </div>
            <div class="col s12 m8">
                <div class="card-panel">
                    <h2 class="loved-king-font">Cotations</h2>
                    <p>
                        graphe
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="/js/crag.js"></script>
    <script src="/framework/simplemde/simplemde.min.js"></script>
@endsection