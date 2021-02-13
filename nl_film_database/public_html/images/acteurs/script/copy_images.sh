#!/bin/bash



ls ../ | awk -F'[.]' '{print $1 , $2 , $3}' | while read var1 var2 var3; 
do  
	if [ -f ../oud/$var3.jpg ]; 
then 
	echo "$var3 exists"; 
else 
	echo "$var3 doesnot exist";
	#echo "$var1.$var2.$var3.png ../oud/$var3.jpg" 
	cp ../$var1.$var2.$var3.png ../oud/$var3.jpg;
	

fi; 
done




