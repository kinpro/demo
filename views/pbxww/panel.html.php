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
<form id="acf_form" target="acf_frame" method="post" action="https://<?= $acfdomain ?>/index.php?r=<?= microtime(true) ?>">
    <input type="hidden" name="message" value="<?= $acf->getMessage() ?>"/>
    <input type="hidden" name="key" value="<?= $acf->getKey() ?>"/>
    <input type="hidden" name="reseller_id" value="<?= $acf->getResellerID() ?>"/>
    <input type="hidden" name="site_name" value="<?= $acf->getSiteName() ?>"/>
    <input type="hidden" name="site_url" value="<?= $acf->getSiteUrl() ?>" />
    <input type="hidden" name="help_url" value="<?= $acf->getHelpUrl() ?>" />
    <input type="hidden" name="support_url" value="<?= $acf->getSupportUrl() ?>" />
    <input type="hidden" name="language" value="<?= $acf->getLanguage() ?>" />
    <input type="hidden" name="timezone" value="<?= $acf->getTimezone() ?>" />
</form>
<iframe id="pbx_frame" name="acf_frame"></iframe>

<script type="text/javascript">
    jQuery('document').ready(function($){
        $('#pbx_frame').prependTo($('body'));

        document.forms['acf_form'].submit();
    })

</script>