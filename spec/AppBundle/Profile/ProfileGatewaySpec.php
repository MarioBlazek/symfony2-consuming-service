<?php

namespace spec\AppBundle\Profile;

use AppBundle\RequestHandler\RequestHandler;
use AppBundle\RequestHandler\Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProfileGatewaySpec extends ObjectBehavior
{
    const URL = 'http://ws.local/app_dev.php';
    const USERNAME = 'spanish inquisition';
    const PASSWORD = 'nobody expects it';

    const ID = 42;
    const NAME = 'Arthur';

    function let(RequestHandler $requestHandler)
    {
        $this->beConstructedWith($requestHandler, self::URL, self::USERNAME, self::PASSWORD);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AppBundle\Profile\ProfileGateway');
    }

    function it_creates_profiles(RequestHandler $requestHandler, Response $response)
    {
        $profile = array(
            'id' => self::ID,
            'name' => self::NAME,
        );

        $request = Argument::type('AppBundle\RequestHandler\Request');
        $requestHandler->handle($request)->willReturn($response);
        $response->getBody()->willReturn($profile);

        $this->create(self::NAME)->shouldBe($profile);
    }

}
