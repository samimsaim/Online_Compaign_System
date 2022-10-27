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
                    <span class="caption-subject bold uppercase">اضافه کردن کاندید</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/mainPageController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
            <?php foreach ($result as $value) { ?>
            <div class="portlet-body form" style="margin-right: 20px;">
                <form class="form-horizontal" method="post" action="<?=base_url()?>index.php/KandidController/CheckEditKandid" enctype="multipart/form-data">
                    <div class="form-body">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_election_num)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold;">شماره انتخاباتی*</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="election_num" value="<?=$value->kan_number?>" placeholder="۳۲۴۵">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_election_num)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_election_num?></span>
                                <?php }?>
                            </div>
                            
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_page_num)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نمبر صفحه*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="page_num" value="<?=$value->kan_page_number?>" placeholder="۳">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_page_num)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_page_num?></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نام *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="<?=$value->kan_name?>" placeholder="احمد">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_last_name)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">تخلص *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lastname" value="<?=$value->kan_last_name?>" placeholder="محمود">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_last_name)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_last_name?></span>
                                <?php }?>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_kandid_of_typ)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نوعیت کاندید *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="kandidoftyp" value="<?=$value->kan_typeOfkan?>" placeholder="مستقل">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_kandid_of_typ)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_kandid_of_typ?></span>
                                <?php }?>
                            </div>
                        </div>
                               <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_kandid_typ)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نوعیت کاندید *</label>
                            <div class="col-md-9">
                                <select class="form-control" name="kandidtyp">
                                    <option <?php if(!empty($Field_data['kandidtyp']) && $Field_data['kandidtyp'] == 0) echo ' selected '?> value="<?=$value->kan_type?>"><?=$value->kan_type?></option>
                                    <option <?php if(!empty($Field_data['kandidtyp']) && $Field_data['kandidtyp'] == 1) echo ' selected '?> value="ریاست جمهوری">ریاست جمهوری</option>
                                    <option <?php if(!empty($Field_data['kandidtyp']) && $Field_data['kandidtyp'] == 2) echo ' selected '?> value="پارلمان">پارلمان</option>
                                    <option <?php if(!empty($Field_data['kandidtyp']) && $Field_data['kandidtyp'] == 3) echo ' selected '?> value="شورای ولایتی">شورای ولایتی</option>
                                    
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_kandid_typ)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_kandid_typ?></span>
                                <?php }?>
                            </div>
                        </div>
                         </div>
                        <div class="row">
                        <div class="form-group form-md-line-input  col-md-6 <?php if (!empty($error_email)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ایمل آدرس *</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="<?=$value->kan_email?>" placeholder="kpu@example.com">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_email)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_email?></span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_phone)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">شماره *</label>
                            <div class="col-md-9">
                                <input type="tel" class="form-control" name="phone" value="<?=$value->kan_phone?>" placeholder="07xx xxx xxx">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_phone)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_phone?></span>
                                <?php }?>
                            </div>
                        </div>
                            </div>
                        <div class="row">
                     <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_logon)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">Logon*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="logon" value="<?=$value->kan_slogon?>" placeholder="">
                                <div class="form-control-focus"></div>
                                <?php if(!empty($error_logon)){?>
                                <span class="help-block-error" style="color:red;"><?=$error_logon?></span>
                                <?php }?>
                            </div>
                        </div>

                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_gender)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">جنسیت *</label>
                            <div class="col-md-9">
                                <select class="form-control" name="gender">
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 0) echo ' selected '?> value="<?=$value->gender?>"><?php if($value->gender=='m')
                                    echo "مرد"; else echo "زن" ?></option>
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 'm') echo ' selected '?> value="m">مرد</option>
                                    <option <?php if(!empty($Field_data['gender']) && $Field_data['gender'] == 'f') echo ' selected '?> value="f">زن</option>
                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_gender)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_gender?></span>
                                <?php }?>
                            </div>
                        </div>
                         <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_gender)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">ولایت*</label>
                            <div class="col-md-9">
                                    <select class="form-control" name="province">
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 0) echo ' selected '?> value="<?=$value->kan_province?>"><?=$value->kan_province?></option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 'm') echo ' selected '?> value="کابل">کابل</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 'f') echo ' selected '?> value="پروان">پروان</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 0) echo ' selected '?> value="تخار">تخار</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 'm') echo ' selected '?> value="کندز">کندز</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 'f') echo ' selected '?> value="بامیان">بامیان</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 0) echo ' selected '?> value="بدخشان">بدخشان</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 'm') echo ' selected '?> value="غزنی">غزنی </option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 'f') echo ' selected '?> value="کندهار">کندهار</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 0) echo ' selected '?> value="بلخ">بلخ</option>
                                    <option <?php if(!empty($Field_data['province']) && $Field_data['province'] == 'm') echo ' selected '?> value="پنجشیر">پنجشیر</option>

                                </select>
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_gender)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_gender?></span>
                                <?php }?>
                            </div>
                        </div>
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
                            </div>
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6 <?php if (!empty($error_tz_photo)) echo 'has-error' ?>">
                            <label class="col-md-3 control-label" style="font-weight: bold">نشان انتخاباتی</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="logo_photo" placeholder="عکس کاربر">
                                <div class="form-control-focus"> </div>
                                <?php if(!empty($error_tz_photo)){?>
                                    <span class="help-block-error" style="color:red;"><?=$error_tz_photo?></span>
                                <?php }?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <input type="hidden" name="kan_id" value="<?=$value->kan_id?>">
                                <input type="hidden" name="logo_path" value="<?=$value->kan_cover?>">
                                <input type="hidden" name="phtot_path" value="<?=$value->kan_profile_photo?>">
                                <a href="<?=base_url()?>index.php/mainPageController/index" class="btn default">لغو</a>
                                <input type="submit" name="editKan" class="btn blue" value="ذخیره"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
