<?php
namespace app\components;


use kartik\select2\Select2;
use Yii;
use yii\helpers\Html;

class ViewCmp
{

    public static function getFilerColumn($searchModel , $column , $columnName , $data){


        return [

            'attribute' => $column,

            'value' => $columnName,

            'format' => 'raw',

            'filter' => Select2::widget([


                'model' => $searchModel,

                'attribute' => $column,

                'data' => $data,

                'theme' => Select2::THEME_BOOTSTRAP,

                'pluginOptions' => ['allowClear' => true],

                'options' => [
                    'id' => str_replace('.', '', $columnName),
                    'placeholder' => '',

                ]

            ]),

        ];
    }

    public static function getFilterColumnSimple( $column , $columnName , $data){
        return [
            'attribute'=>$column,
            'value'=> $columnName,
            'format' => 'raw',
            'filter'=> $data,
        ];
    }


    public static function getImageColumn( $column ){

        return [

            'attribute' => $column,

            'format' => 'html',

            'value' => function ($data) use($column) {

                return Html::img( $data[$column],

                    ['width' => '150px']);

            },

        ];
    }

    public static function getLinkableColumn( $column , $link ){

        return [

            'attribute' => $column,

            'format' => 'html',

            'value' => function ($data) use($column , $link) {

                return Html::a($data[$column] , $link);

            },

        ];
    }

    public static function getAttachmentColumn($column){
        return [
            'attribute' => $column,

            'format' => 'html',

            'value' => function ($model) use($column) {
                return \app\models\FileUpload::getColumnAttachment($model , $column);

            },
        ];
    }

    public static function getLinkableImageColumn( $column ){

        return [

            'attribute' => $column,

            'format' => 'html',

            'value' => function ($data) use($column) {

                return Html::a(Html::img( $data[$column],
                    ['width' => '150px']) , $data[$column] , [
                    'target' => '_blank',
                ]);

            },

        ];
    }

    public static function getBooleanColumn($column){

        return [
            'attribute' => $column,
            'format' => 'boolean'
        ];
    }

    static function getButton()
    {
        return [
            'view' => function ($url, $model) {
                return Html::button('<a><span class="glyphicon glyphicon-eye-open"></span></a>',
                    ['value' => \yii\helpers\Url::to(['view', 'id' => $model->id]),
                        'class' => 'modalButton button-transparent']);

            },

            'update' => function ($url, $model) {
                return Html::button('<a><span class="glyphicon glyphicon-pencil"></span></a>',
                    ['value' => \yii\helpers\Url::to(['update', 'id' => $model->id]),
                        'class' => 'modalButton button-transparent'
                    ]);

            },


        ];
    }

    public static function getVisibleActiveVolumns($columnView , $columnUpdate , $columnDelete){
        $activeColumns = "";

        $columnView  ? $activeColumns .= "{view}" : $activeColumns .= "";
        $columnUpdate ? $activeColumns .= "{update}" : $activeColumns .= "";
        $columnDelete ? $activeColumns .= "{delete}" : $activeColumns .= "";

        return $activeColumns;
    }

    public static function getTotal($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total;
    }

//    public static function getPersianColumn($column ){
//        return [
//            'attribute' => $column,
//            'value' => function($model) use ($column){
//                return \backend\components\MainCmp::formatedPersianNumber($model[$column]) ;
//            },
//        ];
//    }
}