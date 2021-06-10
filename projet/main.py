from wsgiref.simple_server import make_server
from pyramid.config import Configurator
import psycopg2

if __name__=='__main__':
    with Configurator() as config:
       config.include('pyramid_chameleon')
       config.add_route('home','/')
       config.add_route('hello','/view2')
       config.scan('views')
       app=config.make_wsgi_app()
    server=make_server('0.0.0.0',6543, app)
    server.serve_forever()

