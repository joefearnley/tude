import * as fs from 'fs-extra'
import * as path from 'path'

export default class Database {
  private items
  private dataDir: string

  constructor(dataDir: string) {
    this.dataDir = dataDir
  }

  public static async initialize(): Promise<Database> {
    this.items  = await fs.readJSON(path.join(this.dataDir, 'config.json'))
  }

  getAll() {
    return this.items
  }

  getCompleted() {
    return this.items
  }

  getUncompleted() {
    return this.items
  }

  setUpData(databaseFile) {
    fs.readJson(databaseFile, {throws: false})
    .then(results => {
      if (!results) {
        const exampleItems = {
          items: [
            {
              id: 1,
              name: 'task 1',
              completed: false,
              dueDate: '',
              created: '11/01/2022'),
            },
          ],
        }

        fs.writeJson(databaseFile, exampleItems, err => {
          if (err) return console.error(err)
          console.log('success!')
        })
      }
    })
  }

}