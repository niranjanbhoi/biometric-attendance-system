from urllib.parse import urlencode
from urllib.request import Request, urlopen
import socket
from uuid import getnode as get_mac

from tkinter import messagebox


hostname = socket.gethostname()    
IPAddr = socket.gethostbyname(hostname)
print(IPAddr)
get_mac()
#url = 'http://192.168.43.42/project_list/final_year_project/api/device_add.php' # Set destination URL here

url = 'http://192.168.43.188/api/device_add.php' # Set destination URL here

post_fields = {'device_name': hostname, 'device_ip' : IPAddr, 'device_mac' : get_mac()}     # Set POST fields here

request = Request(url, urlencode(post_fields).encode())
json = urlopen(request).read().decode()
#print(json)
messagebox.showinfo("Add Device", IPAddr+" "+json)
