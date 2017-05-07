<?php

namespace App\Lib;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class InputTemplates extends ServiceProvider{

    public function __construct(){
        //
    }


    //TITRE DE LA POPUP
    public static function popupTitle($options){
        $title = $options['title'];

        return '
            <div class="row">
                <h5 class="loved-king-font text-center popup-title">' . $title . '</h5>
            </div>
        ';
    }


    //DIV QUI AFFICHE LES ERREURS DE LA POPUP
    public static function popupError($options){

        return '
            <div id="errorPopupText" class="error-popup-text">
                Message d\'error
            </div>
        ';
    }


    //INPUT DU TYPE HIDDEN
    public static function Hidden($options){
        $name = $options['name'];
        $id = (isset($options['id']))? $options['id'] : $options['name'];
        $value = (isset($options['value']))? $options['value'] : '';

        return '
            <input type="hidden" class="input-data" name="' . $name . '" id="' . $id . '" value="' . $value . '">
        ';
    }


    //INPUT DU TYPE TEXT
    public static function text($options){
        $name = $options['name'];
        $value = (isset($options['value']))? $options['value'] : '';
        $label = (isset($options['label']))? $options['label'] : $options['name'];
        $placeholder = (isset($options['placeholder']))? $options['placeholder'] : '';
        $type = (isset($options['type']))? $options['type'] : 'text';
        $id = (isset($options['id']))? $options['id'] : $options['name'];
        $classLabel = ($value != '' || $placeholder != '')? 'active' : '';

        return '
            <div class="input-field col s12">
                <input placeholder="' . $placeholder . '" value="' . $value . '" id="'. $id .'" name="' . $name . '" type="' . $type . '" class="input-data">
                <label class="' . $classLabel . '" for="' . $id . '">' . $label . '</label>
            </div>
        ';
    }


    //INPUT DE TYPE SIMPLE MARKDOWN EDITOR
    public static function SimpleMde($options){
        $name = $options['name'];
        $value = (isset($options['value']))? $options['value'] : '';

        return '
            <textarea name="' . $name . '" id="simplemde_id">' . $value . '</textarea>
        ';
    }


    //INPUT DU TYPE ÉDITEUR DE MARKDOWN
    public static function mdText($options){
        $name = $options['name'];
        $label = (isset($options['label']))? $options['label'] : $options['name'];
        $value = (isset($options['value']))? $options['value'] : '';
        $placeholder = (isset($options['placeholder']))? $options['placeholder'] : '';
        $classLabel = ($value != '' || $placeholder != '')? 'active' : '';

        return '
            <div class="input-field col s12">
                <textarea placeholder="' . $placeholder . '" name="' . $name . '" id="' . $name . '" class="materialize-textarea md-textarea input-data">' . $value . '</textarea>
                <label class="'. $classLabel .'" for="' . $name . '">' . $label . '</label>
            </div>
        ';
    }


    //INPUT DU TYPE SUBMIT
    public static function submit($options){
        $label = (isset($options['label']))? $options['label'] : 'Envoyer';
        $color = (isset($options['color']))? $options['color'] : 'blue';

        return '
            <div class="row text-right" id="submit-btn">
                <button class="btn waves-effect ' . $color . ' waves-light" type="submit" name="action">' . $label . '
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="row text-right div-submit-loader" id="submit-loader">
                <div class="submit-loader">
                    <div class="preloader-wrapper small active">
                        <div class="spinner-layer spinner-' . $color . '-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        ';
    }
}
