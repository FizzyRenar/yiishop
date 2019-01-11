<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Test Action</h1>
<?
if(Yii::$app->session->hasFlash('success')){
    echo '<div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
       '.Yii::$app->session->getFlash('success')."</div>";
}
elseif(Yii::$app->session->hasFlash('error')){
    echo '<div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>'.Yii::$app->session->getFlash('error')."</div>";
}
?>
<?
$form =ActiveForm::begin(
    [
        'options' => [
            'class' => 'form-vertical',
            'id' => 'testForm'
        ]
    ]
);
echo $form->field($model, 'name');
echo $form->field($model, 'email');
echo yii\jui\DatePicker::widget(['name' => 'attributeName']);
echo $form->field($model, 'text')->textarea(array('rows' => 5));
echo Html::submitButton('Send', array('class' => 'btn btn-success'));
ActiveForm::end();