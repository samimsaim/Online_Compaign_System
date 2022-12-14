<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Main Font -->
    <script src="<?=base_url();?>assets/js/jquery-3.2.1.js"></script>
    <script src="<?=base_url();?>../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/Bootstrap/dist/css/bootstrap-grid.css">
    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/main.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/fonts.min.css">
</head>
<body> 

<div class="fixed-sidebar">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

        <a href="<?=base_url()?>" class="logo">
            <div class="img-wrap">
                <img src="<?=base_url()?>assets/img/logo.png" alt="Olympus">
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="OPEN MENU"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/indexController">
                        <svg class="olymp-albums-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="HOME Page"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/kandidController">
                        <svg class="olymp-settings-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="KANDID PAGE"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/indexController/contactUs">
                        <svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CONTACT US"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use></svg>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/indexController/aboutUs">
                        <svg class="olymp-happy-sticker-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="ABOUT US"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
        <a href="<?=base_url()?>" class="logo">
            <div class="img-wrap">
                <img src="<?=base_url()?>assets/img/logo.png" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">Election</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        <span class="left-menu-title">Collapse Menu</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="HOME PAGE"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
                        <span class="left-menu-title">Home Page</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/kandidController">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="KANDID PAGE"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                        <span class="left-menu-title">Kandid Page</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/indexController/contactUs">
                        <svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CONTACT US"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
                        <span class="left-menu-title">Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/indexController/aboutUs">
                        <svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="ABOUT US"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use></svg>
                        <span class="left-menu-title">About Us</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="fixed-sidebar fixed-sidebar-responsive">

    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
        <a href="#" class="logo js-sidebar-open">
            <img src="<?=base_url()?>assets/img/logo.png" alt="Olympus">
        </a>

    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
        <a href="#" class="logo">
            <div class="img-wrap">
                <img src="<?=base_url()?>assets/img/logo.png" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">Election</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <?php if(isset($_SESSION['user_id'])):?>
            <div class="control-block">
                <div class="author-page author vcard inline-items">
                    <div class="author-thumb">
                        <img alt="author" src="<?=base_url().$_SESSION['photo']?>" class="avator" style="width:36px; height:36px;">
                        <span class="icon-status online"></span>
                    </div>
                    <a href="http://localhost:88/kandid/admin/" class="author-name fn">
                        <div class="author-title">
                            <?=ucfirst($_SESSION['name'].' '.ucfirst($_SESSION['last_name']));?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                        </div>
                        <span class="author-subtitle"><?=ucfirst($_SESSION['level']);?></span>
                    </a>
                </div>
            </div>
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">MAIN SECTIONS</h6>
            </div>
        <?php endif;?>
        <?php if(!isset($_SESSION['user_id'])):?>
            <div class="control-block">
                <div class="author-page author vcard inline-items">
                    <div class="author-thumb">
                        <img alt="author" src="<?=base_url()?>../assets/img/male.jpg" class="avator" style="width:36px; height:36px;">
                    </div>
                    <a href="<?=base_url()?>index.php/indexController/login" class="author-name fn">
                        <div class="author-title">Sign In</div>
                    </a>
                </div>
            </div>
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">MAIN SECTIONS</h6>
            </div>
        <?php endif;?>
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        <span class="left-menu-title">Collapse Menu</span>
                    </a>
                </li>
                <li>
                    <a href="mobile-index.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
                        <span class="left-menu-title">Newsfeed</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-28-YourAccount-PersonalInformation.html">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                        <span class="left-menu-title">Fav Pages Feed</span>
                    </a>
                </li>
                <li>
                    <a href="mobile-29-YourAccount-AccountSettings.html">
                        <svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
                        <span class="left-menu-title">Friend Groups</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-30-YourAccount-ChangePassword.html">
                        <svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MUSIC&PLAYLISTS"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use></svg>
                        <span class="left-menu-title">Music & Playlists</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-31-YourAccount-HobbiesAndInterests.html">
                        <svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="WEATHER APP"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-weather-icon"></use></svg>
                        <span class="left-menu-title">Weather App</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-32-YourAccount-EducationAndEmployement.html">
                        <svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
                        <span class="left-menu-title">Calendar and Events</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-33-YourAccount-Notifications.html">
                        <svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-badge-icon"></use></svg>
                        <span class="left-menu-title">Community Badges</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-34-YourAccount-ChatMessages.html">
                        <svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Friends Birthdays"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use></svg>
                        <span class="left-menu-title">Friends Birthdays</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-35-YourAccount-FriendsRequests.html">
                        <svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Account Stats"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-stats-icon"></use></svg>
                        <span class="left-menu-title">Account Stats</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Manage Widgets"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use></svg>
                        <span class="left-menu-title">Manage Widgets</span>
                    </a>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">YOUR ACCOUNT</h6>
            </div>

            <ul class="account-settings">
                <li>
                    <a href="#">

                        <svg class="olymp-menu-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>

                        <span>Create Fav Page</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-logout-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

                        <span>Log Out</span>
                    </a>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">About Olympus</h6>
            </div>

            <ul class="about-olympus">
                <li>
                    <a href="#">
                        <span>Terms and Conditions</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>FAQs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Careers</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>

