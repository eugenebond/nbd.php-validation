<?php

namespace Behance\NBD\Validation\Rules;

/**
 * @group validation
 */
class EmailRuleTest extends \PHPUnit_Framework_TestCase {

  /**
   * @test
   * @dataProvider testDataProvider
   */
  public function isValid( $data, $expected ) {

    $rule = new EmailRule();

    $this->assertEquals( $expected, $rule->isValid( $data ) );

  } // isValid


  /**
   * @return array
   */
  public function testDataProvider() {

    return [
        [ 'bob@behance.com', true ],
        [ 'bob.goodness@behance.com', true ],
        [ 'bob@behance.co.uk', true ],
        [ 'bob+abc@behance.com', true ],
        [ 'bob\0@behance.com', false ],
        [ 'string', false ],
        [ 'javascript:test@behance.com', false ],
        [ 123.0e26, false ],
        [ null, false ],
        [ false, false ],
        [ true, false ],
        [ ( new \stdClass() ), false ],
        [ ( function() {} ), false ],
    ];

  } // testDataProvider

} // EmailRuleTest
