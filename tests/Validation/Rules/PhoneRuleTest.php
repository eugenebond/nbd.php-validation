<?php

namespace Behance\NBD\Validation\Rules;

class PhoneRuleTest extends \PHPUnit_Framework_TestCase {

  /**
   * @test
   * @dataProvider testDataProvider
   */
  public function isValid( $expected, $data ) {

    $rule = new PhoneRule();

    $this->assertEquals( $expected, $rule->isValid( $data ) );

  } // isValid

  /**
   * @return array
   */
  public function testDataProvider() {

    return [
        [ 'expected' => true,  'data' => '+42 555.123.4567' ],
        [ 'expected' => true,  'data' => '+1-(800)-123-4567' ],
        [ 'expected' => true,  'data' => '+7 555 1234567' ],
        [ 'expected' => true,  'data' => '+7(926)1234567' ],
        [ 'expected' => true,  'data' => '(926) 1234567' ],
        [ 'expected' => true,  'data' => '(123)-456-7890' ],
        [ 'expected' => true,  'data' => '+79261234567' ],
        [ 'expected' => true,  'data' => '926 1234567' ],
        [ 'expected' => true,  'data' => '9261234567' ],
        [ 'expected' => true,  'data' => '1234567' ],
        [ 'expected' => true,  'data' => '123-4567' ],
        [ 'expected' => true,  'data' => '123-89-01' ],
        [ 'expected' => true,  'data' => '495 1234567' ],
        [ 'expected' => true,  'data' => '469 123 45 67' ],
        [ 'expected' => true,  'data' => '89261234567' ],
        [ 'expected' => true,  'data' => '8 (926) 1234567' ],
        [ 'expected' => true,  'data' => '926.123.4567' ],
        [ 'expected' => true,  'data' => '415-555-1234' ],
        [ 'expected' => true,  'data' => '650-555-2345' ],
        [ 'expected' => true,  'data' => '(416)555-3456' ],
        [ 'expected' => true,  'data' => '202 555 4567' ],
        [ 'expected' => true,  'data' => '4035555678' ],
        [ 'expected' => true,  'data' => '1 416 555 9292' ],
        [ 'expected' => false, 'data' => '926 3 4' ],
        [ 'expected' => false, 'data' => '8 800 600-APPLE' ],
        [ 'expected' => false, 'data' => '+-()--' ],
        [ 'expected' => false, 'data' => '+1(234)--(54)' ],
        [ 'expected' => false, 'data' => '+1(234--4)' ],
        [ 'expected' => false, 'data' => '+42 555.123).4567' ],
        [ 'expected' => false, 'data' => new \stdClass() ],
        [ 'expected' => false, 'data' => true ],
        [ 'expected' => false, 'data' => false ],
        [ 'expected' => false, 'data' => null ],
        [ 'expected' => false, 'data' => [ 9, 7, 9, 7, 3, 4, 9, 7, 3, 4 ] ],
        [ 'expected' => false, 'data' => function() {} ],
    ];

  } // testDataProvider

} // PhoneRuleTest
