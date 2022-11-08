import {Command, Flags, CliUx} from '@oclif/core'
import * as fs from 'fs-extra'
import * as path from 'path'
import {format} from 'date-fns'

export default class ListCommand extends Command {
  static description = 'list current items to do'

  static examples = [
    '<%= config.bin %> <%= command.id %>',
  ]

  private databaseFile = path.join(this.config.dataDir, 'database.json');

  // static flags = {
  // }

  static args = [{name: 'all'}]

  private async setUpData() {
    fs.readJson(this.databaseFile, {throws: false})
    .then(results => {
      if (!results) {
        const exampleItems = {
          items: [
            {
              id: 1,
              name: 'task 1',
              completed: false,
              dueDate: '',
              created: format(new Date(), 'MM/dd/yyyy'),
            },
          ],
        }

        fs.writeJson(this.databaseFile, exampleItems, err => {
          if (err) return console.error(err)
          console.log('success!')
        })
      }
    })
  }

  public async run(): Promise<void> {
    this.log('running list command from /Users/joe/projects/tude/src/commands/list.ts')

    const {args, flags} = await this.parse(ListCommand)

    this.log('$args:')

    for (const key of Object.keys(args)) {
      console.log(key, args[key])
    }

    this.log('$flags:')

    for (const key of Object.keys(flags)) {
      console.log(key, flags[key])
    }

    // const name = flags.name ?? 'world'
    // if (args.file && flags.force) {
    //   this.log(`you input --force and --file: ${args.file}`)
    // }

    const data = await fs.readJSON(this.databaseFile)

    CliUx.ux.table(data.items, {
      name: {
        minWidth: 20,
      },
      dueDate: {
        minWidth: 20,
      },
      completed: {
        minWidth: 20,
      },
    }, {
      printLine: this.log.bind(this),
    })
  }
}
