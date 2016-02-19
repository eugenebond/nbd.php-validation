<?php

namespace Behance\NBD\Validation\Rules;

use Behance\NBD\Validation\Abstracts\CallbackRuleAbstract;

/**
 * Not to be confused with the callback mechanism the rules are extending, this validator
 * will statically call a parameterized class, method name as the validation
 */
class PostitiveIntegerRule extends CallbackRuleAbstract {

  /**
   * {@inheritDoc}
   */
  public function __construct() {

    $this->setClosure( function( $data ) {
      return ( ( $data !== true ) && ( (string)(int)$data ) === ( (string)$data ) && $data > 0 );
    } );

  } // __construct

} // PostitiveIntegerRule
