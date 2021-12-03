import sys 
from sbmus import SMBus
import time 

addr=0x08 #bus dir
bus=SMBus(1)

while True:
	try:
		data=bus.read_byte_data(addr)
		print("Received: ")
		print(data)
		time.sleep(1)
	except:
		print("No received")
		time.sleep(0.5)
