<?php

namespace app\modules\admin\models\profile;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $logo
 * @property string|null $icon
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $twitter
 * @property string|null $tiktok
 * @property string|null $linkedin
 * @property string|null $youtube
 * @property string|null $updated_at
 * @property string $created_at
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['name', 'logo', 'icon', 'facebook', 'instagram', 'twitter', 'tiktok', 'linkedin', 'youtube'], 'string', 'max' => 255],
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
            'logo' => 'Logo',
            'icon' => 'Icon',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'tiktok' => 'Tiktok',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
