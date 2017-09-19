<?php
/**
 * User: Администратор
 * Date: 19.09.2017
 * Time: 8:40
 */

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\Room;
use yii\web\UploadedFile;

class RoomsController extends Controller
{
    public function actionCreate()
    {
        $model = new Room();
        $modelCanSave = false;

        if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {

            $model->fileImage = UploadedFile::getInstance( $model, 'fileImage' );

            if ( $model->fileImage ) {
                $model->fileImage->saveAs( Yii::getAlias( '@uploadedfilesdir/' . $model->fileImage->baseName . '.' . $model->fileImage->extension ) );
            }

            $modelCanSave = true;
        }

        return $this->render( 'create', [
            'model'      => $model,
            'modelSaved' => $modelCanSave
        ] );
    }
}