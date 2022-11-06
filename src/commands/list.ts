import {Command, CliUx} from '@oclif/core'
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

  // static args = [{name: 'file'}]

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

    const {args} = await this.parse(ListCommand)

    this.log(`${args}`)

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
