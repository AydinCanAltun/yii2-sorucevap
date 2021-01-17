<?php

namespace AydinCanAltun\sorucevap\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $answerID
 * @property string|null $answerText
 * @property int|null $questionID
 * @property string $answeredAt
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['answerText', 'questionID'], 'require'],
            [['answerText'], 'string'],
            [['questionID'], 'integer'],
            [['answeredAt'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'answerID' => 'Answer ID',
            'answerText' => 'Answer Text',
            'questionID' => 'Question ID',
            'answeredAt' => 'Answered At',
        ];
    }
}
