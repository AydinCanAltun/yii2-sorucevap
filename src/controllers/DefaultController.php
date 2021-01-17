<?php

namespace AydinCanAltun\sorucevap\controllers;

use backend\modules\sorucevap\models\AskQuestion;
use backend\modules\sorucevap\models\AnswerQuestion;
use Yii;
use common\models\LoginForm;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
        {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->render('index');
            } else {
                $model->password = '';

                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }
        $request = Yii::$app->request;


        $id = $request->get('id');

        if($id){
            return $this->render('index', [
                'a' => $id
            ]);
        }else{
            return $this->render('index');
        }


    }

    public function actionCevapla()
    {
        $request = Yii::$app->request;

        if($request->get('questionID'))
        {
            $questionID = $request->get('questionID');
            $model = new AnswerQuestion();
            $model->questionID = $questionID;

            $checkIfTheQuestionHasAlreadyAnAnswer = $model->hasRecord($questionID);

            if(!is_array($checkIfTheQuestionHasAlreadyAnAnswer)) {
                $question = \Yii::$app->db
                    ->createCommand('SELECT * FROM questions WHERE questionID = :id ')
                    ->bindParam(':id', $model->questionID)
                    ->queryOne();

                $anonim = $question['isAnonymous'];
                $questionText = $question['questionText'];

                if($model->load(Yii::$app->request->post()) && $model->validate()) {
                    $insert = $model->addToDatabase();

                    if($insert) {
                        $toUsername = Yii::$app->user->identity->username;
                        $toID = Yii::$app->user->identity->getId();
                        $fromUsername = \Yii::$app->db
                            ->createCommand("SELECT username FROM user WHERE id= :id")
                            ->bindParam(':id', $question['fromID'])
                            ->queryOne()['username'];

                        return $this->render('singleView', [
                            'type' => 'answerQuestion',
                            'questionText' => $questionText,
                            'answerText' => $model->answerText,
                            'toID' => $toID,
                            'fromUsername' => $fromUsername,
                            'toUsername' => $toUsername,
                            'anonim' => $anonim
                        ]);

                    } else {
                        $model = new AnswerQuestion();
                        $model->questionID = $request->get('questionID');
                        $anonim = $question['isAnonymous'];
                        $questionText = $question['questionText'];
                        return $this->render('cevapla', [
                            'error' => "Veritabanına bağlanırken bir hata oluştu! Daha sonra tekrar deneyiniz!",
                            'model' => $model
                        ]);
                    }

                } else {
                    return $this->render('cevapla', [
                        'model' => $model,
                        'questionText' => $questionText
                    ]);
                }


            }else {
                return "Bu soruya daha önce cevap verilmiş!";
            }





        }

    }

    public function actionSor()
    {
        $request = Yii::$app->request;

        if($request->get('toID')) {

            $model = new AskQuestion();

            $model->fromID = Yii::$app->user->identity->getId();
            $model->toID = $request->get('toID');

            $toUsername = \Yii::$app->db
                ->createCommand('SELECT username FROM user WHERE id = :id ')
                ->bindParam(':id', $model->toID)
                ->queryOne()['username'];

            if($model->load(Yii::$app->request->post()) && $model->validate()) {
                $insert = $model->addToDatabase();

                if($insert) {

                    return $this->render('singleView', [
                        'type' => 'askQuestion',
                        'questionText' => $model->questionText,
                        'toID' => $model->toID,
                        'fromUsername' => Yii::$app->user->identity->username,
                        'toUsername' => $toUsername,
                        'anonim' => $model->isAnonymous
                    ]);
                }else {
                    $model = new AskQuestion();
                    $model->toID = Yii::$app->user->identity->getId();
                    $model->fromID = $request->get('fromID');

                    $toUsername = \Yii::$app->db
                        ->createCommand('SELECT username FROM user WHERE id = :id ')
                        ->bindParam(':id', $model->toID)
                        ->queryOne()['username'];

                    return $this->render('sorusor', [
                        'error' => "Veritabanına yükleme sırasında bir sorun oluştu! Lütfen daha sonra tekrar deneyiniz!",
                        'model' => $model,
                        'toUsername' => $toUsername
                    ]);
                }

            }
            return $this->render('sorusor', [
                'model' => $model,
                'toUsername' => $toUsername
            ]);
        }

        return $this->render('index');



    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->render('index');
    }

}