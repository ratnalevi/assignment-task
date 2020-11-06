<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "albums".
 *
 * @property int $id
 * @property string $title
 * @property int $artist_id
 *
 * @property Artists $artist
 * @property Tracks[] $tracks
 */
class Albums extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albums';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'artist_id'], 'required'],
            [['artist_id'], 'default', 'value' => null],
            [['artist_id'], 'integer'],
            [['title'], 'string', 'max' => 160],
            [['artist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artists::className(), 'targetAttribute' => ['artist_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'artist_id' => 'Artist ID',
        ];
    }

    /**
     * Gets query for [[Artist]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtist()
    {
        return $this->hasOne(Artists::className(), ['id' => 'artist_id']);
    }

    /**
     * Gets query for [[Tracks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTracks()
    {
        return $this->hasMany(Tracks::className(), ['album_id' => 'id']);
    }
}
