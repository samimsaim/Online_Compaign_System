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
                    <a href="<?=base_url()?>index.php/peopleController/index">مردم</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن مردم</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه مردم</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/PeopleController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/PeopleController/CheckPeople" enctype="multipart/form-data">
                    <div class="form-body">
                  
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نام *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?php if (!empty($Field_data['name'])) echo $Field_data['name']; ?>" placeholder="احمد">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_lname)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تخلص *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lastname" value="<?php if (!empty($Field_data['lastname'])) echo $Field_data['lastname']; ?>" placeholder="محمود">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_lname)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_lname?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                    
                        <div class="row">
                        <div class="form-group form-md-line-input  col-md-6 <?php if (!empty($error_email)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ایمل آدرس *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="<?php if (!empty($Field_data['email'])) echo $Field_data['email']; ?>" placeholder="kpu@example.com">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_email)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_phone)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">شماره *</label>
                            <div class="col-md-9">
                                <input type="tel" class="form-control" name="phone" value="<?php if (!empty($Field_data['phone'])) echo $Field_data['phone']; ?>" placeholder="07xx xxx xxx">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_phone)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_phone?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                     
                    <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_gender)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">جنسیت *</label>
                            <div class="col-md-9">
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
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_photo)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">عکس کاربر</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_photo?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <a href="<?=base_url()?>index.php/PeopleController/index" class="btn default">لغو</a>
                                <input type="submit" name="AddPeo" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
