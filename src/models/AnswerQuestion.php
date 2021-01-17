<?php

namespace AydinCanAltun\sorucevap\models;

use Yii;
use yii\base\Model;

class AnswerQuestion extends Model
{
    public $answerText;
    public $questionID;

    public function rules()
    {
        return [
            [ ['answerText', 'questionID'], 'required' ],
            ['answerText', 'string'],
            [ ['questionID'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'answerText' => 'Verilen Cevap',
        ];
    }

    public function addToDatabase()
    {
        return \Yii::$app->db
            ->createCommand()
            ->insert('answers', [
                'answerText' => $this->answerText,
                'questionID' => $this->questionID
            ])->execute();
    }

    public function hasRecord($questionID)
    {
        return \Yii::$app->db
            ->createCommand('SELECT * FROM answers WHERE questionID = :id')
            ->bindParam(':id', $questionID)
            ->queryOne();
    }

}


?>