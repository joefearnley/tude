import {Command, Flags, CliUx} from '@oclif/core'
import * as fs from 'fs-extra'
import * as path from 'node:path'
import { LowSync } from 'lowdb'
import { JSONFileSync } from 'lowdb/node'


export default class ListCommand extends Command {
  static description = 'list current items to do'

  static examples = [
    '<%= config.bin %> <%= command.id %>',
  ]

  private databaseFile = path.join(this.config.dataDir, 'database.json');

  static flags = {
    // flag with a value (-a, --all)
    all: Flags.boolean({
      char: 'a',
      description: 'list all items',
      required: false,
    }),

    // flag with a value (-c, --completed)
    completed: Flags.boolean({
      char: 'c',
      description: 'list all completed items',
      required: false,
    }),
  }

  static args = [
    {
      name: 'all',
      description: 'list all items',
    },
    {
      name: 'completed',
      description: 'list all completed items',
    },
  ]

  public async run(): Promise<void> {
    this.log('running list command from /Users/joe/projects/tude/src/commands/list.ts')

    const adapter = new JSONFileSync(this.databaseFile)
    const db = new LowSync(adapter)

    db.read()

    // const {items} = db.data

    this.log(db.data)

    const {args, flags} = await this.parse(ListCommand)
    const data = await fs.readJSON(this.databaseFile)
    // let items = data.items

    // if ((args.completed && args.completed === 'completed') || flags.all) {
    //   items = items.filter((item: any) => item.completed)
    // }

    // CliUx.ux.table(items, {
    //   name: {
    //     minWidth: 20,
    //   },
    //   dueDate: {
    //     header: 'Due Date',
    //     minWidth: 20,
    //   },
    //   completed: {
    //     minWidth: 20,
    //   },
    // }, {
    //   printLine: this.log.bind(this),
    // })
  }
}
