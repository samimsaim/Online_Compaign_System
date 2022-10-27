<script src="<?=base_url()?>../assets/ckeditor/ckeditor.js" type="text/javascript"></script>
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
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">اضافه کردن بیوگرافی</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/mainPageController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
              

            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/KandidController/addBio" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                     <label class="col-md-3 control-label" for="form_control_1">بیوگرافی</label>
                     <div class="col-md-9">
                     <textarea class="ckeditor" name="biography" rows="15"></textarea>
                     <div class="form-control-focus"> </div>
                    <span class="help-block">Some help goes here...</span>
                     <br>
                    <br>
                    <br>
                    </div>

                        <label class="col-md-3 control-label" style="font-weight: bold">عکس کاندید</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                
                            </div>
                    </div>
                     
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                                <a href="<?=base_url()?>index.php/mainPageController/index" class="btn default">لغو</a>
                                <input type="submit" name="AddBio" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
