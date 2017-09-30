<?php
/**
 * User: Администратор
 * Date: 29.09.2017
 * Time: 22:50
 */

namespace app\controllers;


use yii\web\Controller;

class TestTimezoneController extends Controller
{
    /**
     *
     */
    public function actionCheck()
    {
        $dt = new \DateTime();
        echo 'Current date/time: ' . $dt->format( 'Y-m-d H:i:s' );
        echo '<br />';
        echo 'Current timezone: ' . $dt->getTimezone()->getName();
        echo '<br />';
    }

    public function actionCheckDatabase()
    {
        $result = \Yii::$app->db->createCommand( 'SELECT NOW()' )->queryColumn();
        echo 'Database current date/time: ' . $result[0];
    }
}