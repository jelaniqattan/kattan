<?php

use yii\bootstrap4\Html;
use common\components\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchModel\TaxOfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Tax Offices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-office-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tax Office'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
                             'dataProvider' => $dataProvider,
                             'filterModel'  => $searchModel,
                             'columns'      => [
                                 ['class' => 'yii\grid\SerialColumn'],
                                 'income',
                                 'selected_date',
                                 [
                                     'class'    => 'common\components\ActionColumn',
                                     'template' => '{update} {delete}',
                                 ],                             ],
                         ]); ?>


</div>
