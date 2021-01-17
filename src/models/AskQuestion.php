<?php

namespace AydinCanAltun\sorucevap\models;

use Yii;
use yii\base\Model;

class AskQuestion extends Model
{
    public $questionText;
    public $fromID;
    public $toID;
    public $isAnonymous;

    public function rules()
    {
        return [
            [ ['questionText', 'fromID', 'toID'], 'required' ],
            ['questionText', 'string'],
            [ ['fromID', 'toID', 'isAnonymous'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'questionText' => 'Sorulacak Soru',
            'isAnonymous' => 'Anonim Soru Olsun mu ?',
        ];
    }

    public function addToDatabase()
    {
        return \Yii::$app->db
            ->createCommand()
            ->insert('questions', [
                'questionText' => $this->questionText,
                'fromID' => $this->fromID,
                'toID' => $this->toID,
                'isAnonymous' => $this->isAnonymous
            ])->execute();
    }

}


?>