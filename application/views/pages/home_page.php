
<?php
include(APPPATH . 'views/header.php');
?>

<body>
    <?php
    include(APPPATH . 'views/navigation_bar.php');
    include(APPPATH . 'views/topic_side_bar.php');
    $logged_user = $_SESSION['logged_user'];

    ?>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <div class = "container page">
        <div class = "row">
            <div class = "col-md-9 home-container">
                <div class = "col-sm-12 home-container">
                    <!-- HEADER -->
                    <div class = "clearfix content-container" style="border-radius:20px;">
                    <center>
                                <a onmouseenter="playclip()" id="crettop" class ="btn btn-primary buttonsbgcolor" href="#create-topic-modal" data-toggle = "modal" style="margin:1%"><i class = "fa fa-pencil iconin"></i> Create Topic</a>
                                <a onmouseenter="playclip()" id="crettop" class="btn btn-primary buttonsbgcolor" href="<?php echo base_url('topic') ?>" style="margin:1%"><i class = "glyphicon glyphicon-list iconin"></i> Go to Topics</a>                   
                                <!--<a id="crettop" class="btn btn-primary buttonsbgcolor" href="#create-post-modal" data-toggle = "modal">Post to your wall</a>-->
                    </center>
                    </div>
<!--                    <div class = "clearfix content-container" style="border-radius:20px;">

                        <a class="text1color" href = "<?php echo base_url('user/profile/' . $logged_user->user_id); ?>">
                            <img class = "pull-left img-rounded btn btn-link home-prof-pic" src = "<?php echo $logged_user->profile_url ? base_url($logged_user->profile_url) : base_url('images/default.jpg') ?>">
                        </a>
                        <div class = "col-sm-4 home-user-text">
                            <a class = "btn btn-link home-username text1color" href = "<?php echo base_url('user/profile/' . $logged_user->user_id); ?>"><strong><?php echo $logged_user->first_name; ?></strong></a>
                            <i class = "fa fa-caret-right header-arrow"></i> 
                            <div class="home-dropdown dropdown">
                                <button class="btn btn-link dropdown-toggle home-username text1color" type="button" data-toggle="dropdown"><strong>Home</strong>
                                    <i class="caret"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="home">Home</a></li>
                                    <li><a href="topic">Topic</a></li>
                                </ul>
                            </div>
                        </div>
                        
-->                        
                        
<!--                        <a id="crettop" class ="btn btn-primary home-create-btn buttonsbgcolor" href="#create-topic-modal" data-toggle = "modal">Create Topic</a>
                        <input onclick='responsiveVoice.speak("shush rg");' type='button' id="sel" value='🔊 Play' />

                    </div>-->

                    <!-- CONTENT -->
                    <div class = "col-sm-12 content-container" style="border-radius:20px;">
                        <div class = "col-sm-12">
                            <!-- POST PREVIEW -->
                            <?php
                            if (!empty($posts)):
                                foreach ($posts as $post):
                                    ?>
                                    <div class = "col-xs-12 no-padding post-container" style = "margin-bottom: 10px;border-radius:20px;">
                                        <div class = "user-post-heading no-margin" style="border-radius:20px;">
                                            <a class = "btn btn-link no-padding text1color" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                                <strong><?php echo $post->first_name . " " . $post->last_name; ?></strong>
                                            </a> 
                                            <span>posted in</span> 
                                            <a class = "btn btn-link no-padding text1color" href = "<?php echo base_url('topic/view/' . $post->topic_id); ?>">
                                                <strong><?php echo utf8_decode($post->topic_name); ?></strong>
                                            </a>:
                                        </div>

                                        <div class = "col-xs-12 user-post-content no-padding">
                                            <!-- Left -->
                                            <div class = "col-xs-1 text-center no-padding" style = "padding-left: 10px;">
                                                <a class = "btn btn-link no-padding text1color" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                                    <img class = "img-circle" style = "margin: 10px 0px;" width = "65px" height = "65px" src = "<?php echo $post->profile_url ? base_url($post->profile_url) : base_url('images/default.jpg'); ?>"/>
                                                </a>
                                                <button class = "upvote-btn btn btn-link btn-xs" style = "margin-left: 3px;" value = "<?php echo $post->post_id; ?>">
                                                    <span class = "<?php echo $post->vote_type === '1' ? 'upvote-text' : '' ?> glyphicon glyphicon-star vote-text starroll"></span>
                                                </button>
                                                <br>
                                                <span class = "vote-count text-muted" style = "margin-left: 3px;"><?php echo $post->vote_count ? $post->vote_count : '0'; ?></span>
                                                <br>
<!--                                                <button class = "downvote-btn btn btn-link btn-xs" value = "<?php echo $post->post_id; ?>">
                                                    <span class = "<?php echo $post->vote_type === '-1' ? 'downvote-text' : '' ?> fa fa-chevron-down vote-text"></span>
                                                </button>-->
                                            </div>

                                            <!-- Right -->
                                            <div class = "col-xs-11" style = "margin-top: 5px;">
                                                <h4 class = "no-padding no-margin text-muted wrap"><strong><?php echo utf8_decode($post->post_title); ?></strong></h4>
                                                <i class = "text-muted">
                                                    <small>by 
                                                        <a class = "btn btn-link btn-xs no-padding text1color" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                                            <?php echo $post->first_name . " " . $post->last_name ?>
                                                        </a>
                                                    </small>
                                                </i>
                                                <span class = "text-muted"> <i style = "font-size: 21px"><?php echo date("M-d-y", strtotime($post->date_posted)); ?></i></span>
                                                <p class = "home-content-body" style = "border-right: none;"><?php echo utf8_decode($post->post_content); ?></p>
                                            </div>
                                        </div>
                                        <div class = "user-post-footer no-margin text-right" style="border-radius:20px;">
                                            <a class = "btn btn-user-post-footer no-up-down-pad" href = "<?php echo base_url('topic/thread/' . $post->post_id); ?>">View Thread <i class = "fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            else:
                                ?>
                            <h4 class = "text-center text-warning">Your home page looks empty. Try following or creating more topics!</h4>
                                <?php endif; ?>
                        </div>

                    </div>
                </div>
                <!--<span> <img class = "pinwheel" src = "<?php echo base_url('images/Picture1.png'); ?>"/></span>-->
            </div>

            <?php
            
            
            include(APPPATH . 'views/modals/create_topic_modal.php');
            ?>
        </div>
    </div>
    <script>
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {                
                var whistleup = new Audio('<?php echo base_url('images/Slide Whistle up1.mp3'); ?>');
                window.scroll({
                  top: 0,
                  behavior: 'smooth' 
                });
                whistleup.play();
            }
        </script>
        
        <script type="text/javascript" src="<?php echo base_url("/js/search.js"); ?>"></script>
        <div onclick="topFunction()" class="balloon" style="text-align:center;"><p style="padding-top:50%;cursor:pointer;">Up!</p></div>
        <div  onclick="window.scrollTo(0, document.body.scrollHeight);"><img class="rock1 goingdown" src = "<?php echo base_url('images/rock bottom.png'); ?>"/><p class="centeredbot">Bottom!</p></div>

    <script type="text/javascript" src="<?php echo base_url("/js/post.js"); ?>"></script>
    

    <?php
//    include(APPPATH . 'views/chat/chat.php');
