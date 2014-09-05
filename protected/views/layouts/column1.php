<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main');
if(!Yii::app()->user->isGuest) { ?>
<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="#" class="list-group-item active"><b>Quản lý bảng</b></a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?id=<?php echo Yii::app()->user->id;?>" class="list-group-item">Bảng của bạn </a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/create" class="list-group-item">Tạo bảng mới</a>
        </div>
        <div class="list-group">
            <span class="list-group-item active"><b>CATEGORY</b></span>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index" class="list-group-item">Tất cả</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=1" class="list-group-item">Board AOE</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=4" class="list-group-item">Board Coding</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=2" class="list-group-item">Board Flappy Bird</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=3" class="list-group-item">Board Football</a>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item active"><b>Quản lý tài khoản</b></a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/updatePassword/<?php echo Yii::app()->user->id;?>" class="list-group-item">Đổi mật khẩu</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/updateEmail/<?php echo Yii::app()->user->id;?>" class="list-group-item">Đổi email</a>
        </div>
    </div>

    <div class="col-md-9">
        <div id="content">
            <?php echo $content;?>
        </div>
    </div>
</div> <?php }else{ ?>
 <div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <span class="list-group-item active"><b>CATEGORY</b></span>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=1" class="list-group-item">Board AOE</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=4" class="list-group-item">Board Coding</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=2" class="list-group-item">Board Flappy Bird</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/board/index?type_id=3" class="list-group-item">Board Football</a>
        </div>
    </div>

    <div class="col-md-9">
        <div id="content">
            <?php
                echo $content;
            ?>
        </div>
    </div>
</div>
<?php } $this->endContent(); ?>