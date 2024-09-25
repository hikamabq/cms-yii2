<?php

namespace app\modules\admin\models\posts;

use app\modules\admin\models\pages\Pages;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $id_pages
 * @property string|null $thumbnail
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string|null $tag
 * @property string $author
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Pages $pages
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
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
            [['id_pages', 'title', 'slug', 'description', 'author', 'status'], 'required'],
            [['id_pages', 'status'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['thumbnail', 'title', 'slug', 'tag', 'author'], 'string', 'max' => 255],
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
            'id_pages' => 'Id Pages',
            'thumbnail' => 'Thumbnail',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'tag' => 'Tag',
            'author' => 'Author',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Pages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasOne(Pages::class, ['id' => 'id_pages']);
    }
}
