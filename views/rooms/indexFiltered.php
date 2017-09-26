<?php
/**
 * Created by PhpStorm.
 * User: Администратор_
 * Date: 25.09.2017
 * Time: 21:47
 */

use yii\helpers\Url;

$operators = [ '=', '<=', '>=' ];
$sf = $searchFilter;
?>

<form method="post" action="<?php echo Url::to( [ 'rooms/indexfiltered' ] ) ?>">

	<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>

	<div class="row">

		<?php $operator = $sf[ 'floor' ][ 'operator' ]; ?>
		<?php $value = $sf[ 'floor' ][ 'value' ]; ?>

		<div class="col-md-3">
			<label>Floor</label>
			<br/>
			<select name="SearchFilter[floor][operator]">
				<?php foreach ( $operators as $op ) { ?>
					<?php $selected = ( $operator == $op ) ? 'selected' : ''; ?>
					<option value="<?= $op ?>"
							<?= $selected ?>><?= $op ?></option>
				<?php } ?>=
			</select>
			<input type="text" name="SearchFilter[floor][value]" value="<?= $value ?>"/>
		</div>
		<?php $operator = $sf[ 'room_number' ][ 'operator' ]; ?>
		<?php $value = $sf[ 'room_number' ][ 'value' ]; ?>
		<div class="col-md-3">
			<label>Room Number</label>
			<br/>
			<select name="SearchFilter[room_number][operator]">
				<?php foreach ( $operators as $op ) { ?>
					<?php $selected = ( $operator == $op ) ? 'selected' : ''; ?>
					<option value="<?= $op ?>"
							<?= $selected ?>><?= $op ?></option>
				<?php } ?>
			</select>
			<input type="text" name="SearchFilter[room_number][value]" value="<?= $value ?>"/>
		</div>
		<?php $operator = $sf[ 'price_per_day' ][ 'operator' ]; ?>
		<?php $value = $sf[ 'price_per_day' ][ 'value' ]; ?>
		<div class="col-md-3">
			<label>Price per day</label>
			<br/>
			<select name="SearchFilter[price_per_day][operator]">
				<?php foreach ( $operators as $op ) { ?>
					<?php $selected = ( $operator ==
							$op ) ? 'selected' : ''; ?>
					<option value="<?= $op ?>"
							<?= $selected ?>><?= $op ?></option>
				<?php } ?>
			</select>
			<input type="text"
						 name="SearchFilter[price_per_day][value]"
						 value="<?= $value ?>"/>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-3">
			<input type="submit" value="filter" class="btn btnprimary"/>
			<input type="reset" value="reset" class="btn btnprimary"/>
		</div>
	</div>
</form>
