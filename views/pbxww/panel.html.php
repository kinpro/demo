<style type="text/css">
    html, body{
        height: 100% !important;
        width: 100% !important;
        padding: 0px !important;
        margin: 0px !important;
    }

    #pbx_frame{
        border: none;
        height: 100%;
        width: 100%;
        position: absolute;
        top:0;
        left:0;
        z-index: 99999;
    }
</style>
<form id="pbxww_form" method="post" action="http://<?= $pbxwwdomain ?>/index.php?r=<?= microtime(true) ?>">
    <input type="hidden" name="message" value="<?= $request->getMessage() ?>"/>
    <input type="hidden" name="key" value="<?= $request->getKey() ?>"/>
    <input type="hidden" name="reseller_id" value="<?= $request->getResellerID() ?>"/>
    <input type="hidden" name="site_name" value="<?= $request->getSiteName() ?>"/>
    <input type="hidden" name="site_url" value="<?= $request->getSiteUrl() ?>" />
    <input type="hidden" name="help_url" value="<?= $request->getHelpUrl() ?>" />
    <input type="hidden" name="order_url" value="<?= $request->getOrderUrl() ?>" />
    <input type="hidden" name="support_url" value="<?= $request->getSupportUrl() ?>" />
    <input type="hidden" name="language" value="<?= $request->getLanguage() ?>" />
    <input type="hidden" name="timezone" value="<?= $request->getTimezone() ?>" />
</form>
<iframe id="pbx_frame"></iframe>

<script type="text/javascript">
    jQuery('document').ready(function($){
        $('#pbx_frame').prependTo($('body'));

        document.forms['pbxww_form'].submit();
    })

</script>