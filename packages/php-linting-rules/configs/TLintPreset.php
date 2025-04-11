<?php

namespace ProgramicLint\Configs;

use Tighten\TLint\Presets\PresetInterface;

class TLintPreset implements PresetInterface
{
  public function getLinters(): array
  {
    return [
        \Tighten\TLint\Linters\ApplyMiddlewareInRoutes::class,
        \Tighten\TLint\Linters\ArrayParametersOverViewWith::class,
        \Tighten\TLint\Linters\FullyQualifiedFacades::class,
        // \Tighten\TLint\Linters\MailableMethodsInBuild::class,
        \Tighten\TLint\Linters\NoDatesPropertyOnModels::class,
        \Tighten\TLint\Linters\NoDocBlocksForMigrationUpDown::class,
        \Tighten\TLint\Linters\NoDumpDirectives::class,
        \Tighten\TLint\Linters\NoJsonDirective::class,
        \Tighten\TLint\Linters\NoRayDirective::class,
        \Tighten\TLint\Linters\NoLeadingSlashesOnRoutePaths::class,
        // \Tighten\TLint\Linters\NoRequestAll::class,
        \Tighten\TLint\Linters\NoSpaceAfterBladeDirectives::class,
        \Tighten\TLint\Linters\OneLineBetweenClassVisibilityChanges::class,
        // \Tighten\TLint\Linters\PureRestControllers::class,
        \Tighten\TLint\Linters\QualifiedNamesOnlyForClassName::class,
        \Tighten\TLint\Linters\RemoveLeadingSlashNamespaces::class,
        \Tighten\TLint\Linters\RequestHelperFunctionWherePossible::class,
        \Tighten\TLint\Linters\RequestValidation::class,
        \Tighten\TLint\Linters\SpaceAfterBladeDirectives::class,
        \Tighten\TLint\Linters\SpacesAroundBladeRenderContent::class,
        \Tighten\TLint\Linters\UseAnonymousMigrations::class,
    ];
  }

  public function getFormatters(): array
  {
    return [
      \Tighten\TLint\Formatters\ArrayParametersOverViewWith::class,
      \Tighten\TLint\Formatters\FullyQualifiedFacades::class,
      // \Tighten\TLint\Formatters\MailableMethodsInBuild::class,
      \Tighten\TLint\Formatters\NoDatesPropertyOnModels::class,
      \Tighten\TLint\Formatters\NoDocBlocksForMigrationUpDown::class,
      \Tighten\TLint\Formatters\NoLeadingSlashesOnRoutePaths::class,
      \Tighten\TLint\Formatters\NoSpaceAfterBladeDirectives::class,
      \Tighten\TLint\Formatters\OneLineBetweenClassVisibilityChanges::class,
      \Tighten\TLint\Formatters\RemoveLeadingSlashNamespaces::class,
      \Tighten\TLint\Formatters\RequestHelperFunctionWherePossible::class,
      \Tighten\TLint\Formatters\RequestValidation::class,
      \Tighten\TLint\Formatters\SpaceAfterBladeDirectives::class,
      \Tighten\TLint\Formatters\SpacesAroundBladeRenderContent::class,
      \Tighten\TLint\Formatters\UseAnonymousMigrations::class,
    ];
  }
}
