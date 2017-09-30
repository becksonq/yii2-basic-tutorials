<?php
/**
 * User: Администратор
 * Date: 29.09.2017
 * Time: 23:21
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Room;

class TestSqliteController extends Controller
{
    public function actionCreateRoomTable()
    {
        // Create room table
        $sql = '
                CREATE TABLE IF NOT EXISTS room (
                id INT NOT NULL,
                floor INT NOT NULL, 
                room_number INT NOT NULL,
                has_conditioner INT NOT NULL, 
                has_tv INT NOT NULL, 
                has_phone INT NOT NULL, 
                available_from DATE NOT NULL, 
                price_per_day FLOAT, 
                description TEXT)';

        \Yii::$app->dbSqlite->createCommand( $sql )->execute();

        echo 'Room table created in dbSqlite';
    }

    public function actionBackupRoomTable()
    {
        // Create room table
        $sql = 'CREATE TABLE IF NOT EXISTS room (
                  id INT NOT NULL, 
                  floor INT NOT NULL, 
                  room_number INT NOT NULL, 
                  has_conditioner INT NOT NULL, 
                  has_tv INT NOT NULL, 
                  has_phone INT NOT NULL, 
                  available_from DATE NOT NULL, 
                  price_per_day FLOAT, 
                  description TEXT)';

        \Yii::$app->dbSqlite->createCommand( $sql )->execute();
        // Truncate room table in dbSqlite
        $sql = 'DELETE FROM room';
        \Yii::$app->dbSqlite->createCommand( $sql )->execute();
        // Load all records from MySQL and insert every single record in dbqlite
        $models = Room::find()->all();
        foreach ( $models as $m ) {
            \Yii::$app->dbSqlite->createCommand()->insert( 'room', $m->attributes )->execute();
        }
        // Load all records from dbSqlite
        $sql = 'SELECT * FROM room';
        $sqliteModels = \Yii::$app->dbSqlite->createCommand( $sql )->queryAll();
        return $this->render( 'backupRoomTable', [
            'sqliteModels' => $sqliteModels
        ] );
    }
}