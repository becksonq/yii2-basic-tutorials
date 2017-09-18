<?php
echo $this->context->renderPartial('_copyright');
?>

<h1>news/index</h1>

<table>
	<tr>
		<th>Title</th>
		<th>Date</th>
	</tr>
	<?php
	/** @var $newsList app\controllers\NewsController */
	foreach ( $newsList as $item ) { ?>
		<tr>

			<th>
				<a href="<?php echo Yii::$app->urlManager->createUrl( [ 'news/item-detail', 'id' => $item['id'] ] )
				?>"><?php echo $item['title'] ?></a>
			</th>

			<th>
				<?php echo Yii::$app->formatter->asDatetime( $item['date'], "php:d/m/Y" ); ?>
			</th>
		</tr>
	<?php } ?>
</table>
