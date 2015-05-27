<?php

namespace Behance\NBD\Validation\Rules;

use Behance\NBD\Validation\Interfaces\ValidatorServiceInterface;
use Behance\NBD\Validation\Abstracts\CallbackRuleAbstract;
use Behance\NBD\Validation\Exceptions\Validator\RuleRequirementException;

/**
 * Ensures that two pieces of data are non-null and matching
 */
class MatchesRule extends CallbackRuleAbstract {

  const REQUIRED_PARAM_COUNT = 1;

  protected $_error_template = "%fieldname% must match %otherfield%";


  /**
   * {@inheritDoc}
   */
  public function __construct() {

    $closure = ( function( $data, array $context ) {

      list( $other_field_key ) = $this->_extractContextParameters( $context );

      $other_field = $this->_extractContextValidator( $context )->getCageDataValue( $other_field_key );

      if ( $data === null || $other_field === null ) {
        return false;
      }

      return ( $data === $other_field );

    } );

    $this->setClosure( $closure );

  } // __construct


  /**
   * {@inheritDoc}
   */
  public function convertFormattingContext( array $context ) {

    list( $other_field_key ) = $this->_extractContextParameters( $context );

    // Insert 'otherfield' into context array
    $context['otherfield'] = $this->_extractContextValidator( $context )->getFieldname( $other_field_key );

    return $context;

  } // convertFormattingContext

} // MatchesRule
