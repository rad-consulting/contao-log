<?php
/**
 * Contao extension for RAD Consulting GmbH
 *
 * @copyright  RAD Consulting GmbH 2016
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */

// Config
$GLOBALS['TL_DCA']['tl_rad_log']['config'] = array(
    'dataContainer' => 'Table',
    'ptable' => '',
    'dynamicPtable' => true,
    'closed' => true,
    'sql' => array(
        'keys' => array(
            'id' => 'primary',
            'pid,ptable,tstamp' => 'index',
        ),
    ),
);

// List
$GLOBALS['TL_DCA']['tl_rad_log']['list'] = array(
    'sorting' => array(
        'mode' => 4,
        'fields' => array('tstamp DESC'),
        'panelLayout' => 'filter;search,limit',
        'headerFields' => array('id', 'tstamp'),
        'disableGrouping' => true,
        'child_record_callback' => array('RAD\\Log\\Backend\\Element', 'showLog'),
    ),
    'global_operations' => array(
        'all' => array(
            'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
            'href' => 'act=select',
            'class' => 'header_edit_all',
            'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
        ),
    ),
    'operations' => array(
        'delete' => array(
            'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['delete'],
            'href' => 'act=delete',
            'icon' => 'delete.gif',
            'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
        ),
        'show' => array(
            'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['show'],
            'href' => 'act=show',
            'icon' => 'show.gif',
        ),
    ),
);

// Fields
$GLOBALS['TL_DCA']['tl_rad_log']['fields'] = array(
    'id' => array(
        'sql' => "int(10) unsigned NOT NULL auto_increment",
        'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['id'],
    ),
    'tstamp' => array(
        'sql' => "int(10) unsigned NOT NULL default '0'",
        'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['tstamp'],
    ),
    'pid' => array(
        'sql' => "int(10) unsigned NOT NULL default '0'",
        'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['pid'],
    ),
    'ptable' => array(
        'sql' => "char(64) NOT NULL default ''",
        'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['ptable'],
    ),
    'level' => array(
        'sql' => "int(10) NOT NULL default '1'",
        'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['type'],
    ),
    'message' => array(
        'sql' => "varchar(255) NOT NULL default ''",
        'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['message'],
    ),
    'data' => array(
        'sql' => "blob NULL",
        'label' => &$GLOBALS['TL_LANG']['tl_rad_log']['data'],
    ),
);

foreach ($GLOBALS['RAD_LOG_ENTITIES'] as $k => $v) {
    if (\Contao\Input::get('do') == $k) {
        $GLOBALS['TL_DCA']['tl_rad_log']['config']['ptable'] = $v['ptable'];

        if (isset($v['headerFields'])) {
            $GLOBALS['TL_DCA']['tl_rad_log']['list']['sorting']['headerFields'] = $v['headerFields'];
        }
    }
}
