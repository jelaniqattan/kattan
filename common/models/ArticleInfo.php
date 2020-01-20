<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_info".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $article_name
 * @property string|null $article_photo
 * @property string|null $article_unit
 * @property string|null $status
 * @property string|null $selected_date
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Category $category
 * @property ArticlePrice[] $articlePrices
 */
class ArticleInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['article_name'], 'required'],
            [['selected_date', 'created_at', 'updated_at'], 'safe'],
            [['article_name'], 'string', 'max' => 100],
            [['article_photo'], 'string', 'max' => 255],
            [['article_unit'], 'string', 'max' => 25],
            [['status'], 'string', 'max' => 50],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'article_name' => Yii::t('app', 'Article Name'),
            'article_photo' => Yii::t('app', 'Article Photo'),
            'article_unit' => Yii::t('app', 'Article Unit'),
            'status' => Yii::t('app', 'Status'),
            'selected_date' => Yii::t('app', 'Selected Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ArticlePrices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticlePrices()
    {
        return $this->hasMany(ArticlePrice::className(), ['article_info_id' => 'id']);
    }
}