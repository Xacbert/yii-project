<?php

    use yii\helpers\Html;

    $this->title = 'Register';
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">REGISTRO</div>
                <div class="panel-body">
                    <?= Html::beginForm(['user/create', null], 'post', ['class' => 'form-horizontal', 'id'=>'UserCreateFrm']) ?>
                        <div class="form-group">
                            <label for="inputUser" class="col-sm-2 control-label">User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputUser" placeholder="User" name="user">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" placeholder="Password" name="pwd">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Alta</button>
                            </div>
                        </div>
                    <?= Html::endForm() ?>
                </div>
            </div>
        </div>
    </div>



</div>
