from urllib.parse import urlencode
from urllib.request import Request, urlopen
import socket
from uuid import getnode as get_mac
import hashlib
import time
from pyfingerprint.pyfingerprint import PyFingerprint

hostname = socket.gethostname()    
IPAddr = socket.gethostbyname(hostname)

#url = 'http://192.168.43.42/project/api/get_user_id.php' # Set destination URL here

#post_fields = {'device_ip' : IPAddr}     # Set POST fields here

#request = Request(url, urlencode(post_fields).encode())
#user_id = urlopen(request).read().decode()
#print(user_id)


try:
    f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)

    if ( f.verifyPassword() == False ):
        raise ValueError('The given fingerprint sensor password is wrong!')

except Exception as e:
    print('The fingerprint sensor could not be initialized!')
    print('Exception message: ' + str(e))
    exit(1)

print('Currently used templates: ' + str(f.getTemplateCount()) +'/'+ str(f.getStorageCapacity()))

try:
    print('Waiting for finger...')

    while ( f.readImage() == False ):
        pass

    f.convertImage(0x01)

    print('Remove finger...')
    time.sleep(1)

    print('Waiting for same finger again...')

    while ( f.readImage() == False ):
        pass

    (f.convertImage(0x02))

    u1 = f.downloadCharacteristics(0x01)
    u2 = f.downloadCharacteristics(0x02)
    if(f.compareCharacteristics()):
        print("yes")
    else:
        print("no")
        
    #url = 'http://192.168.43.42/project/api/fingerprint_add.php' # Set destination URL here
    #post_fields = {'savetext': u2, 'user_id' : user_id}     # Set POST fields here
    
    #request = Request(url, urlencode(post_fields).encode())
    #json = urlopen(request).read().decode()
    #print(json)
    #print("Reg succesfully DONE:)")


except Exception as e:
    print('Operation failed!')
    print('Exception message: ' + str(e))
    exit(1)
