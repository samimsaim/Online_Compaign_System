l<!-- BEGIN CONTENT -->
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
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن کاربر</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/usersController/peopl" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            
              <?php foreach ($data as $row ) {}?>
              <?php foreach ($result as $key ) {}?>
              
            <div class="portlet-body form">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/usersController/checkEditPeople" enctype="multipart/form-data">
                    <div class="form-body">
                      
                        <div class="form-group form-md-line-input <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">اسم</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="<?=$row->po_name?>" placeholder="احمد">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_name)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_lname)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">تخلص</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="last_name" value="<?=$row->po_last_name?>" placeholder="احمدی">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_lname)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_lname?></span>
                                <?php }?>
                            </div>
                        </div>
                     
                        <div class="form-group form-md-line-input <?php if (!empty($error_email)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">ایمل آدرس</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" value="<?=$row->po_email?>" placeholder="kpu@example.com">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_email)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                <?php }?>
                            </div>
                        </div>
                      
                        <div class="form-group form-md-line-input <?php if (!empty($error_pass)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">رمز عبور</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password" value="<?php if (!empty($Field_data['password'])) echo $Field_data['password']; ?>" placeholder="رمز عبور">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_pass)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_pass?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_c_pass)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">تائید رمز عبور</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="confirm_password" placeholder="تائید رمز عبور">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_c_pass)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_c_pass?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_gender)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">جنسیت</label>
                            <div class="col-md-8">
                                <select class="form-control" name="gender">
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 0) echo ' selected '?> value="0">انتخاب جنسیت</option>
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 'm') echo ' selected '?> value="m">مرد</option>
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 'f') echo ' selected '?> value="f">زن</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_gender)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_gender?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input <?php if (!empty($error_photo)) echo 'has-error' ?>">
                            <label class="col-md-2 control-label" style="font-weight: bold">عکس کاربر</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_photo?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <input type="hidden" name="id" value="<?=$row->po_id?>">
                                <a href="<?=base_url()?>index.php/usersController/index" class="btn default">لغو</a>
                                <input type="submit" name="editAdmin" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>