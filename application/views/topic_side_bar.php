<?php
$logged_user = $_SESSION['logged_user'];
?>
    
<!-- Sidebar -->
<div class="col-md-3" style = "padding-left: 0px;">
    <div class = "col-xs-12 home-sidebar content-container">
        <h3 class = "text-center text-info no-padding no-margin" style = "margin-bottom: 10px;"><strong>Topic Shortcuts</strong></h3>
        <a id = "side-topics-created-btn" class = "btn btn-sm btn-block no-padding sidebar-header-btn buttonsbgcolor">
            <h4>Your topics</h4>
        </a>
        <div id = "side-topics-created" class = "sidebar-topic-div">
            <ul class="nav">
                <?php
                if(!empty($logged_user->topics)):
                foreach ($logged_user->topics as $topic):
                ?>
                <li>
                    <a href="topic/view/<?php echo $topic->topic_id; ?>">
                        <span class = "text-muted"><?php echo utf8_decode($topic->topic_name); ?></span>
                        <span class = "pull-right label label-info"><i class = "fa fa-group"></i> <?php echo $topic->followers ? count($topic->followers) : '0'; ?></span>
                    </a>
                </li>
                <?php
                endforeach;
                else:
                ?>
                <li><h5 class = "text-center text-warning">No Topics here!</h5></li>
                <?php endif; ?>
            </ul>
        </div>

        <a id = "side-topics-moderated-btn" class = "btn btn-block no-padding sidebar-header-btn buttonsbgcolor">
            <h4>Topics you Moderate</h4>
        </a>
        <div id = "side-topics-moderated" class = "sidebar-topic-div">
            <ul class="nav">
                <?php
                if(!empty($logged_user->moderated_topics)):
                foreach ($logged_user->moderated_topics as $topic):
                ?>
                <li>
                    <a href="topic/view/<?php echo $topic->topic_id; ?>">
                        <span class = "text-muted"><?php echo utf8_decode($topic->topic_name); ?></span>
                        <span class = "pull-right label label-info"><i class = "fa fa-group"></i> <?php echo $topic->followers ? count($topic->followers) : '0'; ?></span>
                    </a>
                </li>
                <?php
                endforeach;
                else:
                ?>
                <li><h5 class = "text-center text-warning">No Topics here!</h5></li>
                <?php endif; ?>
            </ul>
        </div>

        <a id = "side-topics-followed-btn" class = "btn btn-block no-padding sidebar-header-btn buttonsbgcolor">
            <h4>Topics you Follow</h4>
        </a>
        <div id = "side-topics-followed" class = "sidebar-topic-div">
            <ul class="nav">
                <?php
                if(!empty($logged_user->followed_topics)):
                foreach ($logged_user->followed_topics as $topic):
                ?>
                <li>
                    <a href="topic/view/<?php echo $topic->topic_id; ?>">
                        <span class = "text-muted"><?php echo utf8_decode($topic->topic_name); ?></span>
                        <span class = "pull-right label label-info"><i class = "fa fa-group"></i> <?php echo $topic->followers ? count($topic->followers) : '0'; ?></span>
                    </a>
                </li>
                <?php
                endforeach;
                else:
                ?>
                <li><h5 class = "text-center text-warning">No Topics here!</h5></li>
                <?php endif; ?>
            </ul>
        </div>
        <center><h4 id="randtriv">Random Trivia</h4></center>
        <div id="randtriv1">
        <?php
        $servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "mukhlat";
	$conn = @new mysqli($servername, $username, $password, $dbname);
        
        $count = rand(1, 4);;
        $sql = "SELECT Tquestion, Tanswer, Tcategory FROM tbl_trivias WHERE TriviaID = '$count'";
	$result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        echo $row['Tcategory']."<br>Q: ";
        echo $row['Tquestion']."<br><br>A: ";
        echo $row['Tanswer'];
        $conn->close();
        }?>
        <img class = "pinwheel1" src = "<?php echo base_url('images/Picture1.png'); ?>"/></div>
    </div>
</div>

<!-- SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url("/js/side_bar.js"); ?>"></script>
<!-- END SCRIPTS -->
<!-- End Sidebar -->