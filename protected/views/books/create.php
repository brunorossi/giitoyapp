<?php
$this->breadcrumbs=array(
	'Books'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Books', 'url'=>array('index')),
	array('label'=>'Manage Books', 'url'=>array('admin')),
);
?>

<h1>Create Books</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>