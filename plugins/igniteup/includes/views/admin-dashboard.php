<?php
$section = isset($_REQUEST['section']) ? $_REQUEST['section'] : 'general';

function show_saved_notice() {
    if (!isset($_REQUEST['settings-updated']))
        return;
    ?>
    <div class="updated settings-error notice is-dismissible">
        <p><?php _e('Settings saved.', CSCS_TEXT_DOMAIN); ?></p>
    </div>
    <?php
}
?>
<div class="wrap">
    <h2 class="nav-tab-wrapper">
        <a class="nav-tab <?php echo $section == 'general' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url('admin.php?page=cscs_options&section=general'); ?>" ><?php _e('General', CSCS_TEXT_DOMAIN); ?></a>
        <a class="nav-tab <?php echo $section == 'appearance' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url('admin.php?page=cscs_options&section=appearance'); ?>"><?php _e('Template Options', CSCS_TEXT_DOMAIN); ?></a>
        <a class="nav-tab <?php echo $section == 'common' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url('admin.php?page=cscs_options&section=common'); ?>"><?php _e('Common Options', CSCS_TEXT_DOMAIN); ?></a>
        <a class="nav-tab <?php echo $section == 'integrations' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url('admin.php?page=cscs_options&section=integrations'); ?>"><?php _e('Integrations', CSCS_TEXT_DOMAIN); ?></a>
        <a class="nav-tab <?php echo $section == 'help' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url('admin.php?page=cscs_options&section=help'); ?>"><?php _e('Help', CSCS_TEXT_DOMAIN); ?></a>
    </h2>

    <?php show_saved_notice(); ?>

    <?php if (!isset($_REQUEST['section']) || empty($_REQUEST['section']) || $_REQUEST['section'] == 'general'): ?>
        <h3><?php _e('General Options', CSCS_TEXT_DOMAIN); ?></h3>        
        <?php include 'temp-general-options.php'; ?>
    <?php elseif (!isset($_REQUEST['section']) || $_REQUEST['section'] == 'appearance'): ?>
        <h3><?php _e('Template Options', CSCS_TEXT_DOMAIN); ?></h3>
        <?php include 'temp-template-options.php'; ?>
    <?php elseif (!isset($_REQUEST['section']) || $_REQUEST['section'] == 'common'): ?>
        <h3><?php _e('Common Options', CSCS_TEXT_DOMAIN); ?></h3>
        <?php include 'temp-common-options.php'; ?>
    <?php elseif (!isset($_REQUEST['section']) || $_REQUEST['section'] == 'help'): ?>

        <?php include 'temp-help.php'; ?>
    <?php else: ?>
        <h3><?php _e('Manage Integrations', CSCS_TEXT_DOMAIN); ?></h3>
        <?php include 'temp-integration-options.php'; ?>
    <?php endif; ?>
</div>
<?php
