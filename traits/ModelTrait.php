<?php
namespace app\traits;

use app\models\FileUpload;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

trait ModelTrait
{
    public function behaviors(){
        return [
            TimestampBehavior::class,
        ];
    }

    public function getCreatedAt(){
        return date('Y-m-d H:i:s' , $this->created_at);
    }

    public function getUpdatedAt(){
        return date('Y-m-d H:i:s' , $this->updated_at);
    }
    public function getActiveStatusTitle()
    {
        if($this->active){
            return Yii::t('app','Active');
        }else{
            return Yii::t('app','DeActive');
        }
    }

    static public function getList($condition = null , $orderBy = null , $asArray = null){
        $query =  self::find();

        $query->where($condition);
        $query->orderBY($orderBy);
        if($asArray){
            $query->asArray();
        }

        return $query->all();

    }

    static public function getListArrayHelper($from = 'id',$to = 'name',$condition = null , $orderBy = null){
        return ArrayHelper::map(self::getList($condition) , $from , $to);
    }

    static function getColumnAttachment($model ,$column){
        $files = FileUpload::loadFiles(FileUpload::SECTION , $model , $model->id , $column);
        if($files){
            return Html::a(Yii::t('app' , 'Attachment Link') ,
                Yii::getAlias("@web")."/".$files[0]["relative_path"],
                [
                    'target' => "_blank"
                ]);
        }
        return null;
    }


}