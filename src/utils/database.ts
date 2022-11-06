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
}