<?php

namespace app\modules\admin\models\pages;

use app\modules\admin\models\posts\Posts;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $type 0=post, 1=detail
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Posts[] $posts
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['id', 'type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'slug' => 'Url',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
