DATA SEGMENT
A DW 13H
B DW 2H
sum dW ?
DATA ENDS
CODE SEGMENT
ASSUME CS:CODE, DS:DATA
START :
	MOV AX,DATA
	MOV DS,AX
	
	MOV AX,A
	MOV BX,B
	
	DIV BX
	
	MOV sum, ax
	INT 3
CODE ENDS
END START	
