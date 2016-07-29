<?php
require 'bootstrap.php';

/**
 * SvnRepoVersion.class.php
 *
 * ...
 *
 * @author  Till Glöggler <tgloeggl@uos.de>
 * @version 1.0
 */

class SvnRepoVersion extends StudIPPlugin implements SystemPlugin {

    public function __construct() {
        parent::__construct();

        $svnver = (int) preg_replace( "/\r|\n/", "", shell_exec('svnversion '. $GLOBALS['STUDIP_BASE_PATH']));

        if ($svnver) {
            $navigation = new Navigation('@' . $svnver, '');
            Navigation::addItem('/footer/svnver', $navigation);
        }
    }

    public function initialize () {

    }
}
