<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">LOGIN</div>
                <div class="panel-body">
                    <?= Html::beginForm(['user/login', null], 'post', ['class' => 'form-horizontal', 'id'=>'UserLoginFrm']) ?>
                    <div class="form-group">
                        <label for="inputUser" class="col-sm-2 control-label">User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputUser" placeholder="User" name="user">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pwd">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </div>
                    <?= Html::endForm() ?>
                </div>
            </div>
        </div>
    </div>
    <?= Html::a('Register', ['/user/register']) ?>
</div>

<?php
    Modal::begin([
        'id' => 'ModalYii',
        'header' => '<h4 class="modal-title">Error login</h4>',
        'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
    ]);

    echo '<div class="text-center"><p>Wrong user or password</p></div>';

    Modal::end();

?>