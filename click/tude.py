import click
from pysondb import db

@click.command()
@click.argument('arg')
def list(arg):

    print(arg)

    click.echo('listing....')

if __name__ == '__main__':
    list()
