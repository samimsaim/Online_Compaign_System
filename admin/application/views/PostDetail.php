<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
             
                <li>
                    <b>نمایش پوست</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات پوست</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/mainPageController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <tbody>
                                        <?php foreach($data as $row){?>
                                    <tr> 
                                        <td><?=ucfirst($row->post_details)?></td> 
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>نظریات</h3>
                                     <?php foreach ($result as $value) { ?>
                                     <ul> 
                                     <li style="list-style-type: none; "> <?=$value->com_mark?><a href="<?=base_url()?>index.php/kandidController/DeleteCommen?id=<?=$value->com_id?>">&nbsp;&nbsp;حذف</a></li> 
                                     </ul>
                                    <?php } ?> 
                                     </td>
                                    </tr>
                                     <?php }?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="col-md-3">
                        <br/>
                        <?php 
                        if(!empty($image)):
                        foreach ($image as $images) {} ?>
                        <span class="thumbnail">
                            <img src="<?php  echo base_url().$images->image;?>" alt="<?php echo base_url().$images->image." photo"?>">
                        </span>
                    <?php endif;?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>







