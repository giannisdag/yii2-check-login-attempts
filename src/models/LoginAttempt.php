<?php

namespace giannisdag\loginattempts\src\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "login_attempt".
 *
 * @property integer $id
 * @property string $key
 * @property integer $amount
 * @property integer $reset_at
 * @property integer $updated_at
 * @property integer $created_at
 */
class LoginAttempt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_attempt';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['amount', 'reset_at', 'updated_at', 'created_at'], 'integer'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'amount' => Yii::t('app', 'Amount'),
            'reset_at' => Yii::t('app', 'Reset At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
