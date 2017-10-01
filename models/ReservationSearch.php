<?php
/**
 * User: Администратор
 * Date: 01.10.2017
 * Time: 1:27
 */

namespace app\models;


class ReservationSearch extends Reservation
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge( parent::attributes(),
            [ 'customer.surname' ] );
    }

    public function rules()
    {
        // add related rules to searchable attributes
        return array_merge( parent::rules(), [
            [
                'customer.surname',
                'safe'
            ]
        ] );
    }
}