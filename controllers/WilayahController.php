<?php

namespace app\controllers;

use Yii;
use app\models\Provinsi;


class WilayahController extends \yii\rest\Controller
{
    protected function verbs()
    {
       return [
           'allProvinsi' => ['GET'],
           'kabkot' => ['POST'],
           'kecamatan' => ['POST'],
           'kelurahan' => ['POST'],
       ];
    }

    public function actionAllProvinsi(){
      $out = Provinsi::find()
             ->select(['id','provinsi AS provinsi'])->asArray()->all();

        return ['data'=>$out];
    }

    public function actionKabkot()
    {

      $out = \app\models\Kabkot::find()
             ->where(['provinsi_id'=>$_POST['id_provinsi']])
             ->select(['id','kabupaten_kota AS name'])->asArray()->all();

      return ['data'=>$out];

    }

    public function actionKecamatan()
    {

      $out = \app\models\Kecamatan::find()
             ->where(['kabkot_id'=>$_POST['id_kabkot']])
             ->select(['id','kecamatan AS name'])->asArray()->all();

      return ['data'=>$out];

    }

    public function actionKelurahan()
    {
      $out = \app\models\Kelurahan::find()
                     ->where(['kecamatan_id'=>$_POST['id_kecamatan']])
                     ->select(['id','kelurahan as name','kd_pos as kode_pos'])->asArray()->all();

      return ['data'=>$out];

    }






}
