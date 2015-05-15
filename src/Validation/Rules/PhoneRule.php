<?php

namespace Behance\NBD\Validation\Rules;

use Behance\NBD\Validation\Abstracts\RuleAbstract;

/**
 * Validates if a phone number is valid or not.
 *
 * NOTE: this rule cannot extend \Behance\NBD\Validation\Abstracts\RegexRuleAbstract
 *       as it needs to use `preg_match_all` instead of missing `g` regex option
 *
 * @see  http://stackoverflow.com/questions/3578671/unknown-modifier-g-in-when-using-preg-match-in-php
 */
class PhoneRule extends RuleAbstract {

  protected $_error_template = "%fieldname% must be a valid phone number";

  protected $_pattern = '/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/m';

  /**
   * {@inheritDoc}
   */
  public function isValid( $data, array $context = null ) {

    if ( !is_string( $data ) && !is_integer( $data ) ) {
      return false;
    }

    return (bool)preg_match_all( $this->_pattern, $data );

  } // isValid

} // PhoneRule
