<?php
/**
 * User: Администратор
 * Date: 30.09.2017
 * Time: 12:10
 */
use yii\grid\GridView;
use yii\helpers\Html;

?>

<h2>Customers</h2>
<?= GridView::widget( [
		'dataProvider' => $dataProvider,
		'columns'      => [
				'id',
				'name',
				'surname',
				'phone_number',
				[
						'header'  => 'Reservations',
						'content' => function ( $model, $key, $index, $column ){
							return Html::a( 'Reservations',
									[
											'reservations/grid',
											'Reservation[customer_id]' => $model->id
									] );
						}
				],
				[
						'class'    => 'yii\grid\ActionColumn',
						'template' => '{delete}',
						'header'   => 'Actions',
				],
		],
] )
?>