<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/UsersController/index">مدیریت استفاده کننده ها</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن کاربر</b>
                </li>
            </ul>
        </div>
        <div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن کاربر</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/usersController/kandid" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <?php foreach ($data as $row) { } ?>
            <div class="portlet-body form">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/usersController/AddKandid" enctype="multipart/form-data">
                    <div class="form-body">
                    
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6  <?php if (!empty($error_pos)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold;">نوعیت استفاده کننده</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="position" value="<?php if (!empty($Field_data['position'])) echo $Field_data['position']; ?>" placeholder="کارمند اداری">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_pos)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_pos?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_username)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نام کاربری</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="username" value="<?php if (!empty($Field_data['username'])) echo $Field_data['username']; ?>" placeholder="administrator">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_username)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_username?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_pass)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">رمز عبور</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" value="<?php if (!empty($Field_data['password'])) echo $Field_data['password']; ?>" placeholder="رمز عبور">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_pass)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_pass?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_c_pass)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تائید رمز عبور</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="confirm_password" placeholder="تائید رمز عبور">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_c_pass)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_c_pass?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_privilege)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">محدودیت</label>
                            <div class="col-md-9">
                                <select class="form-control" name="privilege">
                                    <option <?php if(!empty($Field_data['privilege']) && $Field_data['privilege'] == 0) echo ' selected '?> value="0">انتخاب محدودیت</option>
                                    <option <?php if(!empty($Field_data['privilege']) && $Field_data['privilege'] == 'admin') echo ' selected '?> value="2">کاندید</option>
                                    <option <?php if(!empty($Field_data['privilege']) && $Field_data['privilege'] == 'guest') echo ' selected '?> value="3">مردم</option>
                                    <option <?php if(!empty($Field_data['privilege']) && $Field_data['privilege'] == 'guest') echo ' selected '?> value="1">میر</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_privilege)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_privilege?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$row->kan_id?>">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/usersController/kandid" class="btn default">لغو</a>
                                <input type="submit" name="addUser" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>