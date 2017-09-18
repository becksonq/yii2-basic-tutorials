<?php
/**
 * User: Администратор
 * Date: 17.09.2017
 * Time: 23:57
 */
echo $this->context->renderPartial('_copyright');
?>

<h2>News Item Detail</h2>
<br />
Title: <b><?php echo $item['title'] ?></b>
<br />
Date: <b><?php echo $item['date'] ?></b>