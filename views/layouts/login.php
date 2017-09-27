<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

  AppAsset::register($this);
  
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>


    <footer class="footer">
        <div class="container" >
                        <p class="pull-right" style="color: black;">&copy; Made By Michi Ing. <?= date('Y') ?></p>
        </div>
    </footer>
<?php $this->endBody(); ?>
</body>
    <!-- SB Admin Scripts - Include with every page -->


</html>
<?php $this->endPage() ?>
