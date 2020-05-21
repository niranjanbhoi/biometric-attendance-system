#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""
PyFingerprint
Copyright (C) 2015 Bastian Raschke <bastian.raschke@posteo.de>
All rights reserved.

"""

import time
from pyfingerprint.pyfingerprint import PyFingerprint
import hashlib

from urllib.parse import urlencode
from urllib.request import Request, urlopen
import socket
from tkinter import messagebox


hostname = socket.gethostname()    
IPAddr = socket.gethostbyname(hostname)
url = 'http://192.168.43.188/api/get_user_id.php' # Set destination URL here
post_fields = {'device_ip' : IPAddr}     # Set POST fields here    
request = Request(url, urlencode(post_fields).encode())
user_id = urlopen(request).read().decode()
print(type(user_id))
if (user_id == ''):
        print("not any user found ")
        error = "not any user found "
        messagebox.showinfo("Error", error)
else:
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

        if ( positionNumber >= 0 ):
            print('Template already exists at position #' + str(positionNumber))
            characterics = str(f.downloadCharacteristics(0x01)).encode('utf-8')

        print('Remove finger...')
        time.sleep(2)

        print('Waiting for same finger again...')

        while ( f.readImage() == False ):
            pass

        f.convertImage(0x02)

        if ( f.compareCharacteristics() == 0 ):
            raise Exception('Fingers do not match')

        if(1==0):
            f.createTemplate()

        positionNumber = f.storeTemplate()
        print('Finger enrolled successfully!')
        print('New template position #' + str(positionNumber))
        characterics = str(f.downloadCharacteristics(0x01)).encode('utf-8')

        print('SHA-2 hash of template: ' + hashlib.sha256(characterics).hexdigest())
        sha_hash = hashlib.sha256(characterics).hexdigest()
        print(type(sha_hash))
            
        url = 'http://192.168.43.188/api/user_register.php' # Set destination URL here
        post_fields = {'id' : user_id,'sha_hash' : sha_hash}     # Set POST fields here
        request = Request(url, urlencode(post_fields).encode())
        json = urlopen(request).read().decode()
        print(json)
        messagebox.showinfo("Add User ", json)


    except Exception as e:
        print('Operation failed!')
        print('Exception message: ' + str(e))
        exit(1)
