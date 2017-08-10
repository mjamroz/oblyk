<div class="parallax-container gym-parallax">
    <div class="row entete-info container">
        <div class="square-entete relative" style="position: relative">
            <img src="{{ $logo }}" alt="">
            @if(Auth::check())
                {{--<i class="material-icons white-text upload-gym-ic dropdown-button" data-constrainwidth="false" data-activates='choice-upload'>photo_camera</i>--}}
            @endif
        </div>
        <div class="liste-info">
            <h1 class="loved-king-font"><span>salle d'escalade </span>{{$label}}</h1>
            <p><a class="white-text" href="{{route('map')}}#{{$lat}}/{{$lng}}/15">{{$city}}, {{$region}} ({{$code_country}})</a></p>
            @if(Auth::check())
                <p onclick="followedElement(this, 'Gym', {{$gym->id}})" class="follow-paragraphe" data-followed="{{$user_follow}}">
                    <span id="followed-element"><i class="material-icons amber-text">star</i> Ne plus suivre cette salle</span>
                    <span id="not-followed-element"><i class="material-icons with-text">star_border</i> Suivre cette salle</span>
                </p>
            @else
                <p>Connectez-vous pour suivre cette salle</p>
            @endif
        </div>
    </div>
    <div class="parallax">
        <img class="img-gym-parallax" src="{{$imgSrc}}" alt="{{$imgAlt}}">
    </div>
</div>

<ul id='choice-upload' class='dropdown-content'>
    <li><label for="upload-form-logo" class="label-dropdown blue-text"><i class="material-icons ic-drop-upload">photo_camera</i> Changer le logo</label></li>
    <li><a href="#!"><i class="material-icons ic-drop-upload">wallpaper</i> Changer le bandeau</a></li>
</ul>

<form id="form-gym-logo" name="formGymLogo" style="display: none" onsubmit="uploadGymLogo(); return false">
    <input id="upload-form-logo" type="file" onchange="document.formGymLogo.submit()">
</form>