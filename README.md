oclif-hello-world
=================

oclif example Hello World CLI

[![oclif](https://img.shields.io/badge/cli-oclif-brightgreen.svg)](https://oclif.io)
[![Version](https://img.shields.io/npm/v/oclif-hello-world.svg)](https://npmjs.org/package/oclif-hello-world)
[![CircleCI](https://circleci.com/gh/oclif/hello-world/tree/main.svg?style=shield)](https://circleci.com/gh/oclif/hello-world/tree/main)
[![Downloads/week](https://img.shields.io/npm/dw/oclif-hello-world.svg)](https://npmjs.org/package/oclif-hello-world)
[![License](https://img.shields.io/npm/l/oclif-hello-world.svg)](https://github.com/oclif/hello-world/blob/main/package.json)

<!-- toc -->
* [Usage](#usage)
* [Commands](#commands)
<!-- tocstop -->
# Usage
<!-- usage -->
```sh-session
$ npm install -g tude
$ tude COMMAND
running command...
$ tude (--version)
tude/0.0.0 darwin-x64 node-v16.13.2
$ tude --help [COMMAND]
USAGE
  $ tude COMMAND
...
```
<!-- usagestop -->
# Commands
<!-- commands -->
* [`tude hello PERSON`](#tude-hello-person)
* [`tude hello world`](#tude-hello-world)
* [`tude help [COMMAND]`](#tude-help-command)
* [`tude plugins`](#tude-plugins)
* [`tude plugins:install PLUGIN...`](#tude-pluginsinstall-plugin)
* [`tude plugins:inspect PLUGIN...`](#tude-pluginsinspect-plugin)
* [`tude plugins:install PLUGIN...`](#tude-pluginsinstall-plugin-1)
* [`tude plugins:link PLUGIN`](#tude-pluginslink-plugin)
* [`tude plugins:uninstall PLUGIN...`](#tude-pluginsuninstall-plugin)
* [`tude plugins:uninstall PLUGIN...`](#tude-pluginsuninstall-plugin-1)
* [`tude plugins:uninstall PLUGIN...`](#tude-pluginsuninstall-plugin-2)
* [`tude plugins update`](#tude-plugins-update)

## `tude hello PERSON`

Say hello

```
USAGE
  $ tude hello [PERSON] -f <value>

ARGUMENTS
  PERSON  Person to say hello to

FLAGS
  -f, --from=<value>  (required) Who is saying hello

DESCRIPTION
  Say hello

EXAMPLES
  $ oex hello friend --from oclif
  hello friend from oclif! (./src/commands/hello/index.ts)
```

_See code: [dist/commands/hello/index.ts](https://github.com/joefearnley/tude/blob/v0.0.0/dist/commands/hello/index.ts)_

## `tude hello world`

Say hello world

```
USAGE
  $ tude hello world

DESCRIPTION
  Say hello world

EXAMPLES
  $ tude hello world
  hello world! (./src/commands/hello/world.ts)
```

## `tude help [COMMAND]`

Display help for tude.

```
USAGE
  $ tude help [COMMAND] [-n]

ARGUMENTS
  COMMAND  Command to show help for.

FLAGS
  -n, --nested-commands  Include all nested commands in the output.

DESCRIPTION
  Display help for tude.
```

_See code: [@oclif/plugin-help](https://github.com/oclif/plugin-help/blob/v5.1.16/src/commands/help.ts)_

## `tude plugins`

List installed plugins.

```
USAGE
  $ tude plugins [--core]

FLAGS
  --core  Show core plugins.

DESCRIPTION
  List installed plugins.

EXAMPLES
  $ tude plugins
```

_See code: [@oclif/plugin-plugins](https://github.com/oclif/plugin-plugins/blob/v2.1.5/src/commands/plugins/index.ts)_

## `tude plugins:install PLUGIN...`

Installs a plugin into the CLI.

```
USAGE
  $ tude plugins:install PLUGIN...

ARGUMENTS
  PLUGIN  Plugin to install.

FLAGS
  -f, --force    Run yarn install with force flag.
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Installs a plugin into the CLI.
  Can be installed from npm or a git url.

  Installation of a user-installed plugin will override a core plugin.

  e.g. If you have a core plugin that has a 'hello' command, installing a user-installed plugin with a 'hello' command
  will override the core plugin implementation. This is useful if a user needs to update core plugin functionality in
  the CLI without the need to patch and update the whole CLI.


ALIASES
  $ tude plugins add

EXAMPLES
  $ tude plugins:install myplugin 

  $ tude plugins:install https://github.com/someuser/someplugin

  $ tude plugins:install someuser/someplugin
```

## `tude plugins:inspect PLUGIN...`

Displays installation properties of a plugin.

```
USAGE
  $ tude plugins:inspect PLUGIN...

ARGUMENTS
  PLUGIN  [default: .] Plugin to inspect.

FLAGS
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Displays installation properties of a plugin.

EXAMPLES
  $ tude plugins:inspect myplugin
```

## `tude plugins:install PLUGIN...`

Installs a plugin into the CLI.

```
USAGE
  $ tude plugins:install PLUGIN...

ARGUMENTS
  PLUGIN  Plugin to install.

FLAGS
  -f, --force    Run yarn install with force flag.
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Installs a plugin into the CLI.
  Can be installed from npm or a git url.

  Installation of a user-installed plugin will override a core plugin.

  e.g. If you have a core plugin that has a 'hello' command, installing a user-installed plugin with a 'hello' command
  will override the core plugin implementation. This is useful if a user needs to update core plugin functionality in
  the CLI without the need to patch and update the whole CLI.


ALIASES
  $ tude plugins add

EXAMPLES
  $ tude plugins:install myplugin 

  $ tude plugins:install https://github.com/someuser/someplugin

  $ tude plugins:install someuser/someplugin
```

## `tude plugins:link PLUGIN`

Links a plugin into the CLI for development.

```
USAGE
  $ tude plugins:link PLUGIN

ARGUMENTS
  PATH  [default: .] path to plugin

FLAGS
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Links a plugin into the CLI for development.
  Installation of a linked plugin will override a user-installed or core plugin.

  e.g. If you have a user-installed or core plugin that has a 'hello' command, installing a linked plugin with a 'hello'
  command will override the user-installed or core plugin implementation. This is useful for development work.


EXAMPLES
  $ tude plugins:link myplugin
```

## `tude plugins:uninstall PLUGIN...`

Removes a plugin from the CLI.

```
USAGE
  $ tude plugins:uninstall PLUGIN...

ARGUMENTS
  PLUGIN  plugin to uninstall

FLAGS
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Removes a plugin from the CLI.

ALIASES
  $ tude plugins unlink
  $ tude plugins remove
```

## `tude plugins:uninstall PLUGIN...`

Removes a plugin from the CLI.

```
USAGE
  $ tude plugins:uninstall PLUGIN...

ARGUMENTS
  PLUGIN  plugin to uninstall

FLAGS
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Removes a plugin from the CLI.

ALIASES
  $ tude plugins unlink
  $ tude plugins remove
```

## `tude plugins:uninstall PLUGIN...`

Removes a plugin from the CLI.

```
USAGE
  $ tude plugins:uninstall PLUGIN...

ARGUMENTS
  PLUGIN  plugin to uninstall

FLAGS
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Removes a plugin from the CLI.

ALIASES
  $ tude plugins unlink
  $ tude plugins remove
```

## `tude plugins update`

Update installed plugins.

```
USAGE
  $ tude plugins update [-h] [-v]

FLAGS
  -h, --help     Show CLI help.
  -v, --verbose

DESCRIPTION
  Update installed plugins.
```
<!-- commandsstop -->
