<?php

/**
 * @file
 * Contains Drupal\AppConsole\Command\Helper\ChainCommandHelper.
 */

namespace Drupal\AppConsole\Command\Helper;

use Symfony\Component\Console\Helper\Helper;

class ChainCommandHelper extends Helper
{
    /**
 * @var $commands array 
*/
    private $commands;

    /**
     * @param $name         string
     * @param $inputs       array
     * @param $interactive  boolean
     * @param $learning     boolean
     */
    public function addCommand($name, $inputs = [], $interactive = null, $learning = null)
    {
        $inputs['command'] = $name;
        if (!is_null($learning)) {
            $inputs['--learning'] = $learning;
        }
        $this->commands[] = ['name' => $name, 'inputs' => $inputs, 'interactive' => $interactive];
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'chain';
    }
}