<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right">
    <div class="fixed-sidebar-right sidebar--small" id="sidebar-right">
    <?php
        $this->db->select("kan_id,kan_profile_photo,kan_name,kan_last_name");
        $this->db->from("kandid");
        $kandid = $this->db->get()->result();
    ?>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="chat-users">
                <?php foreach($kandid as $row):?>
                <li class="inline-items js-chat-open">
                    <div class="author-thumb">
                        <img alt="<?=$row->kan_name;?>" src="<?=base_url().$row->kan_profile_photo;?>" class="avatar" style="width:36px; height:36px;">
                        <span class="icon-status online"></span>
                    </div>
                </li>
            <?php endforeach;?>
            </ul>
        </div>

        <div class="search-friend inline-items">
            <a href="#" class="js-sidebar-open">
                <svg class="olymp-menu-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
            </a>
        </div>

        <a href="#" class="olympus-chat inline-items js-chat-open">
            <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
        </a>

    </div>

    <div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

        <div class="mCustomScrollbar" data-mcs-theme="dark">

            <div class="ui-block-title ui-block-title-small">
                <a href="#" class="title">Candidate list</a>
                <a href="#">Settings</a>
            </div>

            <ul class="chat-users">
            <?php foreach($kandid as $row1):?>
                <li class="inline-items js-chat-open">

                    <div class="author-thumb">
                        <img alt="<?=$row1->kan_name;?>" src="<?=base_url().$row1->kan_profile_photo;?>" class="avatar" style="width:36px; height:36px;">
                        <span class="icon-status online"></span>
                    </div>

                    <div class="author-status">
                        <a href="#" class="h6 author-name"><?=$row1->kan_name.' '.$row1->kan_last_name;?></a>
                        <span class="status">ONLINE</span>
                    </div>

                    <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

                        <ul class="more-icons">
                            <li>
                                <svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                            </li>

                            <li>
                                <svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
                            </li>

                            <li>
                                <svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                            </li>
                        </ul>

                    </div>
                </li>
            <?php endforeach;?>


        </div>

        <div class="search-friend inline-items">
            <form class="form-group" >
                <input class="form-control" placeholder="Search Condidate..." value="" type="text">
            </form>
            <a href="#" class="js-sidebar-open">
                <svg class="olymp-close-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>
        </div>

        <a href="#" class="olympus-chat inline-items js-chat-open">

            <h6 class="olympus-chat-title">CANDIDATE CHAT</h6>
            <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
        </a>
    </div>
</div>

<!-- ... end Fixed Sidebar Right -->


<!-- Fixed Sidebar Right-Responsive -->

<div class="fixed-sidebar right fixed-sidebar-responsive">

    <div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

        <a href="#" class="olympus-chat inline-items js-chat-open">
            <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
        </a>

    </div>

</div>

<!-- ... end Fixed Sidebar Right-Responsive -->

