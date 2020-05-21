import os
from urllib.parse import urlencode
from urllib.request import Request, urlopen
import socket

user_input = input("Enter a number 1.add device 2.add user 3.entery data ")
if user_input == '1':
    os.system("python3 device_add.py")
    
elif user_input == '2':
    hostname = socket.gethostname()    
    IPAddr = socket.gethostbyname(hostname)
    url = 'http://192.168.43.42/project_list/final_year_project/api/get_user_id.php' # Set destination URL here
    post_fields = {'device_ip' : IPAddr}     # Set POST fields here    
    request = Request(url, urlencode(post_fields).encode())
    user_id = urlopen(request).read().decode()
    #print(user_id)
    
    if user_id == '':
        print("No Request Found")
    else:
        os.system("python3 examples/example_enroll.py")

elif user_input == '3':
    print("hi")
    os.system("python3 examples/example_search.py")
    
else:
    print("Invalid inute")
    