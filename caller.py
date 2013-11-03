#!/usr/bin/env python
import xmlrpclib

server_url = "http://upandabout.servercode.co.uk/xmlrpc.php"
server = xmlrpclib.ServerProxy(server_url,verbose=True)
result = server.metaWeblog.newPost('user', 'pass', {'content':{'description':'http://127.0.0.1/index.php'}})
print result
