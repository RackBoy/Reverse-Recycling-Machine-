# Reverse-Recycling-Machine-
Final stage of the technological and environment project made by Green Technology.   


Nowadays, climate change has become a critical situation that envolves almost everything and everyone. Having this in mind, the Green Technology team has conceived, designed and implemented a prototype version of a machine that pretends to save waste in exchange of points (an equivalen to real money), therefore in that way, people can help the environment while get some kind of economic retribution in the process.

# Features
This project presents the interaction between three different kind of users, in order to reclycle waste (pre-registered user), register as a new user and clean the waste desposit. This was made using an embbeded system, with a Raspberry Pi 3 B+ and an Arduino Uno. 

In the first stage (user already registered), the potential user will be able to log in to their account using an specific password, then, the interface will led them to the recycling process and add new points to their account. Once these points reach a certain amount, the user can exchange them for something of their preference such as: a snack or a coffee at the available stores. 

If someone would like to use the device, however they don't have an account, the second section of the user cases can provide one. This process can be done following the instructions on the user interface, in other words, typing the new password and then confirm to be a new user.

The final case proposed is made for the people in charge of cleaning the device when it's full of waste. The user of this case will have an individual password and options wether to open or close the gates that save the waste. Besides, this person in charge can't use the options for recycling, just take off the waste. 

In order to provide aditional information about the users' stats, this project provides a web page where the users can find their information related to points and further. 

# Limitations 

Considering that the Reverse Recycling Machine is just a prototype version of the concept itself, there are certain aspects to develop further. One of those, it's the capacity of the new user that the embedded system can allow and the way that it do it, since here it presents a demo with a few users. This considering the Hardware used and other aspects.

On the other hand, the dimensions of the device aren't real, that is, it's made only for prototype considerations, not for real users. That's why the machine can't allow huge quantities of waste, different types of it and further information already presented.

# Usage

This machine possesses a matricial keyboard and an LCD screen to interact with the previous features mentioned. Once the machine is ON, the three options appear on the screen, so the user can choose what they need only clicking the corresponding option which is defined to an specific number, depending on the case. 

In the first case, the user has to introduce their corresponding password, then choose the number of add waste and put the waste into one of the holes (corresponding in the dimensions of the waste), after that, the screen will show if the process was successful with the new points acquired.

The second case is quite easy to complete. The user only has to choose the option of register new user, type their password and confirm with an specific letter, that's it. Then, when they recycle, just use the first case.

In the third case, the user is provided with a password in order to access directly to the waste. Like the other cases, all of the interactions are with the keypad, so when the password is correct, there on the screen will appear the available options and they'll be able to open or close the gates that save the waste.

Whatever the case is chosen, the user will be guided by the messages on the screen.

# Testing
In order to verify the right work of each parts of the project, there were some activities to test the project while the developing process was happening. In particular case, the web page needed to be tested, this running every interfaz, to fix possible bugs and glicthes, that's why typical users were required to use the web page and then provide feedback about it. Due to these comments, the team fixed several visual aspects and added new ones to provide a suitable interfaz. At the same time, the web and the other parts of the project were submitted to long time periods of testing to find out the response and stability. 
