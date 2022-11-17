import click

@click.command()
@click.option('--all', default=1, help='list all items')
def list():
    click.echo('listing....')


if __name__ == '__main__':
    list()