<!-- Header-BP -->
<header class="header" id="site-header">
  
    <div class="page-title">
        <h6>
            <?php
                if(isset($title)){
                    echo $title;
                }else{
                    echo "HOME PAGE";
                }
            ?>
        </h6>
    </div>

    <div class="header-content-wrapper">
        <form class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
                <input class="form-control js-user-search" placeholder="Search here condidate..." type="text">
                <button>
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                </button>
            </div>
        </form>
        <?php if(!isset($_SESSION['user_id'])): ?>
        <div class="control-block">
            <div class="author-page author vcard inline-items more">
                
                <div class="author-thumb">
                    <img alt="author" src="<?=base_url()?>../assets/img/male.jpg" class="avatar" style="width:36px; height:36px;"> 
                </div>
                <a href="<?=base_url()?>index.php/indexController/login">
                <div class="author-title">Sign In</div>
                </a>
            </div>
        </div>
    <?php endif;?>

        <?php if(isset($_SESSION['user_id'])): ?>
        <div class="control-block">
            <div class="control-icon more has-items">
                <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                <div class="label-avatar bg-blue">6</div>

                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">FRIEND REQUESTS</h6>
                        <a href="#">Find Friends</a>
                        <a href="#">Settings</a>
                    </div>

                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list friend-requests">
                            <li>
                                <div class="author-thumb">
                                    <img src="<?=base_url();?>assets/img/avatar55-sm.jpg" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">Tamara Romanoff</a>
                                    <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
                                </div>
                                <span class="notification-icon">
                                    <a href="#" class="accept-request">
                                        <span class="icon-add without-text">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                        </span>
                                    </a>

                                    <a href="#" class="accept-request request-del">
                                        <span class="icon-minus">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                        </span>
                                    </a>

                                </span>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <a href="#" class="view-all bg-blue">Check all your Events</a>
                </div>
            </div>

            <div class="control-icon more has-items">
                <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                <div class="label-avatar bg-purple">2</div>

                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Chat / Messages</h6>
                        <a href="#">Mark all as read</a>
                        <a href="#">Settings</a>
                    </div>

                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list chat-message">
                            <li class="message-unread">
                                <div class="author-thumb">
                                    <!-- <img src="<?=base_url();?>assets/img/avatar59-sm.jpg" alt="author"> -->
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">Diana Jameson</a>
                                    <span class="chat-message-item">Hi James! It???s Diana, I just wanted to let you know that we have to reschedule...</span>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                </div>
                                <span class="notification-icon">
                                    <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                                </span>
                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <a href="#" class="view-all bg-purple">View All Messages</a>
                </div>
            </div>

            <div class="control-icon more has-items">
                <svg class="olymp-thunder-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>

                <div class="label-avatar bg-primary">8</div>

                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Notifications</h6>
                        <a href="#">Mark all as read</a>
                        <a href="#">Settings</a>
                    </div>

                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list">
                            <li>
                                <div class="author-thumb">
                                    <img src="<?=base_url();?>assets/img/avatar62-sm.jpg" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                </div>
                                    <span class="notification-icon">
                                        <svg class="olymp-comments-post-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                    </span>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <svg class="olymp-little-delete"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <a href="#" class="view-all bg-primary">View All Notifications</a>
                </div>
            </div>

            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img alt="author" src="<?=base_url().$_SESSION['photo']?>" class="avatar" style="width:36px; height:36px;">
                    <span class="icon-status online"></span>
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Your Account</h6>
                            </div>

                            <ul class="account-settings">
                            <?php if(isset($_SESSION['level']) && $_SESSION['level'] == "people"){?>
                                <li>
                                    <a href="http://localhost:88/kandid/admin/">
                                        <svg class="olymp-menu-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                                        <span>Profile Settings</span>
                                    </a>
                                </li>
                            <?php }else{ ?>
                                <li>
                                    <a href="<?=base_url()?>index.php/indexController/kandidProfile?id=<?=$_SESSION['user_id']?>">
                                        <svg class="olymp-menu-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                                        <span>Profile Settings</span>
                                    </a>
                                </li>
                            <?php }?>
                                <li>
                                    <a href="<?=base_url()?>index.php/indexController/logout">
                                        <svg class="olymp-logout-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                    <div class="author-title">
                        <?=ucfirst($_SESSION['name']).' '.ucfirst($_SESSION['last_name']);?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                    <span class="author-subtitle"><?=ucfirst($_SESSION['level']);?></span></div>
            </div>
        </div>
    <?php endif;?>
    </div>

</header>

<!-- ... end Header-BP -->


<!-- Responsive Header-BP -->

