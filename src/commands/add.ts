import {Command, Flags} from '@oclif/core'

export default class AddCommand extends Command {
  static description = 'add an item to the tasks'

  static examples = [
    '<%= config.bin %> <%= command.id %>',
  ]

  static flags = {
    // flag with a value (-n, --name=VALUE)
    name: Flags.string({char: 'n', description: 'task name'}),
    // flag with no value (-f, --force)
    force: Flags.boolean({char: 'f'}),
  }

  static args = [{name: 'file'}]

  public async run(): Promise<void> {
    const {args, flags} = await this.parse(AddCommand)

    const name = flags.name ?? 'world'
    this.log(`hello ${name} from /Users/joe/projects/tude/src/commands/add.ts`)
    if (args.file && flags.force) {
      this.log(`you input --force and --file: ${args.file}`)
    }
  }
}
