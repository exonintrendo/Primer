<?php
/**
 * Created by IntelliJ IDEA.
 * User: exonintrendo
 * Date: 6/7/14
 * Time: 9:23 PM
 */

class navigationRenderer
{
    protected static $_config = array(
        'left_nav' => array(
            '<span class="glyphicon glyphicon-pencil hidden-xs">&nbsp;</span>Posts' => '/',
            '<span class="glyphicon glyphicon-film hidden-xs">&nbsp;</span>Movies' => '/movies/',
        ),
        'right_nav' => array(
            '{{username}}' => array(
                'View Account' => '/users/view/{{username}}',
                'Edit Account' => '/users/edit/',
                'New Post' => '/posts/add/',
            ),
            '{{Login}}' => '/login/',
            '{{Log Out}}' => '/logout/',
        ),
    );

    public static function buildDesktopNav()
    {
        $leftNav = self::buildLinks(self::$_config['left_nav']);
        $rightNav = self::buildLinks(self::$_config['right_nav']);
        return <<<__TEXT__
            <div class="navbar navbar-default hidden-xs" role="navigation" style="margin-bottom: 0;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Alex Phillips</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        $leftNav
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        $rightNav
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
__TEXT__;

    }

    public static function buildMobileNav()
    {
        $links = self::buildLinks(self::$_config['left_nav'], false);
        $links .= self::buildLinks(self::$_config['right_nav'], false);
        return '<ul>' . $links . '</ul>';
    }

    protected static function buildLinks($config, $addDividers = true)
    {
        $divider = $addDividers ? '<li class="divider hidden-xs"></li>' : '';
        $markup = $divider;
        foreach ($config as $label => $info) {
            $label = preg_replace_callback('#\{\{(.+?)\}\}#', array('navigationRenderer', 'handleSpecialCases'), $label);
            if ($label) {
                if (!is_array($info)) {
                    $info = preg_replace_callback('#\{\{(.+?)\}\}#', array('navigationRenderer', 'handleSpecialCases'), $info);
                    if ($label && $info) {
                        $markup .= <<<__TEXT__
                    <li>
                        <a href="$info">
                            $label
                        </a>
                    </li>
                    $divider
__TEXT__;

                    }
                }
                else {
                    $markup .= <<<__TEXT__
                   <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">$label <b class="caret hidden-xs"></b></a>
                        <ul class="dropdown-menu">
__TEXT__;

                    $markup .= self::buildLinks($info, false);
                    $markup .= '</ul></li>' . $divider;
                }
            }
        }
        return $markup;
    }

    protected static function handleSpecialCases($matches)
    {
        static $Session;
        if (!$Session) {
            $Session = SessionComponent::getInstance();
        }

        $string = $matches[1];
        $retval = '';
        switch($string) {
            case 'username':
                if ($Session->isUserLoggedIn()) {
                    $retval = $Session->read('Auth.username');
                }
                break;
            case 'Login':
                if (!$Session->isUserLoggedIn()) {
                    $retval = $string;
                }
                break;
            case 'Log Out':
                if ($Session->isUserLoggedIn()) {
                    $retval = $string;
                }
                break;
        }

        return $retval;
    }
}