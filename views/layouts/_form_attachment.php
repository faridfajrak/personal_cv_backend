<div class="form-group">
    <label for="<?= $column ?>">
        <?= $model->getAttributeLabel($column) ?></label>
    <input type="file" class="form-control"
           id = "<?= $column ?>" name="<?= $column ?>" />
    <?= \app\models\FileUpload::getColumnAttachment($model , $column) ?>
</div>