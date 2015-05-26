<?php

namespace Behance\NBD\Validation\Rules;

use Behance\NBD\Validation\Abstracts\CallbackRuleAbstract;

class NullableRule extends CallbackRuleAbstract {

  protected $_error_template = "%fieldname% is not a null value";

  /**
   * {@inheritDoc}
   */
  public function __construct() {

    $closure = ( function( $data ) {
      return ( $data === null || $data === '' );
    } );

    $this->setClosure( $closure );

  } // __construct

} // NullableRule
