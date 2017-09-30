<?php
/**
 * User: Администратор
 * Date: 30.09.2017
 * Time: 12:07
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Customer;
use yii\data\ActiveDataProvider;

class CustomersController extends Controller
{
    public function actionGrid()
    {
        $query = Customer::find();
        $dataProvider = new ActiveDataProvider( [
            'query'      => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ] );
        return $this->render( 'grid', [ 'dataProvider' => $dataProvider ] );
    }
}