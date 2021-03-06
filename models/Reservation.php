<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property integer $id
 * @property integer $room_id
 * @property integer $customer_id
 * @property string  $price_per_day
 * @property string  $date_from
 * @property string  $date_to
 * @property string  $reservation_date
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'room_id', 'customer_id', 'price_per_day', 'date_from', 'date_to' ], 'required' ],
            [ [ 'room_id', 'customer_id' ], 'integer' ],
            [ [ 'price_per_day' ], 'number' ],
            [ [ 'date_from', 'date_to', 'reservation_date' ], 'safe' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'               => 'ID',
            'room_id'          => 'Room ID',
            'customer_id'      => 'Customer ID',
            'price_per_day'    => 'Price Per Day',
            'date_from'        => 'Date From',
            'date_to'          => 'Date To',
            'reservation_date' => 'Reservation Date',
        ];
    }

    public function getRoom()
    {
        return $this->hasOne( Room::className(), [ 'id' => 'room_id' ] );
    }

    public function getCustomer()
    {
        return $this->hasOne( Customer::className(), [ 'id' => 'customer_id' ] );
    }

    public function getDescription()
    {
        $content = sprintf( 'reservation #%s at %s', $this->id,
            date( 'Y-m-d H:i:s', strtotime( $this->reservation_date ) ) );
        return $content;
    }
}
