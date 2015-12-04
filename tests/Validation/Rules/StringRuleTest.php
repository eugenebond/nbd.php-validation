<?php

/**
 * @group validation
 */
class NBD_Validation_Rules_StringRuleTest extends PHPUnit_Framework_TestCase {

  protected $_class = '\Behance\NBD\Validation\Rules\StringRule';

  /**
   * @test
   * @dataProvider testDataProvider
   */
  public function isValid( $data, $expected ) {

    $name = $this->_class;
    $rule = new $name();

    $this->assertEquals( $expected, $rule->isValid( $data ) );

  } // isValid


  /**
   * @return array
   */
  public function testDataProvider() {

    return [
        [ 'abc', true ],
        [ 'ábč', true ],
        [ 'ábčabc', true ],
        [ 'ÁBČabc', true ],
        [ 'ábčabc123', true ],
        [ 'ÁBÇabc123', true ],
        [ '', true ],
        [ 0, false ],
        [ true, false ],
        [ 'true', true ],
        [ false, false ],
        [ 'false', true ],
        [ 123, false ],
        [ ( new stdClass() ), false ],
        [ ( function() {} ), false ],
        [ [], false ],
        [ [ 'abc' ], false ],
        [ [ 'abc' => 123 ], false ],
        [ [ 0 => 'abc' ], false ],
        [ [ 0 => 'abc', 1 => 123, 'def' => true ], false ],
    ];

  } // testDataProvider

} // NBD_Validation_Rules_StringRuleTest
