<?php

namespace app\models;

use app\traits\ModelTrait;
use Yii;
use yii\db\StaleObjectException;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "file_upload".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $section
 * @property string $category
 * @property string $refer_table
 * @property int $refer_id
 * @property string $refer_column
 * @property string $file_name
 * @property string $file_name_original
 * @property string|null $description
 * @property string $mime_type
 * @property int $file_size
 * @property string $relative_path
 * @property int|null $active
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class FileUpload extends \yii\db\ActiveRecord
{
    use ModelTrait;

    const BASE_UPlOAD = 'uploads';
    const PERCENT_THUMB = 30;
    const SECTION = 'app';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'refer_id', 'file_size', 'active', 'created_at', 'updated_at'], 'integer'],
            [['section', 'category', 'refer_table', 'refer_id', 'refer_column', 'file_name', 'file_name_original', 'mime_type', 'file_size', 'relative_path'], 'required'],
            [['section', 'category', 'refer_table', 'refer_column', 'file_name', 'file_name_original'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 500],
            [['mime_type'], 'string', 'max' => 100],
            [['relative_path'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'section' => Yii::t('app', 'Section'),
            'category' => Yii::t('app', 'Category'),
            'refer_table' => Yii::t('app', 'Refer Table'),
            'refer_id' => Yii::t('app', 'Refer ID'),
            'refer_column' => Yii::t('app', 'Refer Column'),
            'file_name' => Yii::t('app', 'File Name'),
            'file_name_original' => Yii::t('app', 'File Name Original'),
            'description' => Yii::t('app', 'Description'),
            'mime_type' => Yii::t('app', 'Mime Type'),
            'file_size' => Yii::t('app', 'File Size'),
            'relative_path' => Yii::t('app', 'Relative Path'),
            'active' => Yii::t('app', 'Active'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    static function createUploadFolder($path){
        if (!file_exists(self::BASE_UPlOAD . '/' . $path)) {
            mkdir(self::BASE_UPlOAD. '/' . $path, 0777, true);
        }
    }

    static function hashUploadName($name){
        return hash('sha1', date("Y/m/d H:i:s") . $name);
    }


//    static function deleteFile($model , $fieldName){
//
//        $query = $model::find()->where(['id' => $model->id])->all();
//
//        if($query){
//
//            if(file_exists($query[0][$fieldName])){
//                if(unlink($query[0][$fieldName]) )
//                    return true;
//            }
//        }
//        return false;
//    }

//    static function createThumb($file ,  $resized_width , $resized_height  ){
//        $ext = pathinfo($file , PATHINFO_EXTENSION);
//        $thumb_file = dirname($file)."/".basename($file, ".".$ext)."_thumb.".$ext;
//        $newWidth = $resized_width * self::PERCENT_THUMB / 100;
//        $newHeight = $resized_height * self::PERCENT_THUMB / 100;
//        \yii\imagine\Image::getImagine()->open($file)
//            ->thumbnail(new \Imagine\Image\Box($newWidth, $newHeight))
//            ->save($thumb_file, ['quality' => 90]);
//
//        return $thumb_file;
//
//    }


//    static function upload($model , $modelUploadForm , $column , $thumb = false){
//        $modelName = \yii\helpers\StringHelper::basename(get_class($model));
//        self::createUploadFolder( $modelName );
//        $modelUploadForm->imageFile = UploadedFile::getInstance($modelUploadForm, 'imageFile');
//        print_r($modelUploadForm->imageFile );
//        if ($modelUploadForm->imageFile != null) {
//            $path = self::BASE_UPlOAD . '/' . $modelName . '/' .
//                self::hashUploadName( $modelUploadForm->imageFile->baseName) . '.' . $modelUploadForm->imageFile->extension;
//
//            $model->$column = $path;
//            self::deleteFile($model , $column);
//            return $modelUploadForm->upload($path);
////            if(!$thumb){
////                return $modelUploadForm->upload($path);
////            }
////            $modelUploadForm->upload($path);
////            list($width, $height) = getimagesize($path);
////            $model->$thumb = self::createThumb($path, $width, $height);
////            return 1;
//
//        }
//        return 0;
//    }

    protected static function relativePath($section , $category ){

        $path = self::BASE_UPlOAD.'/'.$section.'/'.$category;
        if(!file_exists(self::BASE_UPlOAD)){
            mkdir(self::BASE_UPlOAD);
        }
        if(!file_exists(self::BASE_UPlOAD.'/'.$section)){
            mkdir(self::BASE_UPlOAD.'/'.$section);
        }
        if(!file_exists(self::BASE_UPlOAD.'/'.$section.'/'.$category)){
            mkdir(self::BASE_UPlOAD.'/'.$section.'/'.$category);
        }

        return $path;
    }

    public function saveFile($section ,$myModel , $file , $column ){

        $category = StringHelper::basename(get_class($myModel));
        $refer_table = $myModel->tableName();
        $fileName = md5($file["name"].date("YmdHis")).".".pathinfo($file["name"], PATHINFO_EXTENSION);
        $relativePath =  self::relativePath($section , $category )."/".$fileName;

        $model = new FileUpload();

        $model->user_id = Yii::$app->user->getId();
        $model->section = $section;
        $model->category = $category;
        $model->refer_table = $refer_table;
        $model->refer_id = $myModel->id;
        $model->refer_column = $column;
        $model->file_name = $fileName;
        $model->file_name_original = $file["name"];
        $model->description = '';
        $model->mime_type = $file["type"];
        $model->file_size = $file["size"];
        $model->relative_path = $relativePath;
        $model->created_at = time();
        $model->updated_at = time();

        if (move_uploaded_file($file["tmp_name"], $relativePath)) {

            return $model->save();
        }

        return 0;
    }

    public static function loadFiles($section , $myModel , $refer_id, $column){
        $category = StringHelper::basename(get_class($myModel));
        $refer_table = $myModel->tableName();

        return self::find()->where([
            'section' => $section,
            'category' => $category,
            'refer_table' => $refer_table,
            'refer_id' => $refer_id,
            'refer_column' => $column,
        ])->all();

    }

    public static function deleteFiles($section , $myModel , $refer_id , $column){
        $files = self::loadFiles($section , $myModel , $refer_id, $column);

        foreach ($files as $file){
            self::deleteFile($file["id"]);
        }
    }

    public static function loadFilesRelativePath($section , $myModel , $refer_id , $default = ''){
        $files = self::loadFiles($section , $myModel , $refer_id);
        $result = array();

        foreach ($files as $file){
            $result[] = Yii::getAlias("@web")."/".$file["relative_path"];
        }

        if(!$result)
            return [$default];

        return $result;
    }

    public static function deleteFile($id){
        $file = self::findOne(['id' => $id]);

        if(file_exists($file->relative_path)){
            unlink($file->relative_path);
            try {
                $file->delete();
            } catch (StaleObjectException $e) {
                print_r($e->getMessage());die;
            } catch (\Throwable $e) {
                print_r($e->getMessage());die;
            }
        }
    }

    static function uploadFiles($files , $model){


        if ($files) {
            foreach ($files as $key => $file) {
                if($file["error"] == 0){
                    self::deleteFiles(self::SECTION , $model , $model->id , $key);
                    $fileUpload = new FileUpload();
                    $fileUpload->setIsNewRecord(true);

                    $fileUpload->saveFile(self::SECTION  ,
                        $model , $file , $key);
                }

            }


        }
    }

}
