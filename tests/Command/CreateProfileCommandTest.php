<?php

namespace AppBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

class CreateProfileCommandTest extends \PHPUnit_Framework_TestCase
{
    private $app;
    private $output;

    protected function setUp()
    {
        $kernel = new \AppKernel('test', false);
        $this->app = new Application($kernel);
        $this->app->setAutoExit(false);
        $this->output = new NullOutput();
    }

    public function testItRunsSuccessfully()
    {
        $input = new ArrayInput(array(
            'commandName' => 'app:profile:create',
            'name' => 'Igor',
        ));

        $exitCode = $this->app->run($input, $this->output);

        $this->assertSame(0, $exitCode);
    }

}