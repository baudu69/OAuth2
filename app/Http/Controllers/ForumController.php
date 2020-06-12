<?php

namespace App\Http\Controllers;

use App\DAO\ServiceForum;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ForumController extends Controller
{
    public function getLesSujets() {
        try {
            $reponse = array();
            $forum = new ServiceForum();
            $lesSujets = $forum->getLesSujets();
            $reponse['Etat'] = 'ok';
            $reponse['data'] = $lesSujets;
            return json_encode($reponse);
        } catch (\Exception $e) {
            $reponse = array();
            $reponse['Etat'] = 'ok';
            $reponse['Message'] = $e->getMessage();
            return $reponse;
        }
    }

    public function addSujet(Request $request) {
        try {
            $libSujet = $request->input('lib');
            $user = $request->user()->id;
            $reponse = array();
            $forum = new ServiceForum();
            $forum->addSujet($libSujet, $user);
            $reponse['Etat'] = 'ok';
            return json_encode($reponse);
        } catch (\Exception $e) {
            $reponse = array();
            $reponse['Etat'] = 'ok';
            $reponse['Message'] = $e->getMessage();
            return $reponse;
        }
    }
}
