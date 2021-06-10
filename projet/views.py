 # -*- coding: utf-8 -*-

from html import escape
from pyramid.httpexceptions import HTTPFound
from pyramid.response import Response
from pyramid.view import view_config
import psycopg2
from random import *
#http://localhost:6543/

def connect() : 
    con = psycopg2.connect(database="citations", user="postgres", password="new_password", host="127.0.0.1", port="5432")
    print("Database opened successfully")
    return con

@view_config(route_name='home', renderer='home.pt')
def home(request):

    bdd = connect()
    cur = bdd.cursor()
    val = (int)(uniform(1,5))
    print(val)
    cur.execute("SELECT phrase FROM citation WHERE id="+str(val)+"")
    version = cur.fetchall()
    bdd.close()
    return {'name': version}
#def home_view(request):
#   return Response('<p>Cliquer <a href="/view2?name=president">ici</a> pour vous faire saluer</p>')
@view_config(route_name='hello')
def hello_view(request):
   name = request.params.get('name')
   body = '<p>Bonjour %s,<br>Cliquez <a href="/">ici</a> pour revenir à l\'ancienne vue </p>'
   # Python html.escape to prevent Cross-Site Scripting (XSS) [CWE 79]
   return Response(body % escape(name))


