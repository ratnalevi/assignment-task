<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "artists".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Albums[] $albums
 */
class Artists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 120],
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
        ];
    }

    /**
     * Gets query for [[Albums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Albums::className(), ['artist_id' => 'id']);
    }
}
