<h3>Congratulations</h3>
<p>
You have successfully installed Simplest Forum!
</p>

<?php
// check for back up tables from a previous installation
$db = &JFactory::getDBO();
$config = &JFactory::getConfig();
$dbprefix = $config->getValue('dbprefix');

$query = 'SHOW TABLES';
$db->setQuery($query);
$tables = $db->loadResultArray();

// if there was a backed up installation
if (in_array($dbprefix.'simplestforum_forum_backup', $tables) && in_array($dbprefix.'simplestforum_post_backup', $tables)) {
    echo '<h3>Upgrade Status</h3>';
    echo '<p>A previous installation was detected. We are now importing the old forums and posts...</p>';
    $errors = 0;

    // get the forum entries
    $query = 'INSERT IGNORE INTO #__simplestforum_forum
              SELECT *
              FROM #__simplestforum_forum_backup'
    ;
    $db->setQuery($query);
    if (!$db->query()) {
        echo '<p style="color:#f00;">The original forum entries could not be restored.</p>';
        $errors++;
    }

    // get the post entries
    $query = 'INSERT IGNORE INTO #__simplestforum_post
              SELECT *
              FROM #__simplestforum_post_backup'
    ;
    $db->setQuery($query);
    if (!$db->query()) {
        echo '<p style="color:#f00;">The original post entries could not be restored.</p>';
        $errors++;
    }

    // get the configuration settings
    $query = 'SELECT a.*
              FROM #__simplestforum_configuration AS a'
    ;
    $db->setQuery($query);
    $configuration = ($configuration = $db->loadObjectList())?$configuration[0]:null;
    if (!$configuration) {
        echo '<p style="color:#f00;">The original configuration could not be restored.</p>';
        $errors++;
    } else {
        $query = 'UPDATE #__components AS a
                  SET a.params = '.$db->Quote($configuration->params).', a.id = '.(int)$configuration->oldComponentId.'
                  WHERE a.option = '.$db->Quote('com_simplestforum')
        ;
        $db->setQuery($query);
        if (!$db->query()) {
            echo '<p style="color:#f00;">The original configuration could not be restored.</p>';
            $errors++;
        }
    }

    if (!$errors) {
        echo '<p style="color:#00f;">Importing tables completed successfully</p>';
    } else {
        echo '<span style="color:#f00;">Importing tables failed with '.$errors.' error(s)</span><br />';
    }
} //end restoration
?>

<?php include(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_simplestforum'.DS.'help'.DS.'en-GB'.DS.'help.html'); ?>
