<?php
/**
 * Created by PhpStorm.
 * User: exonintrendo
 * Date: 9/24/14
 * Time: 7:45 PM
 */

namespace Primer\Console;

class UpCommand extends BaseCommand
{
    public function main()
    {
        if (unlink(APP_ROOT . '/Config/down')) {
            $this->out("Server has been brought up.");
        }
        else {
            $this->out("There was a problem bringing the server out of maintenance mode. Please check file permissions.");
        }
    }
}