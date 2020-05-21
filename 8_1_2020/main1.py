from tkinter import Tk
import os
from tkinter import messagebox

import tkinter as tk 
from tkinter import *

def hello():
   messagebox.showinfo("Say Hello", "Hello World")
   
def add_device():
   os.system("python3 device_add.py")
   #messagebox.showinfo("Say Hello", "Hello World")
   
def add_user():
    os.system("python3 examples/example_enroll.py")
    
def entry():
    os.system("python3 examples/example_search.py")

root = Tk() 
root.title('Dashboard')
w = Canvas(root, width=0, height=0) 
w.pack()





#B1 = Button(root, text = "Say Hello", command = hello).pack()
#advance_option = Button(root, text ="Advance Option", command = root.destroy).pack(pady = 10)

entry = Button(root, text ="Entry", bg='green', command = entry).pack(pady = 10)
add_user = Button(root, text ="Add User", bg='#9e9e9e', command = add_user).pack(pady = 10)
add_device = Button(root, text ="Add Device", bg='yellow', command = add_device).pack(pady = 10)
close = Button(root, text ="close", bg='red', command = root.destroy).pack(pady = 10)
w = Label(root, text='This under Development').pack()
#Label(root, text='Created by - shindekalpesharun').pack()
mainloop()
