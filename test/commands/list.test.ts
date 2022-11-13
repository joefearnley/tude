import {expect, test} from '@oclif/test'

const data = {
  items: [
    {id: 1, name: 'task 1', completed: false, dueDate: '', created: '11/01/2022'},
    {id: 2, name: 'task 2', completed: false, dueDate: '', created: '11/08/2022'},
    {id: 3, name: 'task 3', completed: true, dueDate: '11/08/2022', created: '11/06/2022'},
    {id: 4, name: 'task 4', completed: false, dueDate: '11/21/2022', created: '11/10/2022'},
  ],
}

describe('list', () => {
  beforeEach(() => {
    console.log('before each...v')
  })

  afterEach(() => {
    console.log('before each...')
  })

  test
  .stdout()
  .command(['list'])
  .it('runs list', ctx => {
    expect(ctx.stdout).to.contain('')
  })

  test
  .stdout()
  .command(['list', '-a'])
  .it('runs list -a', ctx => {
    expect(ctx.stdout).to.contain('')
  })
})
