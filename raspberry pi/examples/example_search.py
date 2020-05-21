#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""
PyFingerprint
Copyright (C) 2015 Bastian Raschke <bastian.raschke@posteo.de>
All rights reserved.

"""

import hashlib
from pyfingerprint.pyfingerprint import PyFingerprint

from urllib.parse import urlencode
from urllib.request import Request, urlopen
import socket
import datetime
from tkinter import messagebox

hostname = socket.gethostname()    
IPAddr = socket.gethostbyname(hostname)

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

    result = f.searchTemplate()

    positionNumber = result[0]
    accuracyScore = result[1]

    if ( positionNumber == -1 ):
        print('No match found!')
        exit(0)
    else:
        print('Found template at position #' + str(positionNumber))
        print('The accuracy score is: ' + str(accuracyScore))


    f.loadTemplate(positionNumber, 0x01)

    characterics = str(f.downloadCharacteristics(0x01)).encode('utf-8')

    print('SHA-2 hash of template: ' + hashlib.sha256(characterics).hexdigest())

    sha_hash = hashlib.sha256(characterics).hexdigest()
    
    cur_time = datetime.datetime.now()

    #early_in = cur_time.replace(hour=10, minute=0, second=0, microsecond=0)
    late_in = cur_time.replace(hour=10, minute=0, second=0, microsecond=0)
    early_out = cur_time.replace(hour=16, minute=45, second=0, microsecond=0)
    #late_out = cur_time.replace(hour=17, minute=15, second=0, microsecond=0)
    
    ct_io_status = '0'
    L_E_entery = '0'
    #if(cur_time < early_in):
    #    ct_io_status = 0
    if(cur_time > late_in):
        ct_io_status = '1'
    if(cur_time < early_out):
        L_E_entery = '2'
    #if(cur_time > early_out):
    #    L_E_entery = 2
    
    url = 'http://192.168.43.188/api/inout_entry.php' # Set destination URL here
    post_fields = {'sha_hash' : sha_hash, 'device_ip' : IPAddr, 'ct_io_status': ct_io_status, 'L_E_entery': L_E_entery}     # Set POST fields here    
    request = Request(url, urlencode(post_fields).encode())
    json = urlopen(request).read().decode()
    print(json)
    messagebox.showinfo("Entry Succesfully")
    
except Exception as e:
    print('Operation failed!')
    print('Exception message: ' + str(e))
    exit(1)
