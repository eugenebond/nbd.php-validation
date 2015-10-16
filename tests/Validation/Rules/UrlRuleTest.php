<?php

namespace Behance\NBD\Validation\Rules;

/**
 * @group validation
 */
class UrlRuleTest extends \PHPUnit_Framework_TestCase {

  /**
   * @test
   * @dataProvider testDataProvider
   */
  public function isValid( $data, $expected ) {

    $rule = new UrlRule();

    $this->assertEquals( $expected, $rule->isValid( $data ) );

  } // isValid


  /**
   * @return array
   */
  public function testDataProvider() {

    return [
        [ 'www.google.com', true ],
        [ 'bob@behance.com', true ],
        [ 'mailto:dave@behance.com', true ],
        [ 'http://www.google.com', true ],
        [ 'https://www.google.com', true ],
        [ 'www.google.com?a=1&b=2#fun', true ],
        [ 'www.behance.net/job/Multimedia-Designer%2C-Senior', true ], // testing "%2C"
        [ '//www.google.com', false ],
        [ '//www.google.co.uk', false ],
        [ 'www.google.com?b=2|3', false ],
        [ 'javascript:alert("dave@behance.com")', false ],
        [ 'java\0script:alert("dave@behance.com")', false ],
        [ 123.0e26, false ],
        [ null, false ],
        [ false, false ],
        [ true, false ],
        [ ( new \stdClass() ), false ],
        [ ( function() {} ), false ],
    ];

  } // testDataProvider

} // UrlRuleTest
