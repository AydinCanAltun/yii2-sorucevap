<?php

namespace AydinCanAltun\sorucevap\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $questionID
 * @property string|null $questionText
 * @property int|null $fromID
 * @property int|null $toID
 * @property int|null $isAnonymous
 * @property string $askedAt
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['questionText', 'fromID', 'toID'], 'required'],
            [['questionText'], 'string'],
            [['fromID', 'toID', 'isAnonymous'], 'integer'],
            [['askedAt'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'questionID' => 'Question ID',
            'questionText' => 'Question Text',
            'fromID' => 'From ID',
            'toID' => 'To ID',
            'isAnonymous' => 'Is Anonymous',
            'askedAt' => 'Asked At',
        ];
    }
}
