<?php

namespace app\modules\admin\models\contact;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property int $name
 * @property int $type 0=contact, 1=email
 * @property string $contact
 * @property string $created_at
 * @property string|null $updated_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type', 'contact'], 'required'],
            [['id', 'name', 'type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['contact'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'contact' => 'Contact',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
