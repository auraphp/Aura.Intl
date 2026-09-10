# CHANGELOG

<!--
The Release workflow (Actions -> Release) publishes the version at the top of
this file: the version you dispatch must match that heading, and the bullets
below it become the GitHub release notes. Add the new section, drop any
"(unreleased)" marker, and commit before running the workflow.
-->

## 3.0.2
- No changes to the library itself; this release covers packaging and tooling only.
- Continuous integration now runs the test suite on every PHP version the package
  claims to support, 5.6 through 8.5.
- Releases are cut by the shared Aura Release workflow: it runs the checks, tags
  the commit that passed them, and publishes the notes from this change log.
  Producer is no longer used to release this package.
- Test coverage is reported to Codecov instead of Scrutinizer.
- Migrated `phpunit.xml.dist` to the current schema, so recent PHPUnit versions
  read it without deprecation warnings.

## 3.0.1
- Moved from travis to github actions workflow.
- Added yoast/phpunit-polyfills to support testing from 5.6 onwards.
- Current supported php versions are 5.6 to 8.1
- Using producer for release.
