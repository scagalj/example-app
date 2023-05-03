<?php

use App\Http\Controllers\LangController;

$languages = LangController::getAllLanguages();


if(!isset($fieldName) || !isset($fieldObject)){
    return;
}


$functionName = 'get' . $fieldName . 'value';
if (!method_exists($fieldObject, $functionName)) {
    return;
}
?>


<?php foreach ($languages as $language): ?>
    <div class="form-group">
        <?php $inputName = $fieldName . $language ?>
        <label for="<?php echo $inputName ?>"><?php echo $inputName ?>:</label>
        <textarea type="text" rows="4" style="width: 70%;" id="<?php echo $inputName ?>" name="<?php echo $inputName ?>" value=""><?php  echo call_user_func(array($fieldObject, $functionName), $language) ?? '' ?></textarea>
    </div>
<?php endforeach; ?>


