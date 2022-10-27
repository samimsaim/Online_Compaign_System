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
                    <a href="<?=base_url()?>index.php/studentController/index">کاندیدان</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>اضافه کردن کاندید</b>
                </li>
            </ul>
        </div>
        <?php foreach ($data as $row) {?>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن کاندید</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/PeopleController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/PeopleController/CheckEditPeople" enctype="multipart/form-data">
                    <div class="form-body">
                  
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نام *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?=$row->po_name?>" placeholder="احمد">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_last_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تخلص *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lastname" value="<?=$row->po_last_name?>" placeholder="محمود">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_last_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_last_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                    
                        <div class="row">
                        <div class="form-group form-md-line-input  col-md-6 <?php if (!empty($error_email)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ایمل آدرس *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="<?=$row->po_email?>" placeholder="kpu@example.com">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_email)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_phone)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">شماره *</label>
                            <div class="col-md-9">
                                <input type="tel" class="form-control" name="phone" value="<?=$row->po_phone?>" placeholder="07xx xxx xxx">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_phone)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_phone?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                     
                    <div class="row">
                        
                       <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_photo)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">عکس کاندید</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_photo?></span>
                                <?php }?>
                            </div>
                        </div>
                       <?php }?>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <input type="hidden" name="people_id" value="<?=$row->po_id?>">
                                <a href="<?=base_url()?>index.php/PeopleController/index" class="btn default">لغو</a>
                                <input type="submit" name="EditPeople" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
