import os

from pyftpdlib import servers
from pyftpdlib.handlers import FTPHandler
from pyftpdlib.authorizers import DummyAuthorizer

BASE_DIR = os.path.dirname(os.path.realpath(__file__))
share = os.path.join(BASE_DIR, 'share')

authorizer = DummyAuthorizer()
authorizer.add_anonymous(share)

handler = FTPHandler
handler.banner = "Welcome to Mystery Inc. FTP Server - unauthorized access prohibited"
handler.authorizer = authorizer

handler.masquerade_address = os.environ.get('IFACE_ADDRESS', '0.0.0.0')
handler.passive_ports = range(9000, 9011)

address = ("0.0.0.0", 2121)
server = servers.FTPServer(address, handler)
server.serve_forever()
