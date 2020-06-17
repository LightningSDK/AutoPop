<?php if (!empty($autopop['widget'])): ?>
    <?= \lightningsdk\core\View\CMS::embed($autopop['widget']); ?>
<?php else: ?>
    <div id="optin_section">
        <form data-abide="ajax">
            <div class="row text-center">
                <h2><?= $autopop['offer']; ?></h2>
                <br><br>
            </div>
            <div class="row">
                <div class="small-12 small-offset-0 medium-6 medium-offset-3">
                    <input type="hidden" name="list" value="<?=$autopop['listId'];?>" />
                    <input type="hidden" name="message" value="<?=$autopop['messageId'];?>" />
                    <input type="hidden" name="success" value="">
                    <div>
                        <label>
                            <input name="email" type="email" id="optin_email" placeholder="Your best email address" required  />
                            <small class="form-error">Please enter a valid email address.</small>
                        </label>
                    </div>
                </div>
                <br><br>
            </div>
            <div class="row">
                <div class="medium-6 text-center right" style="width:100%">
                    <input class="button red" style="min-width:80%;" name="submit" type="submit" value="<?=$autopop['submitText'];?>" />
                </div>
                <div class="medium-6 text-center left" style="width:100%">
                    <span class="button grey" style="min-width:80%;" onclick="dismissPopup()"><?=$autopop['firstDismiss'];?></span>
                </div>
            </div>
        </form>
    </div>
    <div id="dismiss_section" style="display:none;">
        <div class="row text-center">
            <h2><?=$autopop['successMessage']; ?></h2>
            <br><br>
        </div>
        <div class="row text-center">
            <span class="button red" style="min-width:80%;" onclick="dismissPopup()"><?=$autopop['successDismissButton'];?></span>
        </div>
    </div>
<?php endif; ?>
<script>
    (function(){
        $(document).foundation('abide', 'reflow');
        var optinSection = $('#optin_section');
        optinSection.find('form').on('valid.fndtn.abide', function(){
            $.ajax({
                url: '/api/optin',
                method: 'POST',
                persist_dialog: true,
                data: {
                    email: optinSection.find('input[name=email]').val(),
                    list: optinSection.find('input[name=list]').val(),
                    success: optinSection.find('input[name=success]').val(),
                    message: optinSection.find('input[name=message]').val(),
                    token: lightning.get('token')
                },
                success: function() {
                    console.log('running success event');
                    $('.reveal-modal .message').hide();
                    lightning.modules.autoPop.doNotRepeat();
                    $('#optin_section').slideUp();
                    $('#dismiss_section').slideDown();
                }
            });
        });
    })();

    function dismissPopup() {
        lightning.modules.autoPop.doNotRepeat();
        lightning.dialog.hide();
    }
</script>
