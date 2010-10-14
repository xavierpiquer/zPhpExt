Ext.BLANK_IMAGE_URL = '<zPhpExt>IMAGE_URL</zPhpExt>';
Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
Ext.onReady(function()
{
    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = '<zPhpExt>MSGTARGET</zPhpExt>';
    <zPhpExt>CONTENT</zPhpExt>
});
