<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Test Action</h1>
<?
$form =ActiveForm::begin(
    [
        'options' => [
            'class' => 'form-vertical',
            'id' => 'testForm'
        ]
    ]
);
echo $form->field($model, 'name')->label('Имя');
echo $form->field($model, 'email')->input('email');
echo $form->field($model, 'text')->label('Текст сообщения')->textarea(array('rows' => 5));
echo Html::submitButton('Send', array('class' => 'btn btn-success'));
ActiveForm::end();