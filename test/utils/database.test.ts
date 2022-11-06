import Database from '../../src/utils/database'
import {expect} from 'chai'
import 'mocha'

describe('Data is created', () => {
  it('should create data', () => {
    const db = new Database()
    expect(db).to.equal(true)
  })
})
