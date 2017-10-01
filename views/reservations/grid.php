<?php
/**
 * User: Администратор
 * Date: 30.09.2017
 * Time: 23:36
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\GridViewReservation;

?>
	<h2>Reservations</h2>

<?php
$sumOfPricesPerDay = 0;
$averagePricePerDay = 0;

if ( count( $dataProvider->getModels() ) > 0 ) {
	foreach ( $dataProvider->getModels() as $m ) {
		$sumOfPricesPerDay += $m->price_per_day;
	}
	$averagePricePerDay = $sumOfPricesPerDay / sizeof( $dataProvider->getModels() );
}

$roomsFilterData = ArrayHelper::map( app\models\Room::find()->all(), 'id',
		function ( $model, $defaultValue ){
			return sprintf( 'Floor: %d - Number: %d', $model->floor, $model->room_number );
		} );
?>

<?= GridViewReservation::widget( [
		'dataProvider' => $dataProvider,
		'filterModel'  => $searchModel,
		'showFooter'   => true,
		'columns'      => [
				'id',
				[
						'header'  => 'Room',
						'filter'  => Html::activeDropDownList( $searchModel,
								'room_id', $roomsFilterData, [ 'prompt' => '--- all' ] ),
						'content' => function ( $model ){
							return $model->room->floor;
						}
				],
				[
						'header'    => 'Customer',
						'attribute' => 'customer.surname',
				],
				[
						'attribute' => 'price_per_day',
						'footer' => sprintf('Average: %0.2f', $resultQueryAveragePricePerDay)
				],
				'date_from',
				'date_to',
				'reservation_date',
				[
						'class'    => 'yii\grid\ActionColumn',
						'template' => '{delete}',
						'header'   => 'Actions',
				],

		],
] ) ?>