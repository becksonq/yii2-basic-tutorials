<?php
/**
 * User: Администратор
 * Date: 29.09.2017
 * Time: 23:56
 */
?>

<h2>Rooms from dbSqlite</h2>
<table class="table">
	<tr>
		<th>Floor</th>
		<th>Room number</th>
		<th>Has conditioner</th>
		<th>Has tv</th>
		<th>Has phone</th>
		<th>Available from</th>
		<th>Available from (db format)</th>
		<th>Price per day</th>
		<th>Description</th>
	</tr>
	<?php foreach ( $sqliteModels as $item ) { ?>
		<tr>
			<td><?php echo $item['floor'] ?></td>
			<td><?php echo $item['room_number'] ?></td>
			<td><?php echo Yii::$app->formatter->asBoolean( $item['has_conditioner'] ) ?></td>
			<td><?php echo Yii::$app->formatter->asBoolean( $item['has_tv'] ) ?></td>
			<td><?php echo ( $item['has_phone'] == 1 ) ? 'Yes' : 'No'
				?></td>
			<td><?php echo Yii::$app->formatter->asDate( $item['available_from'] ) ?></td>
			<td><?php echo Yii::$app->formatter->asDate( $item['available_from'], 'php:Y-m-d' ) ?></td>
			<td><?php echo Yii::$app->formatter->asCurrency( $item['price_per_day'], 'EUR' ) ?></td>
			<td><?php echo $item['description'] ?></td>
		</tr>
	<?php } ?>
</table>
