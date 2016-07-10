<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-6">
            <h2><i class="fa fa-desktop lblue"></i><?=$website_info['title']?></h2>
        </div>
        <div class="col-md-3 hidden-sm hidden-xs pull-right">
            <div class="head-user dropdown pull-right">
                <?php if($this->session->userdata('user_login_as')){ ?>
                    Login As <?=$getData['user_info']->name?> | <a href="<?=backend_url('user/logout_as')?>">Log Out</a>
                <?php }else{ ?>
                    <a href="#" data-toggle="dropdown" id="profile">
                        <img src="<?=$getData['user_info']->avatar?>" alt="<?=$getData['user_info']->name?>" class="img-responsive img-circle"/>
                        <?=$getData['user_info']->name?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profile">
                        <li><a href="<?=backend_url('user/profile')?>">View/Edit Profile</a></li>
                        <li><a href="<?=base_url()?>" target="_blank">Homepage</a></li>
                        <li><a href="<?=backend_url('user/logout')?>">Sign Out</a></li>
                    </ul>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>