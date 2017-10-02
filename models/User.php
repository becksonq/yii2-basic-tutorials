<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity( $id )
    {
        return static::findOne( [ 'id' => $id ] );
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken( $token, $type = null )
    {
        return static::findOne( [ 'access_token' => $token ] );
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername( $username )
    {
        return static::findOne( [ 'username' => $username ] );
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey( $authKey )
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword( $password )
    {
        return Yii::$app->security->validatePassword( $password, $this->password_hash );
    }

    /**
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPassword( $password )
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash( $password );
    }


    /**
     *
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave( $insert )
    {
        if ( parent::beforeSave( $insert ) ) {
            if ( $this->isNewRecord ) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
