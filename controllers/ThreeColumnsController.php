<?php
/**
 * User: Администратор
 * Date: 02.10.2017
 * Time: 0:57
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ThreeColumnsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index.php');
    }
}