<header class="header header-responsive" id="site-header-responsive">

    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                        <div class="label-avatar bg-blue">6</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#chat" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                        <div class="label-avatar bg-purple">2</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-thunder-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
                        <div class="label-avatar bg-primary">8</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                    <svg class="olymp-close-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                </a>
            </li>
        </ul>
    </div>

    <!-- Tab panes -->
    <div class="tab-content tab-content-responsive">

        <div class="tab-pane " id="request" role="tabpanel">

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">FRIEND REQUESTS</h6>
                    <a href="#">Find Friends</a>
                    <a href="#">Settings</a>
                </div>
                <ul class="notification-list friend-requests">
                    <li>
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar55-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tamara Romanoff</a>
                            <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
                        </div>
                                    <span class="notification-icon">
                                        <a href="#" class="accept-request">
                                            <span class="icon-add without-text">
                                                <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                            </span>
                                        </a>

                                        <a href="#" class="accept-request request-del">
                                            <span class="icon-minus">
                                                <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                            </span>
                                        </a>

                                    </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar56-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tony Stevens</a>
                            <span class="chat-message-item">4 Friends in Common</span>
                        </div>
                                    <span class="notification-icon">
                                        <a href="#" class="accept-request">
                                            <span class="icon-add without-text">
                                                <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                            </span>
                                        </a>

                                        <a href="#" class="accept-request request-del">
                                            <span class="icon-minus">
                                                <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                            </span>
                                        </a>

                                    </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                    <li class="accepted">
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar57-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">her wall</a>.
                        </div>
                                    <span class="notification-icon">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar58-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Stagg Clothing</a>
                            <span class="chat-message-item">9 Friends in Common</span>
                        </div>
                                    <span class="notification-icon">
                                        <a href="#" class="accept-request">
                                            <span class="icon-add without-text">
                                                <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                            </span>
                                        </a>

                                        <a href="#" class="accept-request request-del">
                                            <span class="icon-minus">
                                                <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                            </span>
                                        </a>

                                    </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                </ul>
                <a href="#" class="view-all bg-blue">Check all your Events</a>
            </div>

        </div>

        <div class="tab-pane " id="chat" role="tabpanel">

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Chat / Messages</h6>
                    <a href="#">Mark all as read</a>
                    <a href="#">Settings</a>
                </div>

                <ul class="notification-list chat-message">
                    <li class="message-unread">
                        <div class="author-thumb">
                            <!-- <img src="img/avatar59-sm.jpg" alt="author"> -->
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Diana Jameson</a>
                            <span class="chat-message-item">Hi James! It???s Diana, I just wanted to let you know that we have to reschedule...</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                        </div>
                                    <span class="notification-icon">
                                        <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                                    </span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar60-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Jake Parker</a>
                            <span class="chat-message-item">Great, I???ll see you tomorrow!.</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                        </div>
                                    <span class="notification-icon">
                                        <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                                    </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <!-- <img src="img/avatar61-sm.jpg" alt="author"> -->
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
                            <span class="chat-message-item">We???ll have to check that at the office and see if the client is on board with...</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
                        </div>
                                        <span class="notification-icon">
                                            <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                                        </span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>

                    <li class="chat-group">
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar11-sm.jpg" alt="author">
                            <img src="<?=base_url();?>assets/img/avatar12-sm.jpg" alt="author">
                            <img src="<?=base_url();?>assets/img/avatar13-sm.jpg" alt="author">
                            <img src="<?=base_url();?>assets/img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
                            <span class="last-message-author">Ed:</span>
                            <span class="chat-message-item">Yeah! Seems fine by me!</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
                        </div>
                                        <span class="notification-icon">
                                            <svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                                        </span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                </ul>

                <a href="#" class="view-all bg-purple">View All Messages</a>
            </div>

        </div>

        <div class="tab-pane " id="notification" role="tabpanel">

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Notifications</h6>
                    <a href="#">Mark all as read</a>
                    <a href="#">Settings</a>
                </div>

                <ul class="notification-list">
                    <li>
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar62-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                        </div>
                                        <span class="notification-icon">
                                            <svg class="olymp-comments-post-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                        </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li class="un-read">
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar63-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
                        </div>
                                        <span class="notification-icon">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                        </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li class="with-comment-photo">
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar64-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                        </div>
                                        <span class="notification-icon">
                                            <svg class="olymp-comments-post-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                        </span>

                        <div class="comment-photo">
                            <img src="<?=base_url();?>assets/img/comment-photo1.jpg" alt="photo">
                            <span>???She looks incredible in that outfit! We should see each...???</span>
                        </div>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar65-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
                        </div>
                                        <span class="notification-icon">
                                            <svg class="olymp-happy-face-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                        </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="<?=base_url();?>assets/img/avatar66-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
                        </div>
                                        <span class="notification-icon">
                                            <svg class="olymp-heart-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                        </span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>
                </ul>

                <a href="#" class="view-all bg-primary">View All Notifications</a>
            </div>

        </div>

        <div class="tab-pane " id="search" role="tabpanel">


                <form class="search-bar w-search notification-list friend-requests">
                    <div class="form-group with-button">
                        <input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
                    </div>
                </form>


        </div>

    </div>
    <!-- ... end  Tab panes -->

</header>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>

<!-- Top Header-Profile -->
