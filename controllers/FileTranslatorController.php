<?php
/**
 * User: Администратор
 * Date: 04.10.2017
 * Time: 23:01
 */

namespace app\controllers;


use yii\web\Controller;

class FileTranslatorController extends Controller
{
    public function actionHelloWorldWithName( $name = '' )
    {
        $text = \Yii::t( 'app', 'Hello World! I\'m {name}', [ 'name' => $name ] );
        return $this->render( 'helloWorldWithName', [ 'text' => $text ] );
    }
}