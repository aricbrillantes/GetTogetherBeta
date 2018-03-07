<?php
    $topic = $_SESSION['current_topic'];
?>

<link href="<?php echo base_url('lib/css/emoji.css'); ?>" rel="stylesheet">
<!-- Create Post Modal -->
<div id="create-reply-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Create reply Modal Content-->
        <div class="modal-content">
            <div class="modal-header modal-heading  modalbg">
                <button type="button" class="close" style = "padding: 5px;" data-dismiss="modal">&times;</button>
                <h4 id = "reply-user" class="modal-title"></h4>
            </div>
            <form enctype = "multipart/form-data" id = "create-reply-form" action = "<?php echo base_url('topic/reply');?>" method = "POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for = "title">Make a title for your reply (Optional):</label>
                        <p class="lead emoji-picker-container">
                        <input type="text" style="height: 50px;" class="form-control" maxlength = "100" name = "reply_title" id = "reply-title" placeholder = "Title of your post" data-emojiable="true"/>
                        </p>
                    </div>
                    <div class="form-group"><!-- check if description exceeds n words-->
                        <label for = "content">Make the content of your reply:</label>
                        <p class="lead emoji-picker-container">
                        <textarea class = "form-control" style="height: 100px;" maxlength = "16000" required name = "reply_content" id = "reply-content" placeholder = "Tell something in your post!" data-emojiable="true"></textarea>
                        </p>
                    </div>
                    <div id = "attachment-buttons" class = "form-group">
                        Attach a file:
                        <!--IMAGE-->
                        <label id = "img-label" class="btn btn-primary buttonsbgcolor">
                            <input id = "attach-img" accept = "image/*" type="file" name = "reply_image" style = "display: none;">
                            <p id = "image-text" class = "attach-btn-text"><i class = "fa fa-file-image-o"></i> Add Image</p>
                        </label>

                        <!--AUDIO-->
                        <label id = "audio-label" class="btn btn-primary buttonsbgcolor">
                            <input id = "attach-audio" accept = "audio/*" type="file" name = "reply_audio" style = "display: none;">
                            <p id = "audio-text" class = "attach-btn-text"><i class = "fa fa-file-audio-o"></i> Add Audio</p>
                        </label>

                        <!--VIDEO-->
                        <label id = "video-label" class="btn btn-primary buttonsbgcolor">
                            <input id = "attach-video" accept = "video/*" type="file" name = "reply_video" style = "display: none;">
                            <p id = "video-text" class = "attach-btn-text"><i class = "fa fa-file-video-o"></i> Add Video</p>
                        </label>

                        <!--FILE-->
                        <label id = "file-label" class="btn btn-primary buttonsbgcolor">
                            <input id = "attach-file" type="file" name = "reply_file" style = "display: none;">
                            <p id = "file-text" class = "attach-btn-text"><i class = "fa fa-file-o"></i> Add File</p>
                        </label>
                    </div>
                    <div id = "attachment-preview" class = "content-container">
                        <h5 id = "attachment-message" class = "text-warning text-center">No attachment yet.</h5>
                    </div>
                </div>
                <div class = "modal-footer" style = "padding: 5px; border-top: none; padding-bottom: 10px; padding-right: 10px;">
                    <a id = "create-reply-btn" class ="btn btn-primary buttonsbgcolor" data-toggle = "modal">Reply</a>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Begin emoji-picker JavaScript -->
    <script src="<?php echo base_url('lib/js/config.js');?>"></script>
    <script src="<?php echo base_url('lib/js/util.js');?>"></script>
    <script src="<?php echo base_url('lib/js/jquery.emojiarea.js');?>"></script>
    <script src="<?php echo base_url('lib/js/emoji-picker.js');?>"></script>
    <!-- End emoji-picker JavaScript -->

    <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '<?php echo base_url('lib/img/');?>',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
    
