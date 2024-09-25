<?php

namespace app\modules\admin\models\seo;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $url
 * @property string|null $description
 * @property string|null $keyword
 * @property string|null $author
 * @property string|null $google_verification_site
 * @property string $created_at
 * @property string|null $updated_at
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'url', 'description', 'keyword', 'author', 'google_verification_site'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'author' => 'Author',
            'google_verification_site' => 'Google Verification Site',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
