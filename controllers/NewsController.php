<?php

namespace app\controllers;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $newsList = $this->dataItems();

        return $this->render( 'index', [
            'newsList' => $newsList
        ] );

    }

    public function dataItems()
    {
        $newsList = [
            [ 'id' => 1, 'title' => 'First World War', 'date' => '1914-07-28' ],
            [ 'id' => 2, 'title' => 'Second World War', 'date' => '1939-09-01' ],
            [ 'id' => 3, 'title' => 'First man on the moon', 'date' => '1969-07-20' ]
        ];

        return $newsList;
    }

    public function actionItemDetail( $id )
    {
        $newsList = $this->dataItems();

        $item = null;
        foreach ( $newsList as $n ) {
            if ( $id == $n['id'] ) {
                $item = $n;
            }
        }
        return $this->render( 'itemDetail', [ 'item' => $item ] );
    }

}
