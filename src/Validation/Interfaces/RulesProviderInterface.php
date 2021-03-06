<?php

namespace Behance\NBD\Validation\Interfaces;

use Behance\NBD\Validation\Interfaces\RuleInterface;

interface RulesProviderInterface {

  /**
   * Retrieves rule based on $name
   *
   * @param string $name
   *
   * @return Behance\NBD\Validation\Interfaces\RuleInterface
   */
  public function getRule( $name );


  /**
   * @param string        $name  how to identify $rule
   * @param RuleInterface $rule  custom validation
   */
  public function setRule( $name, RuleInterface $rule );


  /**
   * Convenience function to build and set a validator based on a regex pattern
   *
   * @param string $name     how to reference rule in future
   * @param string $pattern  regex to evaluate for this rule
   *
   * @return Behance\NBD\Validation\Rules\Templates\RegexTemplateRule
   */
  public function setRegexRule( $name, $pattern );


  /**
   * TODO: convert from callable to callback rule class
   *
   * @param string  $name     how to identify rule
   * @param Closure $closure  processes validator data
   *
   * @return Behance\NBD\Validation\Rules\Templates\CallbackTemplateRule
   */
  public function setCallbackRule( $name, \Closure $closure );


  /**
   * Will add $namespace to list of currently defined namespaces.
   * Implementations should arrange the list as LIFO (last in first out)
   *
   * @param string $namespace  the bucket used to organize rules
   */
  public function addRuleNamespace( $namespace );

} // RulesProviderInterface
