
export function listArgs(args: Record<string, unknown>[]):void {
  console.log('$args:')
  console.log('----------')

  for (const [key, value] of Object.entries(args)) {
    console.log(key, value)
  }
}

export function listFlags(flags: Record<string, unknown>[]):void {
  console.log('$flags:')
  console.log('----------')

  for (const [key, value] of Object.entries(flags)) {
    console.log(key, value)
  }
}
