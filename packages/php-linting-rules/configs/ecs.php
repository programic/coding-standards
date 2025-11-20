<?php

use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
  ->withPaths([
    getcwd() . '/app',
    getcwd() . '/tests',
    getcwd() . '/routes',
    getcwd() . '/database',
    getcwd() . '/config',
  ])
  ->withConfiguredRule(PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer::class, ['syntax' => 'short'])
  ->withConfiguredRule(PhpCsFixer\Fixer\AttributeNotation\AttributeEmptyParenthesesFixer::class, ['use_parentheses' => true])
  ->withConfiguredRule(PhpCsFixer\Fixer\Basic\BracesPositionFixer::class, ['allow_single_line_empty_anonymous_classes' => true])
  ->withConfiguredRule(PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer::class, ['inline_constructor_arguments' => false, 'space_before_parenthesis' => true])
  ->withConfiguredRule(PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class, ['order' => ['use_trait']])
  ->withConfiguredRule(PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer::class, ['elements' => ['property']])
  ->withConfiguredRule(PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer::class, ['equal' => false, 'identical' => false, 'less_and_greater' => false])
  ->withConfiguredRule(PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer::class, ['attribute_placement' => 'ignore', 'on_multiline' => 'ensure_fully_multiline'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Import\OrderedImportsFixer::class, ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'none'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Import\SingleImportPerStatementFixer::class, ['group_to_single_imports' => false])
  ->withConfiguredRule(PhpCsFixer\Fixer\LanguageConstruct\SingleSpaceAroundConstructFixer::class, ['constructs_followed_by_a_single_space' => ['abstract', 'as', 'case', 'catch', 'class', 'do', 'else', 'elseif', 'final', 'for', 'foreach', 'function', 'if', 'interface', 'namespace', 'private', 'protected', 'public', 'static', 'switch', 'trait', 'try', 'use_lambda', 'while'], 'constructs_preceded_by_a_single_space' => ['as', 'else', 'elseif', 'use_lambda']])
  ->withConfiguredRule(PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer::class, ['default' => 'at_least_single_space'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Operator\ConcatSpaceFixer::class, ['spacing' => 'one'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Operator\IncrementStyleFixer::class, ['style' => 'post'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer::class, ['only_dec_inc' => true])
  ->withConfiguredRule(PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer::class, ['case' => 'snake_case'])
  ->withConfiguredRule(PhpCsFixer\Fixer\PhpUnit\PhpUnitTestCaseStaticMethodCallsFixer::class, ['call_type' => 'this'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Phpdoc\PhpdocAddMissingParamAnnotationFixer::class, ['only_untyped' => true])
  ->withConfiguredRule(PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer::class, ['align' => 'left'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Phpdoc\PhpdocLineSpanFixer::class, ['const' => 'single', 'property' => 'single', 'method' => 'multi'])
  ->withConfiguredRule(PhpCsFixer\Fixer\Phpdoc\PhpdocTypesOrderFixer::class, ['sort_algorithm' => 'none', 'null_adjustment' => 'always_last', 'case_sensitive' => false])
  ->withConfiguredRule(PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer::class, ['tokens' => ['use']])
  ->withConfiguredRule(PhpCsFixer\Fixer\Whitespace\TypesSpacesFixer::class, ['space' => 'single', 'space_multiple_catch' => 'single'])
  ->withConfiguredRule(PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\ForbiddenFunctionsSniff::class, ['forbiddenFunctions' => ['compact' => null, 'dd' => null, 'dump' => null, 'var_dump' => null, 'ray' => null, 'only' => null]])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Attributes\AttributeAndTargetSpacingSniff::class, ['linesCount' => 0])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\BackedEnumTypeSpacingSniff::class, ['spacesCountBeforeColon' => 0, 'spacesCountBeforeType' => 1])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\ClassMemberSpacingSniff::class, ['linesCountBetweenMembers' => 1])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\ConstantSpacingSniff::class, ['minLinesCountBeforeWithComment' => 1, 'maxLinesCountBeforeWithComment' => 1, 'minLinesCountBeforeWithoutComment' => 0, 'maxLinesCountBeforeWithoutComment' => 0])
  // ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\EmptyLinesAroundClassBracesSniff::class, ['linesCountAfterOpeningBrace' => 0, 'linesCountBeforeClosingBrace' => 0])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\EnumCaseSpacingSniff::class, ['minLinesCountBeforeWithComment' => 1, 'maxLinesCountBeforeWithComment' => 1, 'minLinesCountBeforeWithoutComment' => 0, 'maxLinesCountBeforeWithoutComment' => 0])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\MethodSpacingSniff::class, ['minLinesCount' => 1, 'maxLinesCount' => 1])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\ParentCallSpacingSniff::class, ['linesCountBefore' => 0, 'linesCountAfter' => 1])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\PropertySpacingSniff::class, ['minLinesCountBeforeWithComment' => 1, 'maxLinesCountBeforeWithComment' => 1, 'minLinesCountBeforeWithoutComment' => 1, 'maxLinesCountBeforeWithoutComment' => 1])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Classes\TraitUseSpacingSniff::class, ['linesCountBeforeFirstUse' => 0, 'linesCountBeforeFirstUseWhenFirstInClass' => 0, 'linesCountBetweenUses' => 0, 'linesCountAfterLastUse' => 1, 'linesCountAfterLastUseWhenLastInClass' => 0])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class, ['linesCountBeforeFirstContent' => 0, 'linesCountBetweenDescriptionAndAnnotations' => 1, 'linesCountBetweenDifferentAnnotationsTypes' => 0, 'linesCountAfterLastContent' => 0])
  // ->withConfiguredRule(SlevomatCodingStandard\Sniffs\ControlStructures\BlockControlStructureSpacingSniff::class, ['linesCountBefore' => 1, 'linesCountBeforeFirst' => 1, 'linesCountAfter' => 1, 'linesCountAfterLast' => 1, 'controlStructures' => ['if', 'switch', 'for', 'foreach', 'while', 'do']])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\ControlStructures\JumpStatementsSpacingSniff::class, ['linesCountBefore' => 1, 'linesCountBeforeFirst' => 0, 'linesCountBeforeWhenFirstInCaseOrDefault' => 1, 'linesCountAfter' => 0, 'linesCountAfterLast' => 0, 'linesCountAfterWhenLastInCaseOrDefault' => 0, 'linesCountAfterWhenLastInLastCaseOrDefault' => 0, 'jumpStatements' => ['continue', 'break', 'yield', 'return', 'goto']])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Files\LineLengthSniff::class, ['lineLengthLimit' => 140])
  // ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Files\TypeNameMatchesFileNameSniff::class, ['rootNamespaces' => ['app' => 'App'], 'skipDirs' => ['database/seeders', 'database/factories', 'tests'] ])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Functions\ArrowFunctionDeclarationSniff::class, ['spacesCountAfterKeyword' => 1, 'spacesCountBeforeArrow' => 1, 'spacesCountAfterArrow' => 1, 'allowMultiLine' => true])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Functions\DisallowTrailingCommaInCallSniff::class, ['onlySingleLine' => true])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Functions\DisallowTrailingCommaInClosureUseSniff::class, ['onlySingleLine' => true])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Functions\DisallowTrailingCommaInDeclarationSniff::class, ['onlySingleLine' => true])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Namespaces\AlphabeticallySortedUsesSniff::class, ['caseSensitive' => true, 'psr12Compatible' => true])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Namespaces\NamespaceSpacingSniff::class, ['linesCountBeforeNamespace' => 1, 'linesCountAfterNamespace' => 1])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Namespaces\ReferenceUsedNamesOnlySniff::class, ['allowFullyQualifiedExceptions' => false, 'searchAnnotations' => true, 'allowFullyQualifiedNameForCollidingClasses' => false, 'allowFullyQualifiedNameForCollidingFunctions' => false, 'allowFullyQualifiedNameForCollidingConstants' => false, 'allowFullyQualifiedGlobalClasses' => false, 'allowFullyQualifiedGlobalFunctions' => false, 'allowFullyQualifiedGlobalConstants' => false, 'allowFallbackGlobalFunctions' => true, 'allowFallbackGlobalConstants' => true, 'allowPartialUses' => true])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Namespaces\UnusedUsesSniff::class, ['searchAnnotations' => true])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Namespaces\UseSpacingSniff::class, ['linesCountBeforeFirstUse' => 1, 'linesCountBetweenUseTypes' => 1, 'linesCountAfterLastUse' => 1])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Numbers\RequireNumericLiteralSeparatorSniff::class, ['minDigitsBeforeDecimalPoint' => 4, 'minDigitsAfterDecimalPoint' => 3])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Operators\NegationOperatorSpacingSniff::class, ['spacesCount' => 0])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Operators\SpreadOperatorSpacingSniff::class, ['spacesCountAfterOperator' => 0])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\PHP\ReferenceSpacingSniff::class, ['spacesCountAfterReference' => 0])
  // ->withConfiguredRule(SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff::class, [])
  ->withConfiguredRule(SlevomatCodingStandard\Sniffs\Whitespaces\DuplicateSpacesSniff::class, ['ignoreSpacesInComment' => true])
  ->withRules([
    // PHPCS fixer rules
    PhpCsFixer\Fixer\Alias\ArrayPushFixer::class,
    PhpCsFixer\Fixer\Alias\BacktickToShellExecFixer::class,
    PhpCsFixer\Fixer\Alias\EregToPregFixer::class,
    PhpCsFixer\Fixer\Alias\MbStrFunctionsFixer::class,
    PhpCsFixer\Fixer\Alias\ModernizeStrposFixer::class,
    PhpCsFixer\Fixer\Alias\NoAliasFunctionsFixer::class,
    PhpCsFixer\Fixer\Alias\NoAliasLanguageConstructCallFixer::class,
    PhpCsFixer\Fixer\Alias\NoMixedEchoPrintFixer::class,
    PhpCsFixer\Fixer\Alias\RandomApiMigrationFixer::class,
    PhpCsFixer\Fixer\Alias\SetTypeToCastFixer::class,
    PhpCsFixer\Fixer\ArrayNotation\NoMultilineWhitespaceAroundDoubleArrowFixer::class,
    PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer::class,
    PhpCsFixer\Fixer\ArrayNotation\NormalizeIndexBraceFixer::class,
    PhpCsFixer\Fixer\ArrayNotation\ReturnToYieldFromFixer::class,
    PhpCsFixer\Fixer\ArrayNotation\TrimArraySpacesFixer::class,
    PhpCsFixer\Fixer\ArrayNotation\WhitespaceAfterCommaInArrayFixer::class,
    PhpCsFixer\Fixer\ArrayNotation\YieldFromArrayToYieldsFixer::class,
    PhpCsFixer\Fixer\AttributeNotation\OrderedAttributesFixer::class,
    PhpCsFixer\Fixer\Basic\EncodingFixer::class,
    PhpCsFixer\Fixer\Basic\NoMultipleStatementsPerLineFixer::class,
    PhpCsFixer\Fixer\Basic\NoTrailingCommaInSinglelineFixer::class,
    PhpCsFixer\Fixer\Basic\NumericLiteralSeparatorFixer::class,
    PhpCsFixer\Fixer\Basic\PsrAutoloadingFixer::class,
    PhpCsFixer\Fixer\Basic\SingleLineEmptyBodyFixer::class,
    PhpCsFixer\Fixer\Casing\ClassReferenceNameCasingFixer::class,
    PhpCsFixer\Fixer\Casing\ConstantCaseFixer::class,
    PhpCsFixer\Fixer\Casing\IntegerLiteralCaseFixer::class,
    PhpCsFixer\Fixer\Casing\LowercaseKeywordsFixer::class,
    PhpCsFixer\Fixer\Casing\LowercaseStaticReferenceFixer::class,
    PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer::class,
    PhpCsFixer\Fixer\Casing\MagicMethodCasingFixer::class,
    PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer::class,
    PhpCsFixer\Fixer\Casing\NativeTypeDeclarationCasingFixer::class,
    PhpCsFixer\Fixer\CastNotation\CastSpacesFixer::class,
    PhpCsFixer\Fixer\CastNotation\LowercaseCastFixer::class,
    PhpCsFixer\Fixer\CastNotation\ModernizeTypesCastingFixer::class,
    PhpCsFixer\Fixer\CastNotation\NoUnsetCastFixer::class,
    PhpCsFixer\Fixer\CastNotation\ShortScalarCastFixer::class,
    PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer::class,
    PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer::class,
    PhpCsFixer\Fixer\ClassNotation\NoNullPropertyInitializationFixer::class,
    PhpCsFixer\Fixer\ClassNotation\NoPhp4ConstructorFixer::class,
    PhpCsFixer\Fixer\ClassNotation\NoUnneededFinalMethodFixer::class,
    PhpCsFixer\Fixer\ClassNotation\OrderedInterfacesFixer::class,
    PhpCsFixer\Fixer\ClassNotation\OrderedTraitsFixer::class,
    PhpCsFixer\Fixer\ClassNotation\OrderedTypesFixer::class,
    PhpCsFixer\Fixer\ClassNotation\PhpdocReadonlyClassCommentToKeywordFixer::class,
    PhpCsFixer\Fixer\ClassNotation\ProtectedToPrivateFixer::class,
    PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer::class,
    PhpCsFixer\Fixer\ClassNotation\SelfStaticAccessorFixer::class,
    PhpCsFixer\Fixer\ClassNotation\SingleTraitInsertPerStatementFixer::class,
    PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer::class,
    PhpCsFixer\Fixer\Comment\CommentToPhpdocFixer::class,
    PhpCsFixer\Fixer\Comment\MultilineCommentOpeningClosingFixer::class,
    PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer::class,
    PhpCsFixer\Fixer\Comment\NoTrailingWhitespaceInCommentFixer::class,
    PhpCsFixer\Fixer\Comment\SingleLineCommentSpacingFixer::class,
    PhpCsFixer\Fixer\Comment\SingleLineCommentStyleFixer::class,
    PhpCsFixer\Fixer\ControlStructure\ControlStructureBracesFixer::class,
    PhpCsFixer\Fixer\ControlStructure\ControlStructureContinuationPositionFixer::class,
    PhpCsFixer\Fixer\ControlStructure\ElseifFixer::class,
    PhpCsFixer\Fixer\ControlStructure\EmptyLoopBodyFixer::class,
    PhpCsFixer\Fixer\ControlStructure\IncludeFixer::class,
    PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer::class,
    PhpCsFixer\Fixer\ControlStructure\NoBreakCommentFixer::class,
    PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer::class,
    PhpCsFixer\Fixer\ControlStructure\NoUnneededControlParenthesesFixer::class,
    PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer::class,
    PhpCsFixer\Fixer\ControlStructure\SimplifiedIfReturnFixer::class,
    PhpCsFixer\Fixer\ControlStructure\SwitchCaseSemicolonToColonFixer::class,
    PhpCsFixer\Fixer\ControlStructure\SwitchCaseSpaceFixer::class,
    PhpCsFixer\Fixer\ControlStructure\SwitchContinueToBreakFixer::class,
    PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\CombineNestedDirnameFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\FopenFlagOrderFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\ImplodeCallFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\LambdaNotUsedImportFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\NoSpacesAfterFunctionNameFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\NoUnreachableDefaultArgumentValueFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\NoUselessSprintfFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\NullableTypeDeclarationForDefaultNullValueFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\RegularCallableCallFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer::class,
    PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer::class,
    PhpCsFixer\Fixer\Import\FullyQualifiedStrictTypesFixer::class,
    PhpCsFixer\Fixer\Import\GlobalNamespaceImportFixer::class,
    PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer::class,
    PhpCsFixer\Fixer\Import\NoUnneededImportAliasFixer::class,
    PhpCsFixer\Fixer\Import\NoUnusedImportsFixer::class,
    PhpCsFixer\Fixer\Import\SingleLineAfterImportsFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\ClassKeywordFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveIssetsFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveUnsetsFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\DeclareEqualNormalizeFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\DeclareParenthesesFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\DirConstantFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\ExplicitIndirectVariableFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\FunctionToConstantFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\GetClassToClassKeywordFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\IsNullFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\NoUnsetOnPropertyFixer::class,
    PhpCsFixer\Fixer\LanguageConstruct\NullableTypeDeclarationFixer::class,
    PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer::class,
    PhpCsFixer\Fixer\NamespaceNotation\BlankLineAfterNamespaceFixer::class,
    PhpCsFixer\Fixer\NamespaceNotation\BlankLinesBeforeNamespaceFixer::class,
    PhpCsFixer\Fixer\NamespaceNotation\CleanNamespaceFixer::class,
    PhpCsFixer\Fixer\NamespaceNotation\NoLeadingNamespaceWhitespaceFixer::class,
    PhpCsFixer\Fixer\Operator\LogicalOperatorsFixer::class,
    PhpCsFixer\Fixer\Operator\LongToShorthandOperatorFixer::class,
    PhpCsFixer\Fixer\Operator\NewWithParenthesesFixer::class,
    PhpCsFixer\Fixer\Operator\NoSpaceAroundDoubleColonFixer::class,
    PhpCsFixer\Fixer\Operator\NoUselessConcatOperatorFixer::class,
    PhpCsFixer\Fixer\Operator\NoUselessNullsafeOperatorFixer::class,
    PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer::class,
    PhpCsFixer\Fixer\Operator\OperatorLinebreakFixer::class,
    PhpCsFixer\Fixer\Operator\StandardizeNotEqualsFixer::class,
    PhpCsFixer\Fixer\Operator\TernaryOperatorSpacesFixer::class,
    PhpCsFixer\Fixer\Operator\TernaryToElvisOperatorFixer::class,
    PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer::class,
    PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer::class,
    PhpCsFixer\Fixer\PhpTag\EchoTagSyntaxFixer::class,
    PhpCsFixer\Fixer\PhpTag\FullOpeningTagFixer::class,
    PhpCsFixer\Fixer\PhpTag\LinebreakAfterOpeningTagFixer::class,
    PhpCsFixer\Fixer\PhpTag\NoClosingTagFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitAssertNewNamesFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitAttributesFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitConstructFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertInternalTypeFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitExpectationFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitMockShortWillReturnFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitNamespacedFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitNoExpectationAnnotationFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitSetUpTearDownVisibilityFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitStrictFixer::class,
    PhpCsFixer\Fixer\PhpUnit\PhpUnitTestAnnotationFixer::class,
    PhpCsFixer\Fixer\Phpdoc\AlignMultilineCommentFixer::class,
    PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer::class,
    PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocAnnotationWithoutDotFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocIndentFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocNoAccessFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocNoAliasTagFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocOrderFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocParamOrderFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocReturnSelfReferenceFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocScalarFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocSingleLineVarSpacingFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocTrimConsecutiveBlankLineSeparationFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer::class,
    PhpCsFixer\Fixer\Phpdoc\PhpdocVarAnnotationCorrectOrderFixer::class,
    PhpCsFixer\Fixer\ReturnNotation\NoUselessReturnFixer::class,
    PhpCsFixer\Fixer\ReturnNotation\SimplifiedNullReturnFixer::class,
    PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer::class,
    PhpCsFixer\Fixer\Semicolon\NoEmptyStatementFixer::class,
    PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
    PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer::class,
    PhpCsFixer\Fixer\Strict\StrictComparisonFixer::class,
    PhpCsFixer\Fixer\Strict\StrictParamFixer::class,
    PhpCsFixer\Fixer\StringNotation\ExplicitStringVariableFixer::class,
    PhpCsFixer\Fixer\StringNotation\NoBinaryStringFixer::class,
    PhpCsFixer\Fixer\StringNotation\SimpleToComplexStringVariableFixer::class,
    PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer::class,
    PhpCsFixer\Fixer\StringNotation\StringLengthToEmptyFixer::class,
    PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer::class,
    PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer::class,
    PhpCsFixer\Fixer\Whitespace\BlankLineBetweenImportGroupsFixer::class,
    PhpCsFixer\Fixer\Whitespace\CompactNullableTypeDeclarationFixer::class,
    PhpCsFixer\Fixer\Whitespace\IndentationTypeFixer::class,
    PhpCsFixer\Fixer\Whitespace\LineEndingFixer::class,
    PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer::class,
    PhpCsFixer\Fixer\Whitespace\NoSpacesAroundOffsetFixer::class,
    PhpCsFixer\Fixer\Whitespace\NoTrailingWhitespaceFixer::class,
    PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer::class,
    PhpCsFixer\Fixer\Whitespace\SingleBlankLineAtEofFixer::class,
    PhpCsFixer\Fixer\Whitespace\SpacesInsideParenthesesFixer::class,
    PhpCsFixer\Fixer\Whitespace\StatementIndentationFixer::class,
    PhpCsFixer\Fixer\Whitespace\TypeDeclarationSpacesFixer::class,

    // SlevomatCodingStandard rules
    SlevomatCodingStandard\Sniffs\Arrays\DisallowImplicitArrayCreationSniff::class,
    SlevomatCodingStandard\Sniffs\Arrays\DisallowPartiallyKeyedSniff::class,
    SlevomatCodingStandard\Sniffs\Arrays\MultiLineArrayEndBracketPlacementSniff::class,
    SlevomatCodingStandard\Sniffs\Arrays\ArrayAccessSniff::class,
    SlevomatCodingStandard\Sniffs\Arrays\SingleLineArrayWhitespaceSniff::class,
    SlevomatCodingStandard\Sniffs\Arrays\TrailingArrayCommaSniff::class,
    SlevomatCodingStandard\Sniffs\Attributes\RequireAttributeAfterDocCommentSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff::class,
    SlevomatCodingStandard\Sniffs\Classes\ClassStructureSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\DisallowMultiConstantDefinitionSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\DisallowMultiPropertyDefinitionSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\DisallowStringExpressionPropertyFetchSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\ModernClassNameReferenceSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\PropertyDeclarationSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\RequireSelfReferenceSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\SuperfluousAbstractClassNamingSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\SuperfluousInterfaceNamingSniff::class,
    SlevomatCodingStandard\Sniffs\Classes\SuperfluousTraitNamingSniff::class,
    SlevomatCodingStandard\Sniffs\Commenting\DeprecatedAnnotationDeclarationSniff::class,
    SlevomatCodingStandard\Sniffs\Commenting\EmptyCommentSniff::class,
    SlevomatCodingStandard\Sniffs\Commenting\ForbiddenCommentsSniff::class,
    SlevomatCodingStandard\Sniffs\Commenting\InlineDocCommentDeclarationSniff::class,
    // SlevomatCodingStandard\Sniffs\Commenting\RequireOneLineDocCommentSniff::class,
    SlevomatCodingStandard\Sniffs\Commenting\UselessFunctionDocCommentSniff::class,
    SlevomatCodingStandard\Sniffs\Commenting\UselessInheritDocCommentSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\AssignmentInConditionSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\DisallowContinueWithoutIntegerOperandInSwitchSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\DisallowTrailingMultiLineTernaryOperatorSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\DisallowYodaComparisonSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\LanguageConstructWithParenthesesSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullCoalesceEqualOperatorSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullCoalesceOperatorSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullSafeObjectOperatorSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\RequireShortTernaryOperatorSniff::class,
    // SlevomatCodingStandard\Sniffs\ControlStructures\RequireYodaComparisonSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\UselessIfConditionWithReturnSniff::class,
    SlevomatCodingStandard\Sniffs\ControlStructures\UselessTernaryOperatorSniff::class,
    SlevomatCodingStandard\Sniffs\Exceptions\DeadCatchSniff::class,
    SlevomatCodingStandard\Sniffs\Exceptions\DisallowNonCapturingCatchSniff::class,
    SlevomatCodingStandard\Sniffs\Exceptions\ReferenceThrowableOnlySniff::class,
    SlevomatCodingStandard\Sniffs\Exceptions\RequireNonCapturingCatchSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\DisallowEmptyFunctionSniff::class,
    // SlevomatCodingStandard\Sniffs\Functions\DisallowNamedArgumentsSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\NamedArgumentSpacingSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\RequireTrailingCommaInCallSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\RequireTrailingCommaInClosureUseSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\RequireTrailingCommaInDeclarationSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\StrictCallSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\UnusedInheritedVariablePassedToClosureSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class,
    SlevomatCodingStandard\Sniffs\Functions\UselessParameterDefaultValueSniff::class,
    SlevomatCodingStandard\Sniffs\Namespaces\DisallowGroupUseSniff::class,
    SlevomatCodingStandard\Sniffs\Namespaces\MultipleUsesPerLineSniff::class,
    SlevomatCodingStandard\Sniffs\Namespaces\NamespaceDeclarationSniff::class,
    SlevomatCodingStandard\Sniffs\Namespaces\RequireOneNamespaceInFileSniff::class,
    SlevomatCodingStandard\Sniffs\Namespaces\UseDoesNotStartWithBackslashSniff::class,
    SlevomatCodingStandard\Sniffs\Namespaces\UseFromSameNamespaceSniff::class,
    SlevomatCodingStandard\Sniffs\Namespaces\UselessAliasSniff::class,
    SlevomatCodingStandard\Sniffs\Operators\DisallowEqualOperatorsSniff::class,
    SlevomatCodingStandard\Sniffs\Operators\DisallowIncrementAndDecrementOperatorsSniff::class,
    SlevomatCodingStandard\Sniffs\Operators\RequireCombinedAssignmentOperatorSniff::class,
    SlevomatCodingStandard\Sniffs\PHP\OptimizedFunctionsWithoutUnpackingSniff::class,
    SlevomatCodingStandard\Sniffs\PHP\ShortListSniff::class,
    SlevomatCodingStandard\Sniffs\PHP\TypeCastSniff::class,
    SlevomatCodingStandard\Sniffs\PHP\UselessParenthesesSniff::class,
    SlevomatCodingStandard\Sniffs\PHP\UselessSemicolonSniff::class,
    SlevomatCodingStandard\Sniffs\Strings\DisallowVariableParsingSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\LongTypeHintsSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\NullableTypeForNullDefaultValueSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSpacingSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSpacingSniff::class,
    SlevomatCodingStandard\Sniffs\TypeHints\UselessConstantTypeHintSniff::class,
    SlevomatCodingStandard\Sniffs\Variables\DisallowVariableVariableSniff::class,
    SlevomatCodingStandard\Sniffs\Variables\DisallowSuperGlobalVariableSniff::class,
    SlevomatCodingStandard\Sniffs\Variables\DuplicateAssignmentToVariableSniff::class,
    SlevomatCodingStandard\Sniffs\Variables\UnusedVariableSniff::class,
  ])->withSkip([
    SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class => [
      getcwd() . '/app/Models',
      getcwd() . '/app/Policies',
      getcwd() . '/app/Repositories/QuerySorts',
      getcwd() . '/app/Scopes',
      getcwd() . '/app/Traits',
      getcwd() . '/app/Data/Casts',
      getcwd() . '/app/Providers',
    ],
    SlevomatCodingStandard\Sniffs\Functions\DisallowEmptyFunctionSniff::class => [
      getcwd() . '/app/Providers',
    ],
    SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class => [
      getcwd() . '/app/Console/Commands',
      getcwd() . '/app/Models',
    ],
    SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class => [
      getcwd() . '/app/Data/Casts',
      getcwd() . '/app/Models/User/User.php',
    ],
    PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer::class => [
      getcwd() . '/app/Models',
    ],
    SlevomatCodingStandard\Sniffs\Classes\ClassStructureSniff::class => [
      getcwd() . '/app/Models',
    ],
    SlevomatCodingStandard\Sniffs\Files\LineLengthSniff::class => [
      getcwd() . '/database/seeders',
      getcwd() . '/database/migrations',
    ],
    SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class => [
      getcwd() . '/app/Models/User/User.php',
    ]
  ]